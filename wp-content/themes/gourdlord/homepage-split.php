<?php /* Template Name: Home */ ?>


<?php get_header(); ?>

	<div class="content">

		<div class="inner-content grid-x grid-margin-x grid-padding-x">

			<main class="main flex small-12 large-8 medium-8 cell" role="main">

				<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<div class="left" style="background-image: url('<?php echo $image[0]; ?>');">
					</div>
				<?php endif; ?>
				
				<div id="home-lockup" class="right" style="background-image: url('wp-content/themes/gourdlord/assets/images/gourdlord_lockup_lg.png')">
					
				</div>

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>