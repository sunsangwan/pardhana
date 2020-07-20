<?php
namespace Oye;

class CookieMessage {
    public function __construct ($args=[]) {
        $this->variables = Helpers::shortcode_atts_empty(array(
            'message_title' => __('onze cookies.', 'oyetheme_cookiemessage'),
            'message_description' => __('Onze website maakt gebruik van cookies. We doen dit om de prestaties van onze website te optimaliseren en in staat zijn om onze diensten en marketing aan te passen aan onze bezoekers. Accepteert u dat wij plaatsen deze cookies? Bekijk ons %s voor meer informatie over de specifieke cookies plaatsen we.', 'oyetheme_cookiemessage'),
            'privacy_policy_title' => __('​​privacybeleid', 'oyetheme_cookiemessage'),
            'privacy_policy_link' => '/privacy',
            'donotshowagain_title' => __('NIET MEER TONEN', 'oyetheme_cookiemessage'),
            'strip_we_accept_title' => __('We gebruiken', 'oyetheme_cookiemessage'),
            'strip_cookies_title' => __('cookies', 'oyetheme_cookiemessage'),
            'strip_iagree_title' => __('Vind ik goed', 'oyetheme_cookiemessage'),
        ), $args);


        $this->variables['message_description'] = sprintf($this->variables['message_description'], '<a href="'.site_url($this->variables['privacy_policy_link']).'">'.$this->variables['privacy_policy_title'].'</a>');

        add_action( 'init', array($this, 'register_cpt'));
        add_action( 'wp_footer', array($this, 'render_template'));
        add_shortcode( 'cookie', array($this, 'wpshortcode_cookie') );
        add_action( 'wp', array($this, 'cookie_load_json_head'));
    	// $this->register();
    }

    public function init() {
     //    $this->_load_page();
    	
    }

    function register_cpt() {
        register_post_type( 'cookie_manager',
            array(
                'labels' => array(
                    'name' => 'Cookie Manager',
                ),
                'public' => true,
                'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
                'has_archive' => false
            )
        );

        register_taxonomy(
            'cookie_manager_cat',
            'cookie_manager',
            array(
                'label' => __( 'Cookies Manager Category' ),
                'rewrite' => array( 'slug' => 'cookie_manager_cat' ),
                'hierarchical' => true,
        
            )
        );
    }

    function wpshortcode_cookie($atts) {
        $attr = shortcode_atts( array(
            'catid' => '',
        ), $atts);

        $catid = $attr['catid'];

        $catid = $catid ? $catid : 0;

        if ($catid == 0) {
            $tax_query = [];
        } else {
            $catidarray = explode(',', $catid);
            $tax_query[] = array(
                'taxonomy' => 'cookie_manager_cat',
                'field'    => 'term_id',
                'terms'    => $catidarray
            );
        }

        $args = array(
        'post_type' => 'cookie_manager',
        'posts_per_page' => '10',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'tax_query' => $tax_query,
        "suppress_filters" => false
        );

        $cookieposts = get_posts($args);
        $output = '<table class="table"><tbody>';

        foreach ($cookieposts as $cmpost) {
            $geplaatstfield = get_post_meta($cmpost->ID, 'oyemetatpl_geplaatst_door', true);;
            $termijn = get_post_meta($cmpost->ID, 'oyemetatpl_termijn', true);
            $output .= "<tr class=cookie-".$cmpost->ID.">
                        <td><h4>".__('Name','oyetheme')."</h4><p>".$cmpost->post_title."</p></td>
                        <td><h4>".__('Placed by','oyetheme')."</h4><p>".$geplaatstfield."</p></td>
                        <td><h4>".__('Reason','oyetheme')."</h4><p>".$cmpost->post_content."</p></td>
                        <td><h4>".__('Deadline','oyetheme')."</h4><p>".$termijn."</p></td>
                    </tr>";
        }

        $output .= "</tbody></table>";

        return $output;
    }


    // add_action('wp_head','cookie_load_json_head');
    function cookie_load_json_head() {
        $categories = get_terms('cookie_manager_cat');
        $chjson = array();
        foreach ($categories as $category) {
            $chjson[$category->term_id] = $this->generatejson($category->term_id);
        }

        $cookieexception = array(
            "cookie_catid" => "cookie_catid",
        );

        // $cookieoutput = "<script>var cookiejsondata = ".json_encode($chjson)."; var exceptionarray = ".json_encode($cookieexception)."</script>";

        // echo $cookieoutput;

        $variable = new \Oye\Variables();
        $variable->add_var('cookiejsondata', $chjson, false);
        $variable->add_var('exceptionarray', $cookieexception, false);
        $variable->init();
    }


    function generatejson($catid) {
        $tax_query = '';
        $defargs = '';
        $tax_query[] = array(
            'taxonomy' => 'cookie_manager_cat',
            'field'    => 'term_id',
            'terms'    => $catid
        );

        $defargs = array(
            'post_type' => 'cookie_manager',
            'posts_per_page' => '10',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'tax_query' => $tax_query
        );

        $postsdata = get_posts($defargs);
        $ineerdata = array();
        foreach ($postsdata as $postarray) {
            $ineerdata[$postarray->post_title] = $postarray->post_title;
        }

        return $ineerdata;
    }

    function render_template() {
        $categories = get_terms('cookie_manager_cat', array('orderby'=>'slug','order'=>'DESC'));
        $this->variables['categories'] = $categories;

        $twig = new Twig;
        $twig->load_views_default();
        $template = $twig->instance->load('cookie-message.twig');
        echo $template->render($this->variables);
    }
}


?>