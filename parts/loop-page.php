<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
						
	<!-- <header class="article-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header> -->
	<!-- end article header -->
	
	<!-- <img class="down-bracket" src="/gourdlord/wp-content/themes/gourdlord/assets/images/bracket.png" alt="large open bracket facing down"> -->
	
  <section class="entry-content" itemprop="text">
	   <?php the_content(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		 <?php wp_link_pages(); ?>
	</footer> <!-- end article footer -->
						    
	<?php comments_template(); ?>
					
</article> <!-- end article -->