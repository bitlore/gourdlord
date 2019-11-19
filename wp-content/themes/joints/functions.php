<?php

//print name of template file
add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}

function get_current_template( $echo = false ) {
    if( !isset( $GLOBALS['current_theme_template'] ) )
        return false;
    if( $echo )
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}

function custom_add_google_fonts() {
 wp_enqueue_style( 'custom-google-fonts',
 'https://fonts.googleapis.com/css?family=Lobster|Montserrat:400,400i,700',
 false );
}
add_action( 'wp_enqueue_scripts', 'custom_add_google_fonts' );

// if ( ! function_exists( ‘woocommerce_template_loop_product_title’ ) ) {
//   /**
//   * Show the product title in the product loop. By default this is an H2.
//   */
//   function woocommerce_template_loop_product_title() {
//     echo ‘<h3 class=”woocommerce-loop-product__title”>’ . get_the_title() . ‘</h3>’;
//   }
// }


// function add_event_handlers() {
//   if(is_page()){
//     global $wp_query;
//     //Check which template is assigned to current page we are looking at
//     $template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
// 
//     if ($template_name == 'index.php') {
//        wp_enqueue_script('scripts', get_template_directory_uri().'/scripts.js');		
//     }
//  }
// }
// add_action( 'wp_enqueue_scripts', 'add_event_handlers' );

// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php'); 