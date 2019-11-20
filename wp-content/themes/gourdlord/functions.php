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

function gourdlord_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'gourdlord_add_woocommerce_support' );

add_action('template_redirect', 'remove_shop_breadcrumbs' );
function remove_shop_breadcrumbs() {
    if (is_shop())
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}


add_action( 'pre_get_posts', 'iconic_hide_out_of_stock_products' );
 
function iconic_hide_out_of_stock_products( $q ) {
 
    if ( ! $q->is_main_query() || is_admin() ) {
        return;
    }
 
    if ( $outofstock_term = get_term_by( 'name', 'outofstock', 'product_visibility' ) ) {
 
        $tax_query = (array) $q->get('tax_query');
 
        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field' => 'term_taxonomy_id',
            'terms' => array( $outofstock_term->term_taxonomy_id ),
            'operator' => 'NOT IN'
        );
 
        $q->set( 'tax_query', $tax_query );
 
    }
 
    remove_action( 'pre_get_posts', 'iconic_hide_out_of_stock_products' );
 
}

add_action( 'wp_head', 'quantity_wp_head' );
function quantity_wp_head() {
  if ( is_product() ) {
  ?>
    <style type="text/css">.quantity, .buttons_added { width:0; height:0; display: none; visibility: hidden; }</style>
  <?php }
}   

// Remove the sorting dropdown from Woocommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
// Remove the result count from WooCommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

function disable_woo_commerce_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 
}
add_action('init', 'disable_woo_commerce_sidebar');

add_filter( 'woocommerce_product_subcategories_hide_empty', 'ts_hide_empty_categories', 10, 1 );
function ts_hide_empty_categories ( $hide_empty ) {
  $hide_empty = FALSE;
}

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