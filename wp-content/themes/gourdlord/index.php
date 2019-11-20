<?php get_header(); ?>

<script>	
	document.addEventListener('mouseover', function (event) {
		if ( event.target.matches('.post-link') && !event.target.classList.contains('active') ) {			
			event.preventDefault();
			let links = Array.prototype.slice.call(document.getElementsByClassName('post-link'));
			links.forEach( link => {
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
	
		<div class="inner-content grid-x grid-padding-x">
	
		    <main id="posts"  class="main small-12 medium-8 large-8 cell" role="main"> 
						
						<ul>
							
							<li class="left" style="cursor:default;">
								<h1>Stories</h1>
							</li>
							
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					 									
								<li id="link-<?php echo $post->ID ?>" class="post-link left">
									<h2>
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h2>
									<?php
									if ( has_post_thumbnail() ) {
										$image_url = get_the_post_thumbnail_url($post,'large');
										echo '<div class="right dynamic '.(is_sticky() ? 'show' : '').'" style="background-image:url('.$image_url.');"></div>';
									}
									?>
								</li>
								
								
							<?php endwhile; ?>
								<?php joints_page_navi(); ?>
							<?php else : ?>
								<?php get_template_part( 'parts/content', 'missing' ); ?>
							<?php endif; ?>
							
						</ul>
					
		    </main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>