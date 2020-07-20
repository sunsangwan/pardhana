<?php
namespace Oye;
Class Core {
	public function __construct() {
		
		if(PAGE_OLDBROWSER) {
			$this->pageoldbrowser();
		}

		if(PAGE_404) {
			$this->pagenotfound();
		}

		if(MODULE_COOKIE) {
			$this->cookie_message();
		}

		if(MODULE_NOTIFICATION_BAR) {
			$this->notification_bar();
		}

		

		if(SCROLL_BACK_BUTTON) {
			new ScrollBackButton;
		}
		
		$this->menu_overlay();
		new RequiredPluginForTheme;
	}


	function init() {
		
	}

	function pagenotfound() {
		global $theme_opt;
		// var_dump($theme_opt);

		$args = array(
            'title' => $theme_opt['pagenotfound_title'],
            'button_text' => $theme_opt['pagenotfound_button_text'],
            'button_link' => $theme_opt['pagenotfound_button_link'],
            'page_background_color' => $theme_opt['pagenotfound_page_background_color'],
            'page_text_color' => $theme_opt['pagenotfound_page_text_color'],
            'button_background_color' => $theme_opt['pagenotfound_button_background_color'],
            'button_text_color' => $theme_opt['pagenotfound_button_text_color'],
            'button_hover_background_color' => $theme_opt['pagenotfound_button_hover_background_color'],
            'button_hover_text_color' => $theme_opt['pagenotfound_button_hover_text_color'],
            'head_start_customcode' => $theme_opt['head_start_customcode'],
            'head_close_customcode' => $theme_opt['head_close_customcode'],
            'body_start_customcode' => $theme_opt['body_start_customcode'],
            
        );
		$this->pagenotfound = new PageNotfound($args);
	}

	function pageoldbrowser() {
		global $theme_opt;
		$args = array(
            'chrome_downloadlink' => $theme_opt['oldbrowser_chrome_downloadlink'],
            'chrome_image' => $theme_opt['oldbrowser_chrome_image']['url'],
            'firefox_downloadlink' => $theme_opt['oldbrowser_firefox_downloadlink'],
            'firefox_image' => $theme_opt['oldbrowser_firefox_image']['url'],
            'ie_downloadlink' => $theme_opt['oldbrowser_ie_downloadlink'],
            'ie_image' => $theme_opt['oldbrowser_ie_image']['url'],
            'page_background_color' => $theme_opt['oldbrowser_page_background_color'],
            'page_text_color' => $theme_opt['oldbrowser_page_text_color'],
            'title' => $theme_opt['oldbrowser_title'],
            'download_here_title' => $theme_opt['oldbrowser_download_here_title'],
            'head_start_customcode' => $theme_opt['head_start_customcode'],
            'head_close_customcode' => $theme_opt['head_close_customcode'],
            'body_start_customcode' => $theme_opt['body_start_customcode'],
            
        );


		$this->oldbrowser = new PageOldbrowser($args);		
		$this->oldbrowser->init();
		
	}

	function cookie_message() {
		global $theme_opt;
		$args = array(
            'message_title' => $theme_opt['cookie_message_title'],
            'message_description' => $theme_opt['cookie_message_description'],
            'privacy_policy_title' => $theme_opt['cookie_message_privacy_policy_title'],
            'privacy_policy_link' => $theme_opt['cookie_message_privacy_policy_link'],
            'donotshowagain_title' => $theme_opt['cookie_message_donotshowagain_title'],
            'strip_we_accept_title' => $theme_opt['cookie_message_strip_we_accept_title'],
            'strip_cookies_title' => $theme_opt['cookie_message_strip_cookies_title'],
            'strip_iagree_title' => $theme_opt['cookie_message_strip_iagree_title'],
            
        );
		$this->cookie_message = new CookieMessage($args);		
	}

	function notification_bar() {
		global $theme_opt;
	
		$this->notification_bar = new NotificationBar();
	}

	function menu_overlay() {
		global $theme_opt;
		$args = array(
            'menu_overlay_background' => $theme_opt['menu_overlay_background'],
            'menu_overlay_color' => $theme_opt['menu_overlay_color'],
            'menu_overlay_name' => $theme_opt['menu_overlay_name'],
            
        );

		$this->menu_overlay = new MenuOverlay($args);		
	}
	
	
}