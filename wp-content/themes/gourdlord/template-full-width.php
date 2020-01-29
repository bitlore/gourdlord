<?php
/*
Template Name: Full Width (No Sidebar)
*/

get_header(); ?>
			
	<div class="content">
	
		<div class="inner-content grid-x">
	
		    <main class="small-12 medium-12 large-12 cell" role="main">
				
					<div class="container">
						
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<?php get_template_part( 'parts/loop', 'page' ); ?>
							
						<?php endwhile; endif; ?>
								
					</div>
				

			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content -->

<?php get_footer(); ?>
