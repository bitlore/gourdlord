<?php /* Template Name: Home */ ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<div class="hero" style="background-image: url('<?php echo $image[0]; ?>');">
	</div>
<?php endif; ?>

<?php get_header(); ?>

<div class="full-height-spacer">
	<div class="image-wrapper">
		<img class="lockup-lg" src="wp-content/themes/gourdlord/assets/images/gourdlord_lockup_lg.png" alt="gourd lord co">
	</div>
</div>

<?php get_footer(); ?>