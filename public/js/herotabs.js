(function($) {
  "use strict";
  var Herotabs, defaults, instanceId;
  instanceId = 0;
  defaults = {
    delay: 0,
    duration: 0,
    easing: "ease-in-out",
    startOn: 0,
    reverse: false,
    interactEvent: "click",
    useTouch: true,
    onSetup: null,
    onReady: null,
    css: {
      active: "is-active",
      current: "tab-current",
      navCurrent: "tab-nav-current",
      navId: "tabnav"
    },
    selectors: {
      tab: ".js-tab",
      nav: ".js-nav",
      navItem: ".js-nav-item"
    },
    zIndex: {
      bottom: 1,
      top: 2
    }
  };
  Herotabs = function(container, options) {
    this.container = container;
    this.options = options;
    this._currentTab = null;
    this._timer = null;
    this._instanceId = ++instanceId;
    this._opacityTransition = "opacity " + (parseInt(options.duration, 10) / 1000) + "s " + options.easing;
    typeof options.onSetup === "function" && options.onSetup.call(this);
    this._getDOMElements();
    if (this.nav.length > 0) {
      this._ariafy();
      this._setCurrentNav();
      this._attachNavEvents();
    }
    this._showInitialTab(options.startOn);
    this._attachKeyEvents();
    if (parseInt(options.delay, 10) > 0) {
      this.start();
      this._attachHoverEvents();
    }
    container.addClass(options.css.active);
    container[0].style.position = "relative";
    return typeof options.onReady === "function" && options.onReady.call(this);
  };
  Herotabs.prototype = {
    constructor: Herotabs,
    showTab: function(tabToShow) {
      var currentTab, duration, self, transitionProps;
      tabToShow = this._getTab(tabToShow);
      currentTab = this._currentTab;
      transitionProps = this._transitionProps;
      if (tabToShow.length === 0 || currentTab.is(tabToShow)) {
        return this;
      }
      this.tab.css(transitionProps.css, "").css("opacity", "");
      this._setTabVisibilty(currentTab, this.tab.not(currentTab));
      tabToShow.show().css({
        position: "absolute"
      });
      self = this;
      duration = parseInt(this.options.duration, 10);
      if (duration > 0) {
        currentTab.one(transitionProps.js, function() {
          return self._setTabVisibilty(tabToShow, currentTab);
        });
      } else {
        self._setTabVisibilty(tabToShow, currentTab);
      }
      currentTab.css(transitionProps.css, this._opacityTransition).css("opacity", 0);
      this.triggerEvent("herotabs.show", tabToShow);
      this._currentTab = tabToShow;
      return this;
    },
    nextTab: function() {
      var currentIndex, nextTab;
      currentIndex = this.tab.index(this._currentTab);
      nextTab = this.tab.eq(currentIndex + 1);
      nextTab = (nextTab.length > 0 ? nextTab : this.tab.eq(0));
      this.showTab(nextTab);
      this.triggerEvent("herotabs.next", nextTab);
      return this;
    },
    prevTab: function() {
      var currentIndex, prevTab;
      currentIndex = this.tab.index(this._currentTab);
      prevTab = this.tab.eq((currentIndex === 0 ? -1 : currentIndex - 1));
      this.showTab(prevTab);
      this.triggerEvent("herotabs.prev", prevTab);
      return this;
    },
    start: function() {
      var opt, reverse, self;
      opt = this.options;
      if (!opt.delay) {
        return this;
      }
      self = this;
      reverse = opt.reverse;
      this._timer = setInterval(function() {
        if (self._navItemHasFocus()) {
          return;
        }
        if (!reverse) {
          return self.nextTab();
        } else {
          return self.prevTab();
        }
      }, opt.delay);
      this.triggerEvent("herotabs.start", this._currentTab);
      return this;
    },
    stop: function() {
      clearInterval(this._timer);
      this.triggerEvent("herotabs.stop", this._currentTab);
      return this;
    },
    triggerEvent: function(eventName, tabToShow) {
      var index;
      tabToShow = this._getTab(tabToShow);
      index = this.tab.index(tabToShow);
      return this.container.trigger(eventName, {
        currentTab: tabToShow,
        currentTabIndex: index,
        currentNavItem: this.navItem.eq(index)
      });
    },
    _getDOMElements: function() {
      var element, selectors, _results;
      selectors = this.options.selectors;
      _results = [];
      for (element in selectors) {
        _results.push(this[element] = this.container.find(selectors[element]));
      }
      return _results;
    },
    _getTab: function(tab) {
      if (typeof tab !== "number") {
        return tab;
      } else {
        return this.tab.eq(tab);
      }
    },
    _showInitialTab: function(startOn) {
      var initialTab, tabFromHash;
      tabFromHash = location.hash && this.tab.filter(location.hash);
      initialTab = (tabFromHash.length === 0 ? this.tab.eq(startOn) : tabFromHash);
      this.tab.css("top", 0);
      this._setTabVisibilty(initialTab, this.tab.not(initialTab));
      this.triggerEvent("herotabs.show", initialTab);
      return this._currentTab = initialTab;
    },
    _setTabVisibilty: function(tabToShow, tabToHide) {
      var css, opt, zIndex;
      opt = this.options;
      css = opt.css;
      zIndex = opt.zIndex;
      tabToShow.addClass(css.current).css({
        "z-index": zIndex.top,
        position: "relative"
      }).attr("aria-hidden", false).find("a").andSelf().attr("tabindex", "0");
      return tabToHide.removeClass(css.current).css({
        "z-index": zIndex.bottom
      }).hide().attr("aria-hidden", true).find("a").andSelf().attr("tabindex", "-1");
    },
    _ariafy: function() {
      var navId;
      navId = this.options.css.navId + this._instanceId + "-";
      this.nav[0].setAttribute("role", "tablist");
      this.navItem.attr("role", "presentation").find("a").each(function(index) {
        this.id = navId + (index + 1);
        return this.setAttribute("role", "tab");
      });
      return this.tab.each(function(index) {
        this.setAttribute("role", "tabpanel");
        return this.setAttribute("aria-labelledby", navId + (index + 1));
      });
    },
    _transitionProps: (function() {
      var div, i, len, prefixes, prop, prop_, props, transitionend, vendorProp;
      prop = "transition";
      div = document.createElement("div");
      if (prop in div.style) {
        return {
          css: prop,
          js: "transitionend"
        };
      }
      transitionend = {
        transition: "transitionend",
        webkitTransition: "webkitTransitionEnd",
        MozTransition: "transitionend",
        OTransition: "oTransitionEnd otransitionend"
      };
      prefixes = ["Moz", "webkit", "O"];
      prop_ = prop.charAt(0).toUpperCase() + prop.substr(1);
      props = {};
      i = 0;
      len = prefixes.length;
      while (i < len) {
        vendorProp = prefixes[i] + prop_;
        if (vendorProp in div.style) {
          props.js = transitionend[vendorProp];
          props.css = "-" + prefixes[i].toLowerCase() + "-" + prop;
        }
        ++i;
      }
      return props;
    })(),
    _attachHoverEvents: function() {
      var self;
      self = this;
      this.container.on("mouseenter", function() {
        self.stop();
        return self.triggerEvent("herotabs.mouseenter", self._currentTab);
      });
      return this.container.on("mouseleave", function() {
        self.start();
        return self.triggerEvent("herotabs.mouseleave", self._currentTab);
      });
    },
    _attachKeyEvents: function() {
      var self;
      self = this;
      return this.nav.on("keydown", "a", function(event) {
        switch (event.keyCode) {
          case 37:
          case 38:
            return self.prevTab();
          case 39:
          case 40:
            return self.nextTab();
        }
      });
    },
    _isTouchEnabled: function() {
      return ("ontouchstart" in document.documentElement) && this.options.useTouch;
    },
    _getEventType: function() {
      var eventMap;
      eventMap = {
        hover: "mouseenter",
        touch: "touchstart",
        click: "click"
      };
      if (this._isTouchEnabled()) {
        return eventMap.touch;
      } else {
        return eventMap[this.options.interactEvent];
      }
    },
    _attachNavEvents: function() {
      var eventType, nav, opt, self;
      nav = this.nav;
      eventType = this._getEventType();
      opt = this.options;
      self = this;
      return nav.on(eventType, "a", function(event) {
        self.showTab($(this).parents(opt.selectors.navItem).index());
        if (self._checkUrlIsAnchor(this.href)) {
          event.preventDefault();
          return event.stopPropagation();
        }
      });
    },
    _isAnchorRegex: /#[A-Za-z0-9-_]+$/,
    _checkUrlIsAnchor: function(url) {
      return this._isAnchorRegex.test(url);
    },
    _navItemHasFocus: function() {
      return $(document.activeElement).closest(this.container).is(this.container);
    },
    _setCurrentNav: function() {
      var current, navItem, opt, self;
      self = this;
      opt = this.options;
      current = opt.css.navCurrent;
      navItem = this.navItem;
      return self.container.on("herotabs.show", function(event, tab) {
        var navItemLink;
        navItem.removeClass(current).find("a").each(function() {
          this.setAttribute("aria-selected", "false");
          return this.setAttribute("tabindex", "-1");
        });
        navItemLink = navItem.eq(tab.currentTabIndex).addClass(current).find("a");
        navItemLink[0].setAttribute("aria-selected", "true");
        navItemLink[0].setAttribute("tabindex", "0");
        if (self._navItemHasFocus()) {
          return navItemLink.focus();
        }
      });
    }
  };
  if (Herotabs.prototype._transitionProps.css === undefined) {
    Herotabs.prototype.showTab = function(tabToShow) {
      var currentTab, opt, self;
      tabToShow = this._getTab(tabToShow);
      currentTab = this._currentTab;
      opt = this.options;
      if (tabToShow.length === 0 || currentTab.is(tabToShow)) {
        return this;
      }
      this.tab.stop(true, true);
      tabToShow.show().css({
        position: "absolute",
        opacity: 1
      });
      self = this;
      currentTab.animate({
        opacity: 0
      }, opt.duration, function() {
        return self._setTabVisibilty(tabToShow, currentTab);
      });
      this.triggerEvent("herotabs.show", tabToShow);
      this._currentTab = tabToShow;
      return this;
    };
  }
  $.fn.herotabs = function(options) {
    options = $.extend(true, {}, defaults, options);
    return this.each(function() {
      var $this;
      $this = $(this);
      return $this.data("herotabs", new Herotabs($this, options));
    });
  };
  $.fn.herotabs.defaults = defaults;
  return $.fn.herotabs.Herotabs = Herotabs;
})(jQuery);
