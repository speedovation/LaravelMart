/********************************************************************************
/*
 * scrollAppend (jQuery auto append results)
 * 2012 by Hawkee.com (hawkee@gmail.com)
 *
 * Version 1.5
 * 
 * Requires jQuery 1.7 and jQuery UI 1.8
 *
 * Dual licensed under MIT or GPLv2 licenses
 *   http://en.wikipedia.org/wiki/MIT_License
 *   http://en.wikipedia.org/wiki/GNU_General_Public_License
 *
 *
 *  Options:
 *
 *  url: Where to query for the next page of results.
 *
 *  params: An array of parameters to be passed to the URL
 *
 *  appendTo: The div that will get the next page of results.
 *
 *  callback: Anything that needs to be called once the next page has been appended.
 *
 *  pixelBuffer: Pixes from the bottom of the window before starting to load next page.
 *
 *  pageVar: What will be passed to your server to represent the page number.
 *
 *  expireCacheMins: Number of minutes before cached appends get cleared.
 *
 *  pagesToPause: The number of pages to show before we pause and require a click to continue.
 *
 *  loadingImage: A spinner or image to indicate the next page is loading.
 *
 *  moreText: The text that will be indicate a pause.
 *
 *  disableCache: Always start from the first page, don't cache appends.
 *
 *  footerClass: Set this if you want your footer to appear fixed after the first page of results.
 *
 *  contentClass: Set this if you want your main content bottom-margin to adjust to the floating fixed footer.
 *
 *  footerSpeed: The speed at which your footer slides up after the first page of results.
 *
 * Usage:
 *
 * $(window).scrollAppend({
 *		url: 'newsfeed.php',
 *		params: { type: "image", who: "friends" },
 *		appendTo: "#newsfeed",
 *		footerClass: "#footer"
 *	});
*/


(function($){$.widget("ui.scrollAppend", {

	options:{
		pixelBuffer: 400,
		pageVar: 'p',
		expireCacheMins: 20,
		pagesToPause: 5,
		loadingImage: '/images/loading.gif',
		moreText: 'Show More',
		disableCache: false,
		footerClass: undefined,
		contentClass: undefined,
		footerSpeed: 400,
	},

	_create:function() {
		
		var self = this;
		self.loading = false;
		self.page = 0;
		self.stop = false;
		self.pause = false;
		self.stopFixed = false;
		self.footerUp = false;
		self.lastScrollPos = undefined;
		self.position = undefined;
		self.appearedOnce = false;


		self.options.contentClass = undefined;

		// Get the params and save them as a key so we can store the cache according to the page
		// it was generated on.
		var params_key = self.options.params;
		params_key[self.options.pageVar] = 0;
		var param_key = jQuery.param(params_key);

		self.param_key = param_key;

		// Clears expired localStorage data.
		this.clearOld();

		// Look for cached appends.
		if(!self.options.disableCache) {
			var cache = localStorage.getItem('scroll_'+self.param_key);
			if(cache != undefined) {
				var timestamp = localStorage.getItem('time_'+self.param_key);
				self.page = localStorage.getItem('p_'+self.param_key);
				//console.log("resuming from page: "+self.page+" at "+timestamp);
				$(this.options.appendTo).append(cache);
				if(self.options.callback) self.options.callback.apply();
			}
		}

		// Fix the footer and hide it below the bottom of the page to bring it up after a single screen of results.
		if(self.options.footerClass != undefined) {
			self.setFixed();
		}	

		// See if we're already at the end of the results on the first page.
		self.checkAppend();

		// Determines if we scrolled to the bottom of the page and appends if we still have results.
		$(window).scroll(function () {
			self.checkAppend();
			if(self.options.footerClass != undefined && !self.loading) self.checkDirection();
		});

		$(document).on('click', '#scroll_append_more', function() {
			self.append();
			$(this).remove();
			self.pause = false;
			return false;
		});
	},

	// Checks if we need to append.
	// Checks if we need to slide the footer into view.
	checkAppend: function () {
		var self = this;
		var height = $(document).height() - $(window).height();

		// Check to see if we're within pixelBuffer of the bottom of the window.
		if($(window).scrollTop() >= height - self.options.pixelBuffer) {
			if(!self.loading) {
				if(self.stop) return;
				if(!self.pause) self.append();
			}
		}
	},

	// Slides the footer up or down
	// 'persistent' will only show the footer and not remove it. 
	toggleFooter: function(persistent) {
		var self = this;
		if(self.options.footerClass == undefined) return;
		var contentHeight = $(self.options.footerClass).outerHeight();

		if(!self.footerUp) {
			// Start the footer below the bottom and slide it up into view.
			$(self.options.footerClass).stop(true, true).animate(
				{bottom: 0},
				{duration: self.options.footerSpeed,queue: false}
			);

			// Adjust the page margin to include the footer.
			if(self.options.contentClass != undefined) {
				$(self.options.contentClass).stop(true, true).animate(
					{'margin-bottom':contentHeight},
					{duration: self.options.footerSpeed,queue: false}
				);
			}

			self.appearedOnce = true;
			self.footerUp = true;
		}
		else if(!persistent) {
			
			// Remove the fixed class so the footer stays at the bottom.
			$(self.options.footerClass).stop(true, true).animate(
				{bottom:-contentHeight},
				{duration: self.options.footerSpeed,queue: false}
			);

			// Adjust the page margin to exclude the footer.
			if(self.options.contentClass != undefined) {
				$(self.options.contentClass).stop(true, true).animate(
					{'margin-bottom': 0},
					{duration:self.options.footerSpeed,queue:false}
				);
			}	

			self.footerUp = false;
			self.stopFixed = true;
		}
	},

	// Makes the footer fixed and adjusts the margin of the page.
	setFixed: function() {
		var self = this;

		// We don't need to make it fixed if we're paused or stopped.
		if(self.stop || self.pause) return;

		// If we're already fixed then just return.
		if(self.position == 'fixed') return;
		var contentHeight = $(self.options.footerClass).outerHeight();
				
		$(self.options.footerClass).css('bottom', -contentHeight);

		$(self.options.footerClass).addClass('footer_fixed')
		if(self.options.contentClass != undefined) {
			// Every time the footer is initialized to fixed it'll be under the bottom of the page.
			$(self.options.contentClass).css('margin-bottom', 0);
		}
		self.footerUp = false;
		self.position = 'fixed';
	},

	// Makes the footer relative and adjusts the margin of the page.
	setRelative: function() {
		var self = this;
		if(self.position == 'relative') return;

		$(self.options.footerClass).removeClass('footer_fixed');
		$(self.options.footerClass).css('bottom', 0);
		if(self.options.contentClass != undefined) {
			$(self.options.contentClass).css('margin-bottom', 0);
		}

		// If it has appeared already and the user scrolls up then stop it from showing up except at the more button.
		if(self.appearedOnce) self.stopFixed = true;
		self.position = 'relative';
	},

	// Determines what direction the user is scrolling.
	// If the footer is fixed and the user starts scrolling up set it back to relative so it doesn't
	// eat up the viewport.  If they're scrolling down, set it back to fixed.
	checkDirection: function() {
		var self = this;
		var scrollPos = $(window).scrollTop();
		if(scrollPos < self.lastScrollPos) {
			self.atBottom = false;
			self.setRelative();
		}
		// Set it back to fixed so it doesn't show up for a split second to be pushed down with each append.
		else self.setFixed();
		self.lastScrollPos = scrollPos;
	},

	// Appends the next page
	append: function() {

		var self = this;
		self.loading = true;
		self.page++;
		
		self.options.params[self.options.pageVar] = self.page;

		var loadingImage;
		if(self.options.loadingImage) {
			$(self.options.appendTo).append("<div id='scroll_append_loading' class='scroll_append_loading'><img src='"+self.options.loadingImage+"'></div>");
		}

		// Only fix the footer a single time after the first page is loaded.
		if(!self.stopFixed) self.toggleFooter();
		
		$.ajax({
			url: self.options.url,
			data: self.options.params,
			cache: false,
			success: function(html){
				$('#scroll_append_loading').remove();
				if(html == 'false') {
					self.stop = true;
				}	
				else {
					$(self.options.appendTo).append(html);

					// Update the cache for returning to the page.

					if(!self.options.disableCache) {
						var old = localStorage.getItem('scroll_'+self.param_key);
						if(old === null) old = "";
						self.saveData('scroll_'+self.param_key, old + html);
						self.saveData('p_'+self.param_key, self.page);
						var timestamp = Number(new Date());
						self.saveData('time_'+self.param_key, timestamp);
					}
				}

				// Check if we need to pause.

				var mod = self.page % self.options.pagesToPause;
				if(mod == 0 && !self.stop) {
					$(self.options.appendTo).append("<div id='scroll_append_more' class='scroll_append_more'>"+self.options.moreText+"</div>");
					self.pause = true;
				}

				// Put the footer back where it belongs if we've hit a pause
				if(self.pause || self.stop) self.setRelative();

				if(self.options.callback) self.options.callback.apply();

				self.loading = false;
			}
		});
	},

	// Saves the appended data to localStorage and handles the limit by clearing old data.

	saveData: function(key, value) {
		try {
			localStorage.setItem(key, value);
		} catch (e) {
			if(e.code == 22) {
				// localStorage Quota exceeded
				this.clearOld();
			}
		}
	},

	// Clears old cached data that has exceeded the given cache time limit

	clearOld: function() {
		for (var i = 0; i < localStorage.length; i++){
			var timestamp = Number(new Date());
			var regex = new RegExp("^time_(.+)", "g");
			var key = localStorage.key(i);
			var match = regex.exec(key);

			if(match) {
				var params = match[1];
				var prev_timestamp = localStorage.getItem(key);
				var diff = timestamp - prev_timestamp;
				diff = Math.round(diff/1000/60);

				//console.log("Age of cache: "+diff+" mins");
				if(diff >= this.options.expireCacheMins) {
					localStorage.removeItem("scroll_"+params);
					localStorage.removeItem("p_"+params);
					localStorage.removeItem("time_"+params);
					//console.log("Expiring");
				}
			}	
		}
	}

});
})(jQuery);
