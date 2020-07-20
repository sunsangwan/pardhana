/* 
    Core
    Global
    cookieManager
    privacypolicy

*/
var debug = 1;
var $window, root, body, scrollTop;
var catpagenumber = 1;
var pagenumber = 2;
var fixedOffset;

Number.isInteger = Number.isInteger || function(value) {
    return typeof value === "number" && 
    isFinite(value) && 
    Math.floor(value) === value;
};

function isEmail(email) { 
    return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(email);
}

function logm($message) {
    if (debug==1) {
        console.log($message);
    }
}

/* Core
   ----------------------------------------------------------------- */

var Core = {

    init: function() {
        $window = jQuery(window);
        root = jQuery('html, body');
        body = jQuery('body');
        $window.on('ready scroll', function() {
            scrollTop = $window.scrollTop();
        });
    }
};


var Global = {
    init: function() {
        // cookieManager.init();
        this.selectDropdown();
        this.overlaymenu();
        this.carouselSlide();

        jQuery(".wpcf7-validates-as-required").after('<i class="iconc-more removeInputText"></i>');
        jQuery(document).on("click", ".removeInputText", function(){
            jQuery(this).parent().find('input').val("");
        });
        // jQuery(".btn-orange").click(function(){
        //     var $valid =  jQuery("#actualiteiten-singleForm").valid();
        //     if(!$valid) {
        //         return false;
        //     }
        //     return false;
        // })
    },

    overlaymenu : function() {
        jQuery(".strip-call").click(function(){
            jQuery(".overlay-menu").slideToggle();
            return false;
        });

        jQuery(".overlay-close").click(function(){
            jQuery(".overlay-menu").slideToggle();
            return false;
        });
    },

    selectDropdown : function() {
        jQuery(".style-select2 select").select2();
    },

    carouselSlide : function() {
        jQuery("#myCarouselTop").on('slide.bs.carousel', function(evt) {
            var currentSlide =  jQuery(evt.relatedTarget).index();
            jQuery('#myCarouselDescription').carousel(currentSlide);
        })
    }
}

var cookieManager = {
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

var Shared = {
    popupmessage : function(message) {
        var random = Math.round(new Date().getTime() + (Math.random() * 100));
        var popupid = "popup_" + random;
        var popupid_close = "." + popupid + '_close';

        var message_div =  jQuery('<div class="uninstall_popup" id="'+popupid+'" ><a href="#" class="'+popupid+'_close popup_close_btn"><i class="fa fa-close"></i></a><div class="message">'+message+'</div></div>');

        var popup = jQuery(message_div).popup({
           color: 'rgb(0,0,0)',
           opacity: 0.8,
           scrolllock: true,
           autoopen: true,
           offsettop : 50,
           transition: 'all 0.5s',
        });

        jQuery(popupid_close).click(function(){
            var onclose = args['btnclose_onclick'] ? args['btnclose_onclick']() : function() {};
        })
        return popupid;
    },
}    



var pageHome = {
    init: function() {
        jQuery(".event_accordion" ).accordion({
            heightStyle: "content",
            active: false,
            collapsible: true
        });
    }
}

var pageLecture = {
    init: function() {
        jQuery(".lecture_accordion" ).accordion({
            heightStyle: "content",
            active: false,
            collapsible: true
        });
    }
}

/* Start ------------------------------------- */

jQuery(function() {
    Core.init();
    Global.init();

    if(body.hasClass("page-template-page-home")) {
        pageHome.init();
    }

    if(body.hasClass('page-template-page-lecture')) {
        pageLecture.init();
    }
});
