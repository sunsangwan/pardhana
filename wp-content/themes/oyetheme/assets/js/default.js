var module_cookieMessage = {
    init : function(){
        var self = this;
        jQuery('#cookie-accordian li.active input').prop('checked', true);

        var cookiesavedid = Cookies.get('cookie_catid');
        if (cookiesavedid == '') {
            return false;
        } else if(cookiesavedid) {
            this.startUnsetTimer();
        } else {
            jQuery("#cookie-strip").fadeIn(500);
        }

        jQuery("#cookie-strip .popup-strip-btn, #cookie-strip .cookie-accept-btn").click(function(){
            Cookies.set('cookie_catid', '', { expires: 30 });
            jQuery("#cookie-strip").fadeOut(500);
            return false;
        });

        jQuery("#popup-cookie-accept").click(function(){
            Cookies.set('cookie_catid', '', { expires: 30 });
            jQuery("#cookie-strip").fadeOut(500);
        });

        jQuery("#cookie-strip .show-cookie-popup").click(function(){
            jQuery("#cookie-strip").fadeOut(500);
            jQuery("#cookie-popup").popup({
                color: 'rgb(0,0,0)',
                opacity: 0.8,
                escape: false,
                scrolllock: true,
                autoopen: true,
                transition: 'all 0.5s',
            });
            return false;
        });

        jQuery("#cookie-accordian label").click(function(){
            var self = jQuery(this);
            if (self.parent("li").hasClass("active")) {
                return false;
            }

            self.find("input").prop("checked", true);
            jQuery("#cookie-accordian .cookie-accordian-inner > li").removeClass("active");
            jQuery("#cookie-accordian .cookie-accordian-inner .slide").slideUp(400);
            self.parent("li").addClass("active").find(".slide").slideDown(400);
        });

        jQuery("#cookie-popup .cookies-btn-link").click(function(){
            var selectedcookie = jQuery(".cookie-accordian-inner .active input").val();
            // console.log(selectedcookie);
            Cookies.set('cookie_catid', selectedcookie, { expires: 30 });
            self.startUnsetTimer();
            jQuery("#cookie-popup").popup('hide');
            return false;
        });
    },

    startUnsetTimer : function(){
        setInterval(this.checkAndUnset,3000);
    },

    checkAndUnset : function(){
        var browsercookies = Cookies.get();
        var getcookiesaved = Cookies.get('cookie_catid');
        // console.log(Cookies.get());
        jQuery.each(browsercookies, function (key, data) {
            if(!cookiejsondata[getcookiesaved][key]) {
                if (!exceptionarray[key]) {
                    Cookies.remove(key, { path: "/"});
                }
            }
        });
    }
}

var module_oldBrowser = {
    init: function() {
        var browser = jQuery.browser;
        var isOldBrowser = false;

        if (browser.desktop) {
            //console.log("Desktop")
            if (browser.chrome && browser.versionNumber < 31 || browser.mozilla && browser.versionNumber < 34 || browser.msie && browser.versionNumber < 9 || browser.safari && browser.versionNumber < 7 || browser.opera && browser.versionNumber < 26) {
                isOldBrowser = true;
            }
        }

        if (browser.mobile) {
            //console.log("Mobile");
            // jQuery("body").html(JSON.stringify(browser));
            if (browser.iphone && browser.versionNumber < 7 || browser.ipad && browser.versionNumber < 7 || browser.msie && browser.versionNumber < 9 || browser.android && browser.chrome && browser.webkit && browser.versionNumber < 27 // Chrome for Android
                || browser.android && browser.safari && browser.versionNumber < 4.4 // Native Browser in Android
            ) {
                isOldBrowser = true;
            }

        }
        
        

        if (isOldBrowser) {
            window.location.href = base_url + "/oldbrowser"
        }
    }
}


var module_notificationBar = {
    init: function() {
        var _this = this;
        this.el = (".notification-bar");
        this.$el = jQuery(this.el);
        this.$elCloseButton = jQuery(".notification-bar__inner__closebtn");
        this.$elCloseButton.click(function() {
            jQuery( this).parents(_this.el).fadeOut( "slow", function() {
                _this.setBodyMargin();
            });
            return false;
        });
        
        this.setBodyMargin();
    },

    setBodyMargin: function() {
        var numItems = this.$el.filter(":visible").length;
        if (numItems == 0){
            jQuery("body").removeClass("is_notification_bar");
            jQuery("body").animate({"margin-top":""}, 300);
        } else {
            jQuery("body").addClass("is_notification_bar");
            jQuery("body").animate({"margin-top":"50px"}, 300);
        }
    }
}


var scrollBackButton = {
    init: function() {
        jQuery(window).on('resize load', function(){
            jQuery('.scroll_back_btns').fadeOut();
            jQuery(window).scroll(function(){
                if (jQuery(this).scrollTop() > 300) {
                    jQuery('.scroll_back_btns').fadeIn();
                } else {
                    jQuery('.scroll_back_btns').fadeOut();
                }
            });

            jQuery("#main-inner").scroll(function(){
                if (jQuery(this).scrollTop() > 300) {
                    jQuery('.scroll_back_btns').fadeIn();
                } else {
                    jQuery('.scroll_back_btns').fadeOut();
                }
            });

            //Click event to scroll to top
            jQuery(document).on('click','.scroll_back_btns .back-to-top', function(){
                jQuery('html, body, #main-inner').animate({scrollTop : 0},800);
                return false;
            });
        });
    },
}


var pageLegal = {
    init: function() {
        this.stickyHeader();
    },

    stickyHeader : function(){
        jQuery(window).scroll(function(){
            if (jQuery(window).scrollTop() >= 10) {
                jQuery('.privacyPolicyCt-header-inner').addClass('sticky');
            } else {
                jQuery('.privacyPolicyCt-header-inner').removeClass('sticky');
            }
        });
        jQuery(".main").scroll(function(){
            if (jQuery(".main").scrollTop() >= 10) {
                jQuery('.privacyPolicyCt-header-inner').addClass('sticky');
            } else {
                jQuery('.privacyPolicyCt-header-inner').removeClass('sticky');
            }
        });
    }
}


jQuery(function() {
    if(MODULE_COOKIE) {
        module_cookieMessage.init();
    }

    if(PAGE_OLDBROWSER) {
        module_oldBrowser.init();
    }

    if(MODULE_NOTIFICATION_BAR) {
        module_notificationBar.init();
    }

    if(SCROLL_BACK_BUTTON) {
        scrollBackButton.init();
    }

    if(jQuery("body").hasClass('page-template-page-legal')) {
        pageLegal.init();
    }
});