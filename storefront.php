<?php /* Template Name: Store */ ?>

<?php get_header(); ?>

	<div class="content">

		<div class="inner-content grid-x">

			<main id="storefront" class="small-12 large-8 medium-8 cell" role="main">

				<ul>
					
					<?php
						if( have_rows('product_categories') ):
							while ( have_rows('product_categories') ) : the_row();
					?>
								<li>
									<h2>
										<a href="<?php the_sub_field('url_slug'); ?>">
											<?php the_sub_field('title'); ?>
										</a>
									</h2>
								</li>
					<?php
							endwhile;
						endif;
					?>
				</ul>

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>