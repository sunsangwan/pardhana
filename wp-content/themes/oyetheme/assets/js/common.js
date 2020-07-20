var Common = {

	pageLoader: function() {
		var self = this;

		jQuery('<div></div>').appendTo('body').addClass('loader');
		jQuery('<div></div>').appendTo('body').addClass('overlay-cover');

		this.el = jQuery('.loader');
		this.overlayEl = jQuery('.overlay-cover');

		this.overlayEl.show(function() {
			jQuery("html").css({
				"opacity": 1,
				"background": ""
			});
		});

		this.el.show();

		//// IE9  jQuery(window).load was not working so changed it like this
		window.onload = function() {
			self.overlayEl.fadeOut("slow").remove();
			self.el.hide().remove();
		}
	},

	circleLoader: function(action) {
		var self = this;
		switch (action) {
		    case "show":
		    	jQuery('<div></div>').appendTo('body').addClass('loader');
		        this.el = jQuery('.loader');
		        return this.el.show();
		        break;
		    case "hide":
		    	this.el = jQuery('.loader');
		        return  this.el.hide().remove();
		        break;
		}
	},

	popupmessage : function(message) {
		var args = arguments[1] || [];
		args['content_class'] = args['content_class'] || "";
        var random = Math.round(new Date().getTime() + (Math.random() * 100));
        var popupid = "popup_" + random;
        var popupid_close = "." + popupid + '_close';

        var message_div =  jQuery('<div class="'+args['content_class']+'" id="'+popupid+'" ><a href="#" class="'+popupid+'_close popup_close_btn"><i class="fa fa-close"></i></a><div class="message">'+message+'</div></div>');

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