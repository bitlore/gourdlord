<?php
/**
 * Plugin Name: Gourd Lord Categories
 * Description: Display products catgeories in product archive pages
 * Version: 1.0
 * Author: Ethan Law
 * Author URI: https://bitlore.io
 *
 *
 */
 
function gourdlord_product_subcategories( $args = array() ) {
 $parentid = get_queried_object_id();
				
	$args = array(
	 'parent' => $parentid
	);

	$terms = get_terms( 'product_cat', $args );

	if ( $terms ) {
		 echo '<ul class="product-cats">';
         $i = 0;
				 foreach ( $terms as $term ) {
           if ($term->name !== 'Uncategorized') {             
             echo '<li class="category ' . ( is_shop() ? 'left' : '') . '">';   
             // woocommerce_subcategory_thumbnail( $term );
               echo '<h2 class="big" style="text-align:'.(is_shop()?'right':'left').';">';
                 echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . '">';
                   echo $term->name;
                 echo '</a>';
               echo '</h2>';
               
               if ( is_shop() ) {
                 $cat_thumb_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                 $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
                 echo '<div class="right dynamic ' . ($i === 0 ? 'show' : '') . '" style="background-image:
                  url('.$shop_catalog_img[0].')">';
                 echo '</div>';
               }
               else {
                 echo do_shortcode('[product_category category="'.$term->name.'"]');
               }
               
             echo '</li>';
           }
           $i++;
		     }
		 echo '</ul>';
		}
  }
	add_action( 'woocommerce_before_shop_loop', 'gourdlord_product_subcategories', 50 );