<?php ?>

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
			
  <?php $body_class = is_front_page() || is_404() ? 'superhero' : ''; ?>
  
	<body <?php body_class( $body_class ); ?>>
    
  		<div class="off-canvas-wrapper">
  			
  			<!-- Load off-canvas container. Feel free to remove if not using. -->			
  			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
  			
  			<div class="off-canvas-content" data-off-canvas-content>
            				
  				<header class="header" role="banner">
  						<div class="container">                
                <!-- This navs will be applied to the topbar, above all content 
                To see additional nav styles, visit the /parts directory -->
                <?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
              </div>
              <?php if ( ! WC()->cart->is_empty() ) : ?>
                <a href="<?php echo get_site_url(); ?>/cart" class="go-to-cart">
                  <img src="<?php echo theme_img_path; ?>/cart-light.png" alt="shopping cart link">
                </a>
              <?php endif; ?>
  				</header> <!-- end .header -->
          
          <main class="main"> <!-- this div was the container -->
            <div class="container">