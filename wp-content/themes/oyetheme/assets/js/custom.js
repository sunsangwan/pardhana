/* 
    Core
    Global
*/
var debug = 1;
var $window, root, body, scrollTop;


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

var Shared = {
   
}    


var Global = {
    init: function() {
        jQuery('a#nav-toggle, .overlay-close').click(function(){
            jQuery('.overlay-menu').slideToggle(500);
            return false;
        });

        Shared.formNewsletter();
        Shared.testimonialCarousel();

        var d = new Date();
        var dayOfWeek = d.getDay();
        var hour = d.getHours();
        // var mins = d.getMinutes();
        var status = 'open';
        if (dayOfWeek !== 6 && dayOfWeek !== 0 && hour >= 9 && hour < 19){
            jQuery('.hours').show();
            jQuery('.closed').hide();
        } else if (dayOfWeek == 5 && hour >= 9 && hour < 17){
            jQuery('.hours').show();
            jQuery('.closed').hide();
        } else{
            jQuery('.hours').hide();
            jQuery('.closed').show();
        }
    },
}

var Shared = {
    estimateForm: function(action) {
        switch (action) {
            case "show":
                jQuery('#estimate_popup').popup({
                   color: 'rgb(0,0,0)',
                   opacity: 0.8,
                   scrolllock: true,
                   autoopen: true,
                   offsettop : 50,
                   transition: 'all 0.5s',
                });
                break;
            case "hide":
                 jQuery('#estimate_popup').popup('hide');
                break;
        }
    },


    formNewsletter: function() {
        jQuery(".form-newsletter-signup").submit(function(e){
            e.preventDefault();
            var $valid = jQuery(this).valid();
            if (!$valid) {
                return false;
            }

            var data = jQuery(this).serialize() + '&action=signup_newsletter';

            jQuery.ajax({
                url : admin_ajax_url,
                dataType : 'JSON',
                type : 'POST',
                data : data,
                success: function(data) {
                    if(data.status_code==200) {
                        toastr.success(data.message);
                    } else {
                        toastr.error(data.message);
                    }
                }
            });
        });
    },

    testimonialCarousel: function() {
        jQuery(".testimonial-carousel").owlCarousel({
                items:3,
                margin:5,
                // nav:true,
                responsive:{
                    0: {
                        items:1
                    },
                    767: {
                        items: 2
                    },
                    991: {
                        items: 2
                    },
                    1200: {
                        items:3
                    },
                    1500: {
                        items:3
                    }
                }
            });
    }
}


var pageHome = {
    init: function() {
        
    },
}

var pageFaq = {
    init: function() {
        jQuery( "#accordion" ).accordion({
            heightStyle: "content",
        });
        // jQuery( "#accordion2" ).accordion({
        //     heightStyle: "content",
        // });
    },
}

var pageService = {
    init: function() {
        jQuery('#myTab').tabCollapse({
            tabsClass: 'hidden-md hidden-sm hidden-xs',
            accordionClass: 'visible-md visible-sm visible-xs'
        });
    },
}



/* Start ------------------------------------- */

jQuery(function() {
    Core.init();
    Global.init();
    
    if(body.hasClass("page-template-page-home")) {
        pageHome.init();
    }

    if(body.hasClass("page-template-page-faq")) {
        pageFaq.init();
    }

    if(body.hasClass("page-template-page-service")) {
        pageService.init();
    }

});

