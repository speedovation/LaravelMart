var $;

$ = jQuery;

$.fn.extend({
  easyResponsiveTabs: function(options) {
    var accord, defaults, hash, historyApi, jfit, jtype, jwidth, opt, vtabs;
    defaults = {
      type: "default",
      width: "auto",
      fit: true,
      closed: false,
      activate: function() {}
    };
    options = $.extend(defaults, options);
    opt = options;
    jtype = opt.type;
    jfit = opt.fit;
    jwidth = opt.width;
    vtabs = "vertical";
    accord = "accordion";
    hash = window.location.hash;
    historyApi = !!(window.history && history.replaceState);
    historyApi = false;
    $(this).bind("tabactivate", function(e, currentTab) {
      if (typeof options.activate === "function") {
        return options.activate.call(currentTab, e);
      }
    });
    return this.each(function() {
      var $respTabs, $respTabsList, $tabContent, $tabItemh2, count, itemCount, jtab_options, matches, respTabsId, tabNum;
      jtab_options = function() {
        if (jtype === vtabs) {
          $respTabs.addClass("resp-vtabs");
        }
        if (jfit === true) {
          $respTabs.css({
            width: "100%",
            margin: "0px"
          });
        }
        if (jtype === accord) {
          $respTabs.addClass("resp-easy-accordion");
          return $respTabs.find(".resp-tabs-list").css("display", "none");
        }
      };
      $respTabs = $(this);
      $respTabsList = $respTabs.find("ul.resp-tabs-list");
      respTabsId = $respTabs.attr("id");
      $respTabs.find("ul.resp-tabs-list li").addClass("resp-tab-item");
      $respTabs.css({
        display: "block",
        width: jwidth
      });
      $respTabs.find(".resp-tabs-container > div").addClass("resp-tab-content");
      jtab_options();
      $tabItemh2 = void 0;
      $respTabs.find(".resp-tab-content").before("<h2 class='resp-accordion' role='tab'></h2>");
      itemCount = 0;
      $respTabs.find(".resp-accordion").each(function() {
        var $accItem, $tabItem;
        $tabItemh2 = $(this);
        $tabItem = $respTabs.find(".resp-tab-item:eq(" + itemCount + ")");
        $accItem = $respTabs.find(".resp-accordion:eq(" + itemCount + ")");
        $accItem.append($tabItem.html());
        $accItem.data($tabItem.data());
        $tabItemh2.attr("aria-controls", "tab_item-" + itemCount);
        return itemCount++;
      });
      count = 0;
      $tabContent = void 0;
      $respTabs.find(".resp-tab-item").each(function() {
        var $tabItem, tabcount;
        $tabItem = $(this);
        $tabItem.attr("aria-controls", "tab_item-" + count);
        $tabItem.attr("role", "tab");
        tabcount = 0;
        $respTabs.find(".resp-tab-content").each(function() {
          $tabContent = $(this);
          $tabContent.attr("aria-labelledby", "tab_item-" + tabcount);
          return tabcount++;
        });
        return count++;
      });
      tabNum = 0;
      if (hash !== "") {
        matches = hash.match(new RegExp(respTabsId + "([0-9]+)"));
        if (matches !== null && matches.length === 2) {
          tabNum = parseInt(matches[1], 10) - 1;
          if (tabNum > count) {
            tabNum = 0;
          }
        }
      }
      $($respTabs.find(".resp-tab-item")[tabNum]).addClass("resp-tab-active");
      if (options.closed !== true && !(options.closed === "accordion" && !$respTabsList.is(":visible")) && !(options.closed === "tabs" && $respTabsList.is(":visible"))) {
        $($respTabs.find(".resp-accordion")[tabNum]).addClass("resp-tab-active");
        $($respTabs.find(".resp-tab-content")[tabNum]).addClass("resp-tab-content-active").attr("style", "display:block");
      } else {
        $($respTabs.find(".resp-tab-content")[tabNum]).addClass("resp-tab-content-active resp-accordion-closed");
      }
      $respTabs.find("[role=tab]").each(function() {
        var $currentTab;
        $currentTab = $(this);
        return $currentTab.click(function() {
          var $tabAria, currentHash, newHash, re;
          $currentTab = $(this);
          $tabAria = $currentTab.attr("aria-controls");
          if ($currentTab.hasClass("resp-accordion") && $currentTab.hasClass("resp-tab-active")) {
            $respTabs.find(".resp-tab-content-active").slideUp("", function() {
              return $(this).addClass("resp-accordion-closed");
            });
            $currentTab.removeClass("resp-tab-active");
            return false;
          }
          if (!$currentTab.hasClass("resp-tab-active") && $currentTab.hasClass("resp-accordion")) {
            $respTabs.find(".resp-tab-active").removeClass("resp-tab-active");
            $respTabs.find(".resp-tab-content-active").slideUp().removeClass("resp-tab-content-active resp-accordion-closed");
            $respTabs.find("[aria-controls=" + $tabAria + "]").addClass("resp-tab-active");
            $respTabs.find(".resp-tab-content[aria-labelledby = " + $tabAria + "]").slideDown().addClass("resp-tab-content-active");
          } else {
            $respTabs.find(".resp-tab-active").removeClass("resp-tab-active");
            $respTabs.find(".resp-tab-content-active").removeAttr("style").removeClass("resp-tab-content-active").removeClass("resp-accordion-closed");
            $respTabs.find("[aria-controls=" + $tabAria + "]").addClass("resp-tab-active");
            $respTabs.find(".resp-tab-content[aria-labelledby = " + $tabAria + "]").addClass("resp-tab-content-active").attr("style", "display:block");
          }
          $currentTab.trigger("tabactivate", $currentTab);
          if (historyApi) {
            currentHash = window.location.hash;
            newHash = respTabsId + (parseInt($tabAria.substring(9), 10) + 1).toString();
            if (currentHash !== "") {
              re = new RegExp(respTabsId + "[0-9]+");
              if (currentHash.match(re) != null) {
                newHash = currentHash.replace(re, newHash);
              } else {
                newHash = currentHash + "|" + newHash;
              }
            } else {
              newHash = "#" + newHash;
            }
            return history.replaceState(null, null, newHash);
          }
        });
      });
      return $(window).resize(function() {
        return $respTabs.find(".resp-accordion-closed").removeAttr("style");
      });
    });
  }
});
