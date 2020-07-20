<?php
namespace Oye;

class PageOldbrowser {
    public static $route = 'oldbrowser';
    public function __construct ($args=[]) {
        $this->variables = Helpers::shortcode_atts_empty(array(
            'chrome_downloadlink' => 'https://www.google.nl/chrome/browser/desktop/',
            'chrome_image' => get_template_directory_uri().'/images/default/chrome.png',
            'firefox_downloadlink' => 'https://www.mozilla.org/nl/firefox/new/',
            'firefox_image' => get_template_directory_uri().'/images/default/firefox.png',
            'ie_downloadlink' => 'http://windows.microsoft.com/en-IN/internet-explorer/download-ie',
            'ie_image' => get_template_directory_uri().'/images/default/internet_explorer.png',
            'page_background_color' => '#737477',
            'page_text_color' => '#fff',
            'title' => __('Oeps.. uw browser is écht aan vernieuwing toe.', 'oyetheme_oldbrowser'),
            'download_here_title' => __('download hier:', 'oyetheme_oldbrowser'),
            'head_start_customcode' => null,
            'head_close_customcode' => null,
            'body_start_customcode' => null,
            
        ), $args);

    	// $this->init();
    }

    public function init() {
        add_action( 'wp', function() {
            $this->_load_page();
        	$this->redirect_ifIE();
        });
    }

    function _load_page() {
    	$url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
        $parts = explode('/', $url_path);
        $segment = end($parts);
        // echo $last;
    	if ($segment == self::$route) {
    		echo $this->render_template();
    		die();
    	}
    }

    public function redirect_ifIE() {
    	if(preg_match('/(?i)msie [5-9]/',$_SERVER['HTTP_USER_AGENT'])) {
            // if IE<=8
            wp_redirect( site_url().self::$route );
            exit;
        }
    }

    function render_template() {
        $twig = new Twig;
        $twig->load_views_default();
        $template = $twig->instance->load('oldbrowser.twig');
        return $template->render($this->variables);
    }

    function setRoute($route1) {
        self::$route = $route1;
    }
}


?>