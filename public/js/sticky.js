(function($) {
  var $document, $window, defaults, methods, resizer, scroller, sticked, windowHeight;
  defaults = {
    topSpacing: 0,
    bottomSpacing: 0,
    className: "is-sticky",
    wrapperClassName: "sticky-wrapper",
    center: false,
    getWidthFrom: ""
  };
  $window = $(window);
  $document = $(document);
  sticked = [];
  windowHeight = $window.height();
  scroller = function() {
    var documentHeight, dwh, elementTop, etse, extra, i, newTop, s, scrollTop, _results;
    scrollTop = $window.scrollTop();
    documentHeight = $document.height();
    dwh = documentHeight - windowHeight;
    extra = (scrollTop > dwh ? dwh - scrollTop : 0);
    i = 0;
    _results = [];
    while (i < sticked.length) {
      s = sticked[i];
      elementTop = s.stickyWrapper.offset().top;
      etse = elementTop - s.topSpacing - extra;
      if (scrollTop <= etse) {
        if (s.currentTop !== null) {
          s.stickyElement.css("position", "").css("top", "");
          s.stickyElement.parent().removeClass(s.className);
          s.currentTop = null;
        }
      } else {
        newTop = documentHeight - s.stickyElement.outerHeight() - s.topSpacing - s.bottomSpacing - scrollTop - extra;
        if (newTop < 0) {
          newTop = newTop + s.topSpacing;
        } else {
          newTop = s.topSpacing;
        }
        if (s.currentTop !== newTop) {
          s.stickyElement.css("position", "fixed").css("top", newTop);
          if (typeof s.getWidthFrom !== "undefined") {
            s.stickyElement.css("width", $(s.getWidthFrom).width());
          }
          s.stickyElement.parent().addClass(s.className);
          s.currentTop = newTop;
        }
      }
      _results.push(i++);
    }
    return _results;
  };
  resizer = function() {
    return windowHeight = $window.height();
  };
  methods = {
    init: function(options) {
      var o;
      o = $.extend(defaults, options);
      return this.each(function() {
        var stickyElement, stickyId, stickyWrapper, wrapper;
        stickyElement = $(this);
        stickyId = stickyElement.attr("id");
        wrapper = $("<div></div>").attr("id", stickyId + "-sticky-wrapper").addClass(o.wrapperClassName);
        stickyElement.wrapAll(wrapper);
        if (o.center) {
          stickyElement.parent().css({
            width: stickyElement.outerWidth(),
            marginLeft: "auto",
            marginRight: "auto"
          });
        }
        if (stickyElement.css("float") === "right") {
          stickyElement.css({
            float: "none"
          }).parent().css({
            float: "right"
          });
        }
        stickyWrapper = stickyElement.parent();
        stickyWrapper.css("height", stickyElement.outerHeight());
        return sticked.push({
          topSpacing: o.topSpacing,
          bottomSpacing: o.bottomSpacing,
          stickyElement: stickyElement,
          currentTop: null,
          stickyWrapper: stickyWrapper,
          className: o.className,
          getWidthFrom: o.getWidthFrom
        });
      });
    },
    update: scroller
  };
  if (window.addEventListener) {
    window.addEventListener("scroll", scroller, false);
    window.addEventListener("resize", resizer, false);
  } else if (window.attachEvent) {
    window.attachEvent("onscroll", scroller);
    window.attachEvent("onresize", resizer);
  }
  $.fn.sticky = function(method) {
    if (methods[method]) {
      return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
    } else if (typeof method === "object" || !method) {
      return methods.init.apply(this, arguments);
    } else {
      return $.error("Method " + method + " does not exist on jQuery.sticky");
    }
  };
  return $(function() {
    return setTimeout(scroller, 0);
  });
})(jQuery);
