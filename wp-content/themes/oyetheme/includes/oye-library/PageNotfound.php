<?php
namespace Oye;

class PageNotfound {

    public function __construct ($args=[]) {
        $this->variables = Helpers::shortcode_atts_empty(array(
            'title' => __('Helaas.. de opgevraagde pagina bestaat niet.', 'oyetheme_oldbrowser'),
            'button_text' => __('Naar homepage', 'oyetheme_oldbrowser'),
            'button_link' => site_url(),
            'page_background_color' => '#737477',
            'page_text_color' => '#fff',
            'button_background_color' => '#fff',
            'button_text_color' => '#000',
            'button_hover_background_color' => '#f5f5f5',
            'button_hover_text_color' => '#000',
            'head_start_customcode' => null,
            'head_close_customcode' => null,
            'body_start_customcode' => null,
        ), $args);

        // $this->variables['button_link'] = $this->variables['button_link'] ?: site_url();

        add_action( 'wp', function() {
    	   $this->init();
        });
    }

    public function init() {
        $this->_load_page();
    }

    function _load_page() {
    	if ( is_404() ) {
    		echo $this->render_template();
    		die();
    	}
    }
    
    function render_template() {
        $twig = new Twig;
        $twig->load_views_default();
        $template = $twig->instance->load('404.twig');
        return $template->render($this->variables);
    }
}


?>