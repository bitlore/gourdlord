<?php
	$theme = (is_front_page() ? 'light' : 'default');
?>

<div class="top-bar <?php echo $theme; ?>" id="top-bar-menu">
	<div class="top-bar-left float-left" id="top-bar-menu-inner-content">
		<?php joints_top_nav(); ?>
	</div>
</div>