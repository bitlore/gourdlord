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
				 foreach ( $terms as $term ) {
           if ($term->name !== 'Uncategorized') {             
             echo '<li class="category">';   
             // woocommerce_subcategory_thumbnail( $term );
             echo '<h2>';
             echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . '">';
             echo $term->name;
             echo '</a>';
             echo '</h2>';
             echo '</li>';
           }
		     }
		 echo '</ul>';
		}
  }
	add_action( 'woocommerce_before_shop_loop', 'gourdlord_product_subcategories', 50 );