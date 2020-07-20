<?php
namespace Oye;

class ScrollBackButton {
    public function __construct ($args=[]) {
       
        add_action( 'wp_footer', array($this, 'render_template'));
   
    }

    public function init() {
     //    $this->_load_page();
        
    }


    function render_template() {
        $twig = new Twig;
        $twig->load_views_default();
        $template = $twig->instance->load('scroll-back-button.twig');
        echo $template->render();
    }
}


?>