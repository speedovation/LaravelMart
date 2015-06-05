var $;

$ = jQuery;

$.fn.flexNav = function(options) {
  var $nav, $top_nav_items, breakpoint, count, nav_percent, nav_width, resetMenu, resizer, settings, showMenu, toggle_selector;
  settings = $.extend({
    'animationSpeed': 0,
    'transitionOpacity': true,
    'buttonSelector': '.menu-button',
    'hoverIntent': false,
    'hoverIntentTimeout': 150,
    'calcItemWidths': false,
    'hover': true
  }, options);
  $nav = $(this);
  $nav.addClass('with-js');
  if (settings.transitionOpacity === true) {
    $nav.addClass('opacity');
  }
  $nav.find("li").each(function() {
    if ($(this).has("ul").length) {
      return $(this).addClass("item-with-ul").find("ul").hide();
    }
  });
  if (settings.calcItemWidths === true) {
    $top_nav_items = $nav.find('>li');
    count = $top_nav_items.length;
    nav_width = 100 / count;
    nav_percent = nav_width + "%";
  }
  if ($nav.data('breakpoint')) {
    breakpoint = $nav.data('breakpoint');
  }
  showMenu = function() {
    if ($nav.hasClass('lg-screen') === true && settings.hover === true) {
      if (settings.transitionOpacity === true) {
        return $(this).find('>ul').addClass('flexnav-show').stop(true, true).animate({
          height: ["toggle", "swing"],
          opacity: "toggle"
        }, settings.animationSpeed);
      } else {
        return $(this).find('>ul').addClass('flexnav-show').stop(true, true).animate({
          height: ["toggle", "swing"]
        }, settings.animationSpeed);
      }
    }
  };
  resetMenu = function() {
    if ($nav.hasClass('lg-screen') === true && $(this).find('>ul').hasClass('flexnav-show') === true && settings.hover === true) {
      if (settings.transitionOpacity === true) {
        return $(this).find('>ul').removeClass('flexnav-show').stop(true, true).animate({
          height: ["toggle", "swing"],
          opacity: "toggle"
        }, settings.animationSpeed);
      } else {
        return $(this).find('>ul').removeClass('flexnav-show').stop(true, true).animate({
          height: ["toggle", "swing"]
        }, settings.animationSpeed);
      }
    }
  };
  resizer = function() {
    var selector;
    if ($(window).width() <= breakpoint) {
      $nav.removeClass("lg-screen").addClass("sm-screen");
      if (settings.calcItemWidths === true) {
        $top_nav_items.css('width', '100%');
      }
      selector = settings['buttonSelector'] + ', ' + settings['buttonSelector'] + ' .touch-button';
      $(selector).removeClass('active');
      return $('.one-page li a').on('click', function() {
        return $nav.removeClass('flexnav-show');
      });
    } else if ($(window).width() > breakpoint) {
      $nav.removeClass("sm-screen").addClass("lg-screen");
      if (settings.calcItemWidths === true) {
        $top_nav_items.css('width', nav_percent);
      }
      $nav.removeClass('flexnav-show').find('.item-with-ul').on();
      $('.item-with-ul').find('ul').removeClass('flexnav-show');
      resetMenu();
      if (settings.hoverIntent === true) {
        return $('.item-with-ul').hoverIntent({
          over: showMenu,
          out: resetMenu,
          timeout: settings.hoverIntentTimeout
        });
      } else if (settings.hoverIntent === false) {
        return $('.item-with-ul').on('mouseenter', showMenu).on('mouseleave', resetMenu);
      }
    }
  };
  $(settings['buttonSelector']).data('navEl', $nav);
  toggle_selector = settings['buttonSelector'] + ', ' + settings['buttonSelector'] + ' .touch-button';
  $(toggle_selector).on('click', function(e) {
    $(this).toggleClass('active');
    e.preventDefault();
    e.stopPropagation();
    return $(this).next('.flexnav').toggleClass('flexnav-show');
  });
  $('.item-with-ul + a').on('click', function(e) {
    var $sub, $touchButton;
    $sub = $(this).parent('.item-with-ul').find('>ul');
    $touchButton = $(this).parent('.item-with-ul').find('>span.touch-button');
    if ($nav.hasClass('lg-screen') === true) {
      $(this).parent('.item-with-ul').siblings().find('ul.flexnav-show').removeClass('flexnav-show').hide();
    }
    if ($sub.hasClass('flexnav-show') === true) {
      $sub.removeClass('flexnav-show').slideUp(settings.animationSpeed);
      $touchButton.removeClass('active');
    } else if ($sub.hasClass('flexnav-show') === false) {
      $sub.addClass('flexnav-show').slideDown(settings.animationSpeed);
      $touchButton.addClass('active');
    }
    e.preventDefault();
    return e.stopPropagation();
  });
  $nav.find('.item-with-ul *').focus(function() {
    $(this).parent('.item-with-ul').parent().find(".open").not(this).removeClass("open").hide();
    return $(this).parent('.item-with-ul').find('>ul').addClass("open").show();
  });
  resizer();
  return $(window).on('resize', resizer);
};
