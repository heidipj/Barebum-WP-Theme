<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bbum
 */

?>

	</div><!-- #content -->

	<div class="footer-widgets-wrapper">
        <div class="footer-widgets-area">

            <?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>

              <?php dynamic_sidebar( 'footer-widgets' ); ?>

            <?php endif; ?>

        </div><!-- end footer-widgets-area -->
    </div><!-- end footer-widgets-wrapper -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        
		<div class="site-info">
            
                <?php if ( get_theme_mod( 'bblogo' ) ) : ?>
                <div class="footer-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <img src="<?php echo get_theme_mod( 'bblogo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                </a>
                </div>
                <?php endif ?>
            
                <p class="company-info"><?php bloginfo( $name ); ?> &copy; Copyright <?php echo date('Y'); ?>
                <?php if ( get_theme_mod( 'bbcompanyreg' ) ) : ?>
                    <span class="company-reg">Company Registration Number: <?php echo get_theme_mod('bbcompanyreg' ); ?></span>
                <?php endif ?>
                </p>
                
                <p class="company-contact">
                <?php if ( get_theme_mod( 'bbaddress' ) ) : ?>
                    <span class="addres"><?php echo get_theme_mod( 'bbaddress' ); ?></span>
                <?php endif ?>
                
                 <?php if ( get_theme_mod( 'bbphone' ) ) : ?>
                    <span class="phone"><?php echo get_theme_mod( 'bbphone' ); ?></span>
                <?php endif ?>
                
                <?php if ( get_theme_mod( 'bbmobile' ) ) : ?>
                    <span class="mobile"><?php echo get_theme_mod( 'bbmobile' ); ?></span>
                <?php endif ?>  
                </p>
            <?php if ( has_nav_menu( array( 'theme_location' => 'footer') ) ) { ?>
                <nav id="footer-navigation" class="footer-navigation" role="navigation">
                     <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
                </nav><!-- #site-navigation -->
            <?php } ?>
			
            <div class="site-credit">Website by <a href="http://heidipj.com">Heidipj</a></div><!-- end site credit -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>