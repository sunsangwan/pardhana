<?php
namespace Oye;
class Twig {
    public $dir_views = null;
    public $dir_views_default = null;

    public $instance = null;
    public function __construct () {
    	$this->dir_views = get_template_directory().'/views';
        $this->dir_views_default = $this->dir_views.'/default';
    }

    function load_views() {
        $loader = new \Twig_Loader_Filesystem($this->dir_views);
        $twig = new \Twig_Environment($loader, array(
            // 'cache' => '/path/to/compilation_cache',
            // 'debug' => true,

        ));

        // $twig->addExtension(new Twig_Extension_Debug());

        $this->instance = $twig;
    }

    function load_views_default() {
    	$loader = new \Twig_Loader_Filesystem($this->dir_views_default);
        $twig = new \Twig_Environment($loader, array(
            // 'cache' => '/path/to/compilation_cache',
        ));

        $this->instance = $twig;
        // $template = $twig->load('form.html');
        // echo $template->render(array('the' => 'variables', 'go' => 'here'));
    }

   
}


?>