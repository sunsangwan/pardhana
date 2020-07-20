<?php

namespace OyeTheme\Transformers;
use OyeTheme\Helpers\CommonHelper;
class PageTransformer {
    public function __construct() {
        
    }

    function transformPageLegal($post) {
        $pdf_link = wp_get_attachment_url(get_post_meta($post->ID, 'oyemeta_pdf_file', true));
        $header_image = wp_get_attachment_url(get_post_meta($post->ID, 'oyemeta_header_img',true));

        $response = array(
            'header_title' => get_post_meta($post->ID, 'oyemeta_header_title',true),
            'header_background_image_url' => $header_image,
            'download_pdf_button_title' => get_post_meta($post->ID, 'oyemeta_download_pdf_button_title',true),
            'download_pdf_button_link' => $pdf_link,
            'back_button_title' => get_post_meta($post->ID, 'oyemeta_back_button_title',true),
            'back_button_url' => site_url(),
            'content' => '',
        );

        return $response;
    }


    function transformBanner($post, $array=false) {
        $header_title = get_post_meta( $post->ID, 'oyemetatpl_header_title',true);
        $header_subtitle = get_post_meta( $post->ID, 'oyemetatpl_header_subtitle',true);
        $header_description = get_post_meta( $post->ID, 'oyemetatpl_header_description',true);
        $header_size = get_post_meta( $post->ID, 'oyemetatpl_header_size',true);
        $header_align = get_post_meta( $post->ID, 'oyemetatpl_header_align',true);
        $header_bg = get_post_meta( $post->ID, 'oyemetatpl_header_backgroundimage',true);
        $header_bg_url = wp_get_attachment_image_src( $header_bg, 'full' );

        $response = array(
            'header_title' => $header_title,
            'header_subtitle' => $header_subtitle,
            'header_description' => $header_description,
            'header_size' => $header_size,
            'header_align' => $header_align,
            'header_bg' => $header_bg,
            'header_bg_url' => $header_bg_url[0],
        );

        $response = json_decode(json_encode($response), $array);
        return $response;
    }

    function transformHeader($array=false) {
        global $theme_opt;
        $menu_desktop = wp_nav_menu(array(
                            'menu' => 'header_menu',
                            'container' => false,
                            'menu_class' => 'nav-menu hidden-xs hidden-sm hidden-md header-menu',
                            'echo' => false
                        ));
        $menu_mobile = wp_nav_menu(array(
                            'menu' => 'header_menu',
                            'container' => false,
                            'echo' => false
                        ));        
        $response = array(
            'site_url' => site_url(),
            'theme_opt' => $theme_opt,
            'logo_url' => $theme_opt['header_logo_normal']['url'],
            'menu_html_desktop' => $menu_desktop,
            'menu_html_mobile' => $menu_mobile,
            'share_page_url' => 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'],
            
        );

        $response = json_decode(json_encode($response), $array);
        return $response;
    }

    function transformFooter($array=false) {
        global $theme_opt;
        $menu_quick = wp_nav_menu(array(
                            'menu' => 'quick_menu',
                            'container' => false,
                            'menu_class' => 'quick_menu',
                            'echo' => false
                        ));
        $menu_repair = wp_nav_menu(array(
                            'menu' => 'repair_menu',
                            'container' => false,
                            'menu_class' => 'repair_menu',
                            'echo' => false
                        ));        

        $copyright_data = $theme_opt['footer_copyright']; 
        $currentyear = date('Y'); 

        $response = array(
            'footer_quick_link_title' => $theme_opt['footer_quick_link_title'],
            'footer_repair_service_title' => $theme_opt['footer_repair_service_title'],
            'menu_quick_html' => $menu_quick,
            'menu_repair_html' => $menu_repair,
            'footer_follow_title' => $theme_opt['footer_follow_title'],
            'footer_facebook_link' => $theme_opt['footer_facebook_link'],
            'footer_twitter_link' => $theme_opt['footer_twitter_link'],
            'footer_linkedin_link' => $theme_opt['footer_linkedin_link'],
            'footer_yelp_link' => $theme_opt['footer_yelp_link'],
            'footer_youtube_link' => $theme_opt['footer_youtube_link'],
            'footer_chrysler_camera_logo_url' => $theme_opt['footer_chrysler_camera_logo']['url'],
            'footer_citysearch_logo_url' => $theme_opt['footer_citysearch_logo']['url'],
            'footer_accredited_logo_url' => $theme_opt['footer_accredited_logo']['url'],
            'footer_repair_logo_url' => $theme_opt['footer_repair_logo']['url'],
            'footer_yelp_logo_url' => $theme_opt['footer_yelp_logo']['url'],
            'footer_chrysler_camera_link' => $theme_opt['footer_chrysler_camera_link'],
            'footer_citysearch_link' => $theme_opt['footer_citysearch_link'],
            'footer_accredited_link' => $theme_opt['footer_accredited_link'],
            'footer_repair_link' => $theme_opt['footer_repair_link'],
            'copyright_text' => str_replace("{year}", $currentyear, $copyright_data),
            'footer_copyright_logo_url' => $theme_opt['footer_copyright_logo']['url'],
        );

        $response = json_decode(json_encode($response), $array);
        return $response;
    }

    function transformBlockContactInfo($array=false) {
        global $theme_opt;
        $response = array(
            'contact_info_title' => $theme_opt['contact_info_title'],
            'contact_address_title' => $theme_opt['contact_address_title'],
            'contact_address' => $theme_opt['contact_address'],
            'contact_phone_title' => $theme_opt['contact_phone_title'],
            'contact_phone_text' => $theme_opt['contact_phone_text'],
            'contact_email_title' => $theme_opt['contact_email_title'],
            'contact_email_text' => $theme_opt['contact_email_text'],
            'contact_timing' => $theme_opt['contact_timing'],

            'contact_form_title' => $theme_opt['contact_form_title'],
            'contact_form_shortcode' => do_shortcode( $theme_opt["contact_form_shortcode"] ),
            'contact_form_note' => $theme_opt['contact_form_note'],
            'contact_form_note_link' => $theme_opt['contact_form_note_link'],
            'contact_form_note_link_text' => $theme_opt['contact_form_note_link_text'],
            'contact_form_address_iframe_url' => $theme_opt['contact_form_address_iframe_url'],
        );



        $response = json_decode(json_encode($response), $array);
        return $response;
    }


    function transformTestimonial($post, $array=false) {
        
        $response = array(
            
            'post_title' => $post->post_title,
            'rating' => get_post_meta($post->ID, 'oyemetatpl_testimonials_rating',true),
            'description' => get_post_meta($post->ID, 'oyemetatpl_testimonials_description',true),
            'testimonial_date' => get_post_meta($post->ID, 'oyemetatpl_testimonials_date',true),
            'published_date' => get_the_date( 'm/d/Y', $post->ID ),
            'author_name' => get_post_meta($post->ID, 'oyemetatpl_testimonials__name',true),
           
        );

        $response = json_decode(json_encode($response), $array);
        return $response;
    }

    function transformEquipment($post, $array=false) {
        
        $response = array(
            
            'id' => $post->ID,
            'post_title' => $post->post_title,
            'page_link' => get_post_meta($post->ID, 'oyemetatpl_page_link',true),
            'equipment_logo' => wp_get_attachment_url(get_post_meta($post->ID, 'oyemetatpl_equipment_logo',true)),
            'equipment_logo_active' => wp_get_attachment_url(get_post_meta($post->ID, 'oyemetatpl_equipment_logo_active',true)),

           
        );

        $response = json_decode(json_encode($response), $array);
        return $response;
    }

    

    function transformPageDefault($post, $array=false) {
        
         $response = array(
            'header' => $this->transformHeader(),
            'banner' => $this->transformBanner($post),
            'footer' => $this->transformFooter(),
            'site_url' => site_url(),
        );

        $response = json_decode(json_encode($response), $array);


        return $response;
    }

    function transformPageLocation($post, $array=false) {
        global $theme_opt;
         $response = array(
            'header' => $this->transformHeader(),
            'banner' => $this->transformBanner($post),
            'footer' => $this->transformFooter(),
            'block_contact_info' => $this->transformBlockContactInfo(),
            'homepage_map_image' => $theme_opt['homepage_map_image']['url'],
            
        );

        $response = json_decode(json_encode($response), $array);


        return $response;
    }



    function transformPageWarranty($post, $array=false) {
        global $theme_opt;
        $response = array(
            'header' => $this->transformHeader(),
            'banner' => $this->transformBanner($post),
            'footer' => $this->transformFooter(),
            'how_we_can_help_heading' => get_post_meta( $post->ID, 'how_we_can_help_heading', true),
            'how_we_can_help_sub_heading' => get_post_meta( $post->ID, 'how_we_can_help_sub_heading', true),
            'equipments' => CommonHelper::getEquipments_Transformed(),
            'brands' => CommonHelper::getBrands_Transformed(),
            'get_an_estimate_heading' => get_post_meta( $post->ID, 'get_an_estimate_heading', true),
            'get_an_estimate_link' => get_post_meta( $post->ID, 'get_an_estimate_link', true),
            'block_contact_info' => $this->transformBlockContactInfo(),
            'get_an_estimate_heading' => $theme_opt['get_an_estimate_heading'],
            'testimonial_heading' => $theme_opt['testimonial_heading'],
            'testimonial_sub_heading' => $theme_opt['testimonial_sub_heading'],    
            'brand_logo_images' => $this->getTransformedBrandImageURL(get_post_meta( $post->ID, 'brand_logo_images', true)),
            'testimonials' => CommonHelper::getRecentTestimonials_Transformed(),
            'getestimate' => $this->transformGetestimate(),
            'homepage_map_image' => $theme_opt['homepage_map_image']['url'],
        );

        $response = json_decode(json_encode($response), $array);

        // var_dump($response);
        // wp_die();
        return $response;
    }

    function transformGetestimate() {
        global $theme_opt;

        $response = array(
            'estimate_heading' => $theme_opt['estimate_heading'],
            'estimate_warranty_work_text' => $theme_opt['estimate_warranty_work_text'],
            'estimate_warranty_work_text' => $theme_opt['estimate_warranty_work_text'],
            'estimate_non_warranty_work_text' => $theme_opt['estimate_non_warranty_work_text'],
            'estimate_get_an_estimate_btn_text' => $theme_opt['estimate_get_an_estimate_btn_text'],
            'estimate_get_an_estimate_btn_link' => $theme_opt['estimate_get_an_estimate_btn_link'],
            'estimate_shipping_form_btn_text' => $theme_opt['estimate_shipping_form_btn_text'],
            'estimate_shipping_form_btn_link' => $theme_opt['estimate_shipping_form_btn_link'],

            'estimate_warranty_work_form_title' => $theme_opt['estimate_warranty_work_form_title'],
            'estimate_bring_equipment_title' => $theme_opt['estimate_bring_equipment_title'],
            'estimate_ticket_assigned_title' => $theme_opt['estimate_ticket_assigned_title'],
            'estimate_technician_problem_title' => $theme_opt['estimate_technician_problem_title'],
            'estimate_get_approval_title' => $theme_opt['estimate_get_approval_title'],
            'estimate_work_on_camera_title' => $theme_opt['estimate_work_on_camera_title'],
            'estimate_ship_you_back_title' => $theme_opt['estimate_ship_you_back_title'],

            'estimate_warranty_work_form_image' =>  $theme_opt["estimate_warranty_work_form_image"]['url'],
            'estimate_warranty_work_form_image_hover' =>  $theme_opt["estimate_warranty_work_form_image_hover"]['url'],
            'estimate_bring_equipment_image' =>  $theme_opt["estimate_bring_equipment_image"]['url'],
            'estimate_bring_equipment_image_hover' =>  $theme_opt["estimate_bring_equipment_image_hover"]['url'],
            'estimate_ticket_assigned_image' =>  $theme_opt["estimate_ticket_assigned_image"]['url'],
            'estimate_ticket_assigned_image_hover' =>  $theme_opt["estimate_ticket_assigned_image_hover"]['url'],
            'estimate_technician_problem_image' =>  $theme_opt["estimate_technician_problem_image"]['url'],
            'estimate_technician_problem_image_hover' =>  $theme_opt["estimate_technician_problem_image_hover"]['url'],
            'estimate_get_approval_image' =>  $theme_opt["estimate_get_approval_image"]['url'],
            'estimate_get_approval_image_hover' =>  $theme_opt["estimate_get_approval_image_hover"]['url'],
            'estimate_work_on_camera_image' =>  $theme_opt["estimate_work_on_camera_image"]['url'],
            'estimate_work_on_camera_image_hover' =>  $theme_opt["estimate_work_on_camera_image_hover"]['url'],
            'estimate_ship_you_back_image' =>  $theme_opt["estimate_ship_you_back_image"]['url'],
            'estimate_ship_you_back_image_hover' =>  $theme_opt["estimate_ship_you_back_image_hover"]['url'],
        );

        $response = json_decode(json_encode($response), $array);
        return $response;
    }


    function transformBrand($post, $array=false) {
        $response = [];
    
        $brand_model = get_post_meta(  $post->ID, 'brand_model' , true);

        $brand_logo_id = get_post_meta( $post->ID, 'oyemetatpl_brand_logo', true);
        $brand_logo_url = wp_get_attachment_url($brand_logo_id);

        $brand_logo_active_id = get_post_meta( $post->ID, 'oyemetatpl_brand_logo_active', true);
        $brand_logo_active_url = wp_get_attachment_url($brand_logo_active_id);


        $response = [
            'post_name' => $post->post_name,
            'post_title' => $post->post_title,
            'brand_logo_url' => $brand_logo_url,
            'brand_logo_active_url' => $brand_logo_active_url,
            'brand_modelslist' => $brand_model
        ];
        
        $response = json_decode(json_encode($response), $array);
        return $response;
    }

    function transformBrandByPostID($postID, $array=false) {
        $response = [];
        $brand_model = get_post_meta(  $postID['brand_name'], 'brand_model' , true);

        $brand_logo_id = get_post_meta( $postID['brand_name'], 'oyemetatpl_brand_logo', true);
        $brand_logo_url = wp_get_attachment_url($brand_logo_id);

        $brand_logo_active_id = get_post_meta( $postID['brand_name'], 'oyemetatpl_brand_logo_active', true);
        $brand_logo_active_url = wp_get_attachment_url($brand_logo_active_id);
    
        $response = [
            'post_name' => get_the_title($postID['brand_name']),
            'brand_logo_url' => $brand_logo_url,
            'brand_logo_active_url' => $brand_logo_active_url,
            'brand_modelslist' => $brand_model
        ];
        
        $response = json_decode(json_encode($response), $array);
        return $response;
    }

    function transformChooseUs($post, $array=false) {
        $response = [];
    
        $logo_id = get_post_meta( $post->ID, 'oyemetatpl_logo', true);
        $logo_url = wp_get_attachment_url($logo_id);

        $response = [
            'id' => $post->ID,
            'post_name' => $post->post_name,
            'post_title' => $post->post_title,
            'logo_url' => $logo_url,
        ];
        
        $response = json_decode(json_encode($response), $array);
        return $response;
    }

    function transformTeam($post, $array=false) {
        $response = [];
    
        $team_image_description = get_post_meta( $post->ID, 'oyemetatpl_image_description', true);

        $team_image_id = get_post_meta( $post->ID, 'oyemetatpl_slider_image', true);
        $team_image_url = wp_get_attachment_url($team_image_id);

        $response = [
            'id' => $post->ID,
            'post_name' => $post->post_name,
            'post_title' => $post->post_title,
            //'post_content' => $post->post_content,
            'image_description' => $team_image_description,
            'team_image_url' => $team_image_url,
        ];
        
        $response = json_decode(json_encode($response), $array);
        return $response;
    }

    function transformPageServices($post, $array=false) {

        $postmeta = get_post_meta($post->ID);
        $left_part_imgid = $postmeta['oyemetatpl_repair_left_part_img'];
        $left_part_img = wp_get_attachment_url($left_part_imgid[0]);

        $show_brand = $postmeta['oyemetatpl_show_hide_brands'][0];

        $repair_title = $postmeta['oyemetatpl_repair_title'][0];
        $repair_content = $postmeta['oyemetatpl_repair_content'][0];
        $repair_content_link_text = $postmeta['oyemetatpl_repair_content_link_text'][0];
        $repair_content_link = $postmeta['oyemetatpl_repair_content_link'][0];
        $brands = rwmb_meta( 'brand' );
        foreach ($brands as $brand ) {            
            $result[] = $this->transformBrandByPostID($brand);
        }
        
        $response = array(
            'header' => $this->transformHeader(),
            'banner' => $this->transformBanner($post),
            'footer' => $this->transformFooter(),
            'left_part_img' => $left_part_img,
            'repair_title' => $repair_title,
            'repair_content' => $repair_content,
            'repair_content_link_text' => $repair_content_link_text,
            'repair_content_link' => $repair_content_link,
            'contactus_heading_text' => get_post_meta( $post->ID, 'oyemetatpl_contactus_heading_text', true),
            'contactus_button_text' => get_post_meta( $post->ID, 'oyemetatpl_contactus_button_text', true),
            'contactus_button_link' => get_post_meta( $post->ID, 'oyemetatpl_contactus_button_link', true),
            'brands' => $result,
            'show_brand' => $show_brand,
        );

         // var_dump($response);
         // wp_die();

        $response = json_decode(json_encode($response), $array);
        return $response;
    }


    function transformPageAboutus($post, $array=false) {
        global $theme_opt;
        $response = array(
            'header' => $this->transformHeader(),
            'banner' => $this->transformBanner($post),
            'footer' => $this->transformFooter(),
            'ourteam_posts' => CommonHelper::getOurTeam_Transformed(),
            'chooseus_posts' => CommonHelper::getChooseUs_Transformed(),

            'why_choose_us_heading' => $theme_opt['why_choose_us_heading'],
            'why_choose_us_sub_heading' => $theme_opt['why_choose_us_sub_heading'],

            'our_team_heading' => $theme_opt['our_team_heading'],
            'our_team_sub_heading' => $theme_opt['our_team_sub_heading'],

            'testimonial_heading' => $theme_opt['testimonial_heading'],
            'testimonial_sub_heading' => $theme_opt['testimonial_sub_heading'],
            'testimonials' => CommonHelper::getRecentTestimonials_Transformed()
        );

        $response = json_decode(json_encode($response), $array);
        return $response;
    }

    function transformPageFAQ($post, $array=false) {
        $post_title = $post->post_title;
        // $wp_count_posts = wp_count_posts( "faq" );
        // $faq_first_acc = $wp_count_posts->publish/2;
        // $faq_first_acc = ceil($faq_first_acc); 
        $args1 = array( 'posts_per_page' => -1,
               'order' => 'ASC',
               'post_type' => 'faq',
        );
        $postslist = get_posts( $args1 );
        foreach ($postslist as $postslistdata) {
            $postslistdata->faqanswer = get_post_meta( $postslistdata->ID, 'oyemetatpl_faq_answer',true);
        }
        // $args2 = array(
        //        'order' => 'ASC',
        //        'offset' => $faq_first_acc,
        //        'post_type' => 'faq',
        //        'posts_per_page' => $faq_first_acc,
        // );
        // $postslist2 = get_posts( $args2 );

        // foreach ($postslist2 as $postslistdata2) {
        //     $postslistdata2->faqanswer = get_post_meta( $postslistdata2->ID, 'oyemetatpl_faq_answer',true);
        // }

        $response = array(
            'header' => $this->transformHeader(),
            'banner' => $this->transformBanner($post),
            'footer' => $this->transformFooter(),
            'post_content' => $post_content, 
            'post_title' => $post_title,
            'postslist' => $postslist,
            // 'postslist2' => $postslist2,
        );

        $response = json_decode(json_encode($response), $array);
        return $response;
    }



    function transformPageBlog($post){
        $response = array(
            'header' => $this->transformHeader(),
            'banner' => $this->transformBanner($post),
            'footer' => $this->transformFooter(),
            'recent_posts' => CommonHelper::getRecentPosts(),
            'tags' => ''
        );

        return $response;
    }


    function transformPageBlogSingle($post){
        $response = array(
            'header' => $this->transformHeader(),
            'banner' => $this->transformBanner($post),
            'footer' => $this->transformFooter(),
        );

        return $response;
    }

    function getTransformedBrandImageURL($imageArray){
        foreach($imageArray as $images)
        {
            $data = $images['oyemetatpl_brand_logo_images'][0];
           $brandImages[] = wp_get_attachment_url($data);
        }
        return $brandImages;
    }

}