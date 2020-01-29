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
  return $hide_empty;
}

function get_posts_with_tag( $post_tag ) {
  $the_query = new WP_Query( 'tag='.$post_tag );

  if ( $the_query->have_posts() ) {
    // echo '<ul>';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        echo '<li><a href="' . get_permalink( $the_query, false ) . '">' . get_the_title() . '</a></li>';
    }
    // echo '</ul>';
  } else {
      // no posts found
  }
  /* Restore original Post Data */
  wp_reset_postdata();
}


function get_images_attachment_url() {
  global $post; 
  $images_urls = array();

  $images_objects = get_attached_media( 'image', $post->ID );

  foreach ($images_objects as $image_object) {
    $images_urls[] = wp_get_attachment_url ($image_object->ID);
  } 
  return $images_urls;
}



function gourdlord_product_subcategories( $args = array() ) {
  $parentid = get_queried_object_id();

	$args = array(
	 'parent' => $parentid,
   'hide_empty' => FALSE
	);

	$terms = get_terms( 'product_cat', $args );

	if ( $terms ) {
		 echo '<ul class="product-cats">';
         $i = 0;
         // if ( is_shop() ) {
         //   echo '<li class="category left"><h2 class="big"><a href="' . get_site_url() . '/shop">shop</a></h2></li>';
         // }
				 foreach ( $terms as $term ) {
           if ($term->name !== 'Uncategorized') {
             echo '<li class="category ' . (is_shop() ? 'left' : '') . '">';   
             // woocommerce_subcategory_thumbnail( $term );
               echo '<h2 class="big" style="
                text-decoration:'.($term->count ? 'none' : 'line-through').';
               ">';
                 echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . '">';
                   echo strtolower($term->name);
                 echo '</a>';
               echo '</h2>';

               if ( is_shop() ) {
                 $cat_thumb_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                 // echo $cat_thumb_id;
                 $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
                 // echo $shop_catalog_img;
                 echo '<div class="right dynamic' . ($i === 0 ? ' show' : '') . '" style="background-image:
                  url('.$shop_catalog_img[0].')">';
                 echo '</div>';
               }
               else {
                 echo do_shortcode('[product_category category="'.$term->name.'"]');
               }
             echo '</li>';
             $i++;
           }
		     }
		 echo '</ul>';
		}
  }
	add_action( 'woocommerce_before_shop_loop', 'gourdlord_product_subcategories', 50 );


// basic product category loop
function list_product_categories() {
  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty
  );
  $all_categories = get_categories( $args );
  foreach ($all_categories as $cat) {
    if($cat->category_parent == 0 && $cat->name !== 'Uncategorized') {
        $category_id = $cat->term_id;       
        echo '<li><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a></li>';

        $args2 = array(
                'taxonomy'     => $taxonomy,
                'child_of'     => 0,
                'parent'       => $category_id,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
        );
        // $sub_cats = get_categories( $args2 );
        // if($sub_cats) {
        //     foreach($sub_cats as $sub_category) {
        //         echo  $sub_category->name ;
        //     }   
        // }
    }       
  }
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