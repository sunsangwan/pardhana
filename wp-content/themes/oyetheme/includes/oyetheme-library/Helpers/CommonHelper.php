<?php
namespace OyeTheme\Helpers;


use OyeTheme\Transformers\PageTransformer;
use Oye\ResponseHelper;
class CommonHelper {
    public function __construct() {
        
    }

    public static function wrapContentInPopup($id, $html){
        $context = \Timber::get_context();
        $context['id'] = $id;
        $context['html'] = $html;
        return \Timber::compile('views/default/popup-wrapper.twig', $context);

    }


    public static function signupNewsletter($email) {
        global $theme_opt;

        include(locate_template('madmimi-php-master/MadMimi.class.php'));

        $mailer = new \MadMimi($theme_opt['newsletter_api_email'], $theme_opt['newsletter_api_key']); 
        $member_search = $mailer->search( $email );
        var_dump($member_search);
        die();
        $member_exists = ( $member_search['success'] && $member_search['result']['count'] > 0 );
        if ( $member_exists ) {
            $response = ResponseHelper::error('400', 'subscription_failed', $theme_opt['newsletter_failed_message']);
        }else {
            $mailer->AddMembership($theme_opt['newsletter_api_list_name'], $email);
            $response = ResponseHelper::ok('200', 'subscription_successfull', $theme_opt['newsletter_success_message']);
        }
        return $response;        
    }


    public static function getRecentTestimonials_Transformed(){
        $args = array(
            'posts_per_page'   => 20,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'post_type'        => 'testimonial',
            'post_status'      => 'publish',
        );
        $posts = get_posts($args);

        $tranformer = new PageTransformer;

        $result = [];
        foreach ($posts as $key => $value) {
        	$result[] = $tranformer->transformTestimonial($value);
        }

        return $result;

    }


    public static function getEquipments_Transformed(){
        $args = array(
            'posts_per_page'   => 30,
            'orderby'          => 'date',
            'order'            => 'ASC',
            'post_type'        => 'equipment',
            'post_status'      => 'publish',
        );
        $posts = get_posts($args);

        $tranformer = new PageTransformer;

        $result = [];
        foreach ($posts as $key => $value) {
            $result[] = $tranformer->transformEquipment($value);
        }

        return $result;

    }


    public static function getBrands_Transformed(){
        
        $args = array( 
                    'posts_per_page' => -1, 
                    'order' => 'ASC', 
                    'post_type' => 'brand' 
                );
        $brands = get_posts( $args );

        $tranformer = new PageTransformer;
        $result = [];
        foreach ($brands as $brand ) {            
            $result[] = $tranformer->transformBrand($brand);
        }

        return $result;
    }

    public static function getChooseUs_Transformed(){
        
        $args = array( 
                    'posts_per_page'   => 10,
                    'order'            => 'ASC',
                    'post_type'        => 'choose_us',
                    'post_status'      => 'publish',
                );
        
        $posts = get_posts($args);

        $tranformer = new PageTransformer;
        $result = [];
        foreach ($posts as $post ) {            
            $result[] = $tranformer->transformChooseUs($post);
        }

        return $result;
    }

    public static function getOurTeam_Transformed(){
        
        $args = array( 
                    'posts_per_page'   => 10,
                    'post_type'        => 'our_team',
                    'post_status'      => 'publish',
                );
        
        $posts = get_posts($args);

        $tranformer = new PageTransformer;
        $result = [];
        foreach ($posts as $post ) {            
            $result[] = $tranformer->transformTeam($post);
        }

        return $result;
    }


    public static function getRecentPosts(){
        $args = array(
            'numberposts' => 6,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
        );
        $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
        return $recent_posts;
    
    }
}