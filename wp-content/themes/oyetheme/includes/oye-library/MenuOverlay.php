<?php
namespace Oye;

class MenuOverlay {
    public function __construct ($args=[]) {
        $this->variables = Helpers::shortcode_atts_empty(array(
            'menu_overlay_background' => '#fff',
            'menu_overlay_color' => '#000',
            'menu_overlay_name' => __('header_menu', 'oyetheme_menuoverlay'),
        ), $args);


        $this->variables['menu_list'] = wp_nav_menu(array(
            'menu' => $this->variables['menu_overlay_name'],
            'container' => false,
            'menu_class' => 'overlay-menulist',
            'echo' => false
        ));
   
        add_action( 'wp_footer', array($this, 'render_template'));
   
    }

    public function init() {
     //    $this->_load_page();
    	
    }


    function render_template() {
        $twig = new Twig;
        $twig->load_views_default();
        $template = $twig->instance->load('menu-overlay.twig');
        echo $template->render($this->variables);
    }
}


?>