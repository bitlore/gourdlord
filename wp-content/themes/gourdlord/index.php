<?php get_header(); ?>

<script>	
	document.addEventListener('mouseover', function (event) {
		if ( event.target.matches('.post-link') && !event.target.classList.contains('active') ) {			
			event.preventDefault();
			let links = Array.prototype.slice.call(document.getElementsByClassName('post-link'));
			links.forEach( link => {
				//debugger;
				if (link.classList.contains('active') && link.id !== event.target.id) {
					link.classList.remove('active');
				} else if (link.id === event.target.id) {
					link.classList.add('active');
				}
			});
			return;
		}
	}, false);
</script>

<?php $image_url = ''; ?>

	<div class="content">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
	
		    <main id="posts"  class="main small-12 medium-8 large-8 cell flex" role="main"> 

					<div class="left">
						
						<h2 style="text-align: center;">
							Stories
						</h2>
						
						<ul>
							
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					 									
								<li id="link-<?php echo $post->ID ?>" class="post-link <?php if (is_sticky()) { echo 'active'; } ?>">
									<h3>
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h3>
								</li>
								
								<?php
									if (is_sticky($post->ID) && has_post_thumbnail()) {
										$image_url = get_the_post_thumbnail_url($post,'large');
									}
								?>
								
							<?php endwhile; ?>
								<?php joints_page_navi(); ?>
							<?php else : ?>
								<?php get_template_part( 'parts/content', 'missing' ); ?>
							<?php endif; ?>
							
						</ul>

					</div>
					
					<div class="right" style="background-image: url(<?php echo $image_url; ?>);">	
					</div>
					
		    </main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>