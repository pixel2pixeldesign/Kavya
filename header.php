<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Kavya
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>"
>
<?php if ( get_header_image() ) : ?>
    <div id="header-image"></div>
<?php endif; // End header image check. ?>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
    
    <div id="top-section">
	<header id="masthead" class="site-header" role="banner">
    	<div class="header-wrapper">
		<div class="site-branding">          
            <?php 
			if ( of_get_option('custom_logo', true) != "") { ?>
            	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>" >
                <img src="<?php echo esc_url(of_get_option('custom_logo', true)); ?>">
                </a>
            <?php }
			else { ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            <?php } ?>
		</div>
        
        <div id="social-icons">
			    <?php if ( of_get_option('facebook', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('facebook', true)); ?>" title="Facebook" ><img src="<?php echo get_template_directory_uri()."/images/facebook.png"; ?>"></a>
	             <?php } ?>
	            <?php if ( of_get_option('twitter', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url("http://twitter.com/".of_get_option('twitter', true)); ?>" title="Twitter" ><img src="<?php echo get_template_directory_uri()."/images/twitter.png"; ?>"></a>
	             <?php } ?>
	             <?php if ( of_get_option('google', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('google', true)); ?>" title="Google Plus" ><img src="<?php echo get_template_directory_uri()."/images/google.png"; ?>"></a>
	             <?php } ?>
	             <?php if ( of_get_option('youtube', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('youtube', true)); ?>" title="Youtube" ><img src="<?php echo get_template_directory_uri()."/images/youtube.png"; ?>"></a>
	             <?php } ?>
                 <?php if ( of_get_option('pinterest', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('pinterest', true)); ?>" title="Pinterest" ><img src="<?php echo get_template_directory_uri()."/images/pinterest.png"; ?>"></a>
	             <?php } ?>
				 <?php if ( of_get_option('instagram', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('instagram', true)); ?>" title="Instagram" ><img src="<?php echo get_template_directory_uri()."/images/instagram.png"; ?>"></a>
	             <?php } ?>
	             <?php if ( of_get_option('linkedin', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('linkedin', true)); ?>" title="LinkedIn" ><img src="<?php echo get_template_directory_uri()."/images/linkedin.png"; ?>"></a>
	             <?php } ?>	             
	             <?php if ( of_get_option('flickr', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('flickr', true)); ?>" title="Flickr" ><img src="<?php echo get_template_directory_uri()."/images/flickr.png"; ?>"></a>
	             <?php } ?>
                 <?php if ( of_get_option('dribble', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('dribble', true)); ?>" title="Dribble" ><img src="<?php echo get_template_directory_uri()."/images/dribble.png"; ?>"></a>
	             <?php } ?>
	             <?php if ( of_get_option('feedburner', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('feedburner', true)); ?>" title="RSS Feeds" ><img src="<?php echo get_template_directory_uri()."/images/rss.png"; ?>"></a>
	             <?php } ?>
		</div>
        <div class="clear"></div>
        </div>
		
	</header><!-- #masthead -->

        <div id="navWrapper">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'kavya' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kavya' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
        <div class="clear"></div>
        </div><!-- #site-navigation -->    
    
    </div><!--#top-section-->

	<div id="content" class="site-content container">
