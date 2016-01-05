<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bbum
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'bbum' ); ?></a>
    
    <?php if ( has_nav_menu( array( 'theme_location' => 'top') ) ) { ?>
        <nav id="top-navigation" class="top-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'top', 'menu_id' => 'top-menu' ) ); ?>
        </nav><!-- #site-navigation -->
    <?php } ?>
    
	<header id="masthead" class="site-header" role="banner">
        
        <div class="site-header-innerwrap">
        
        <div class="site-branding">
        
        <?php if (!is_page('home')){  ?>
            <?php if ( get_theme_mod( 'bblogo' ) ) { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <img src="<?php echo get_theme_mod( 'bblogo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                </a>
            <?php } ?>
            
        <?php } else if (is_page('home')){  ?>
            <?php if ( get_theme_mod( 'bblogohome' ) ) { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <img src="<?php echo get_theme_mod( 'bblogohome' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                </a>
            <?php } ?>
        
        <?php } else { ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>           
        <?php } ?>
		
        </div><!-- .site-branding -->
        
        <nav id="site-navigation" class="main-navigation" role="navigation">
            
             <!-- social icons -->
            <div class="social-icons">
                    <?php if (get_theme_mod( 'bbtwitter' )){ ?>
                    <a class="twitter" href='<?php echo get_theme_mod( 'bbtwitter' ); ?>'><i class="fa fa-twitter"></i></a>
                    <?php } ?>
                    <?php if (get_theme_mod( 'bbfacebook' )){ ?>
                        <a class="facebook" href='<?php echo get_theme_mod( 'bbfacebook' ); ?>'><i class="fa fa-facebook-square"></i></a>
                    <?php } ?>
                    <?php if (get_theme_mod( 'bbinstagram' )){ ?>
                    <a class="instagram" href='<?php echo get_theme_mod( 'bbinstagram' ); ?>'><i class="fa fa-instagram"></i></a>
                    <?php } ?>
                    <?php if (get_theme_mod( 'bbyoutube' )){ ?>
                        <a class="youtube" href='<?php echo get_theme_mod( 'bbyoutube' ); ?>'><i class="fa fa-youtube"></i></a>
                    <?php } ?>
                    <?php if (get_theme_mod( 'bblinkedin' )){ ?>
                        <a class="linkedin" href='<?php echo get_theme_mod( 'bblinkedin' ); ?>'><i class="fa fa-linkedin"></i></a>
                    <?php } ?>
                    <?php if (get_theme_mod( 'bbgoogleplus' )){ ?>
                        <a class="googleplus" href='<?php echo get_theme_mod( 'bbgoogleplus' ); ?>'><i class="fa fa-google-plus"></i></a>
                    <?php } ?>
                    <?php if (get_theme_mod( 'bbpinterest' )){ ?>
                        <a class="pinterest" href='<?php echo get_theme_mod( 'bbpinterest' ); ?>'><i class="fa fa-pinterest"></i></a>
                    <?php } ?>
            </div><!-- end social icons -->
            
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Menu', 'bbum' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
            <?php if ( has_nav_menu( array( 'theme_location' => 'primary') ) ) { ?>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            <?php } ?>
            
            
        </nav><!-- #site-navigation -->
            
        </div><!-- end site-header-innerwrap -->    
			
	</header><!-- #masthead -->

	<div id="content" class="site-content">
