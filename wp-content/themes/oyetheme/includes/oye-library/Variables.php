<?php
namespace Oye;

class Variables {
    public $variables = [];
    public $theme_opt_new = null;

    public function __construct ($args=[]) {
       // $this->init();
    }

    public function init() {
        // $this->add_var('theme_opt', $this->_processPublicThemeOptions());
        add_action('init', array( $this, '_processPublicThemeOptions'),0);

        add_action('wp_head', array( $this, 'process_head'),0);
    }

    function process_head() {
        // var_dump($this->variables);
        $output = "<script>\n";
        foreach ($this->variables as $key => $variable) {
            $value = $variable['value'];
            $value = is_array($value) ? json_encode($value) : $value;
            $value = $variable['string'] ? "'" . $value . "'" : $value;
            $output .= 'var '.$variable['key'].' = '.$value.";\n";
        }
        $output .= "</script>";
        echo $output;
    }


    function add_var($key, $value, $string=true) {
        $this->variables[] = [
            'key' => $key,
            'value' => $value,
            'string' => $string,
        ];
    }


    /*
        Some Fields i do not want to appear as Json because it can be vulnerable to security 
        for e.g. if we are savign API Keys in theme options so i am removing those keys from theme options and then add to json
        so i created custom variable in redux-config 'public' => 1 so just add to each fields array in redux-config.php file in order show that field on Frontend
        NOTE: By default all the Key will be PRIVATE
    */
    function _processPublicThemeOptions(){
        if ( ! class_exists("\Redux") ) { return; }
        global $theme_opt;

        $theme_opt_new = $theme_opt;
        $fields = \Redux::$fields;

        foreach ($fields["theme_opt"] as $key => $value) {
            if($value['public']) {
                continue;
            }
            unset($theme_opt_new[$key]);
        }

        $this->add_var('theme_opt', $theme_opt_new, false);
        // return $theme_opt_new;
        // $this->variables['public']['theme_opt'] = $theme_opt_new;
    }

   
}


?>