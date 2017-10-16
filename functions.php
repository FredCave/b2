<?php

// SECURITY: HIDE USERNAMES
add_action('template_redirect', 'bwp_template_redirect');
function bwp_template_redirect() {
    if ( is_author() ) {
        wp_redirect( home_url() ); 
        exit;
    }
}

// HIDE VERSION OF WORDPRESS
function wpversion_remove_version() {
    return '';
    }
add_filter('the_generator', 'wpversion_remove_version');

// WOOCOMMERCE SUPPORT
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// DISABLE WOO STYLES
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// ENQUEUE CUSTOM SCRIPTS
function enqueue_cpr_scripts() {
  
    wp_deregister_script( 'jquery' );
    // wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/_jquery.js');
    wp_enqueue_script( 'jquery' );  
    
//    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/_jquery.js', true);
    wp_enqueue_script('all-scripts', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), true);

}
add_action('wp_enqueue_scripts', 'enqueue_cpr_scripts');

add_action( 'init', 'create_post_types' );
function create_post_types() {
    register_post_type( 'projects',
        array(
            'labels' => array(
            'name' => __( 'Projects' )
        ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('editor','title','custom-fields'),
            'menu_position' => 4
        )
    );
    register_post_type( 'commissions',
        array(
            'labels' => array(
            'name' => __( 'Commissions' )
        ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('editor','title','custom-fields'),
            'menu_position' => 5
        )
    );
    register_post_type( 'news',
        array(
            'labels' => array(
            'name' => __( 'News' )
        ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('editor','title','custom-fields'),
            'menu_position' => 6
        )
    ); 
    register_post_type( 'publications',
        array(
            'labels' => array(
            'name' => __( 'Publications' )
        ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('editor','title','custom-fields'),
            'menu_position' => 7
        )
    ); 
}

// IMAGE OBJECT

// ADD CUSTOM IMAGE SIZES
add_theme_support( 'post-thumbnails' );
add_image_size( 'extralarge', 1200, 1200 );
add_image_size( 'full', 1500, 1500 );

function bd_image_object ( $image, $added_class ) {
    if( !empty($image) ): 
        $width          = $image['sizes'][ 'thumbnail-width' ];
        $height         = $image['sizes'][ 'thumbnail-height' ];
        $thumb          = $image['sizes'][ "thumbnail" ]; // 300
        $medium         = $image['sizes'][ "medium" ]; // 600
        $mediumlarge    = $image['sizes'][ "medium" ]; // 600
        $large          = $image['sizes'][ "large" ]; // 900
        $extralarge     = $image['sizes'][ "extralarge" ]; // 1200
        $full           = $image['sizes'][ "full" ]; // 1500
        $id             = $image["id"];
        
        $class = "landscape"; 
        if ( $width <= $height ) {
            $class = "portrait";
            $thumb = $image['sizes'][ "medium" ];
            $medium = $image['sizes'][ "large" ];
            $large = $image['sizes'][ "extralarge" ];
            $extralarge = $image['sizes'][ "full" ]; 
            $full = $image['sizes'][ "full" ];  
        } 

        if ( $added_class === undefined ) {
            $added_class = "";
        }

        echo "<img class='" . $class . " " . $added_class . "' 
            width='" . $width . "' 
            height='" . $height . "' 
            data-thm='" . $thumb . "' 
            data-med='" . $medium . "' 
            data-mdl='" . $mediumlarge . "' 
            data-lrg='" . $large . "' 
            data-xlg='" . $extralarge . "' 
            data-fll='" . $full . "' 
            src='" . $thumb . "' />";

    endif;
}
 
?>