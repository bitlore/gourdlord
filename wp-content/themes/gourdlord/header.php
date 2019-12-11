<?php?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
		<?php wp_head(); ?>
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/styles/app.css">
        
	</head>
			
	<body <?php body_class(); ?>>
    
  		<div class="off-canvas-wrapper">
  			
  			<!-- Load off-canvas container. Feel free to remove if not using. -->			
  			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
  			
  			<div class="off-canvas-content" data-off-canvas-content>
            				
  				<header class="header" role="banner" id="gl-main-header" style="background-color: <?php echo (is_front_page() ? 'transparent' : '#f7f7f7') ?>;">
  							
  					 <!-- This navs will be applied to the topbar, above all content 
  						  To see additional nav styles, visit the /parts directory -->
  					 <?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
  	 	
             
  				</header> <!-- end .header -->
          
          <div id="gl-main-content"> <!-- this div was the container -->