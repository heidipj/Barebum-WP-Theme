<?php
/**
 * barebum Theme Customizer
 *
 * @package barebum
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bbum_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	//$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage
    
    /////////////////////////////////////
    // Add Logo
    $wp_customize->add_setting( 'bblogo' ); // Add setting for logo uploader
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bblogo', array(
        'label'    => __( 'Upload Logo', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'bblogo',
    ) ) );
    
    
    /////////////////////////////////////
    // Add Contact Details Section
    $wp_customize->add_section( 'contact-details' , array(
        'title' => __( 'Contact Details', '_s' ),
        'priority' => 20,
        'description' => __( 'Enter your contact details.', '_s' )
    ) );
    
    // Add Email Setting
    $wp_customize->add_setting( 'bbemail' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bbemail', array(
        'label' => __( 'Email', '_s' ),
        'section' => 'contact-details',
        'settings' => 'bbemail',
    ) ) );
    
    // Add Phone Setting
    $wp_customize->add_setting( 'bbphone' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bbphone', array(
        'label' => __( 'Phone', '_s' ),
        'section' => 'contact-details',
        'settings' => 'bbphone',
    ) ) );
    
    // Add Mobile Setting
    $wp_customize->add_setting( 'bbmobile' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bbmobile', array(
        'label' => __( 'Mobile', '_s' ),
        'section' => 'contact-details',
        'settings' => 'bbmobile',
    ) ) );
    
    // Add Address Setting
    $wp_customize->add_setting( 'bbaddress' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bbaddress', array(
        'label' => __( 'Address', '_s' ),
        'section' => 'contact-details',
        'settings' => 'bbaddress',
    ) ) );
    
    // Add Conpany Reg Setting
    $wp_customize->add_setting( 'bbcompanyreg' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bbcompanyreg', array(
        'label' => __( 'Company Registration Number', '_s' ),
        'section' => 'contact-details',
        'settings' => 'bbcompanyreg',
    ) ) );
    
    /////////////////////////////////////
    // Add Social Media Section
    $wp_customize->add_section( 'social-media' , array(
        'title' => __( 'Social Media', '_s' ),
        'priority' => 30,
        'description' => __( 'Enter the URL to your account for each service for the icon to appear in the header.', '_s' )
    ) );
    
    // Add Twitter Setting
    $wp_customize->add_setting( 'bbtwitter' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bbtwitter', array(
        'label' => __( 'Twitter', '_s' ),
        'section' => 'social-media',
        'settings' => 'bbtwitter',
    ) ) );
    
    // Add Facebook Setting
    $wp_customize->add_setting( 'bbfacebook' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bbfacebook', array(
        'label' => __( 'Facebook', '_s' ),
        'section' => 'social-media',
        'settings' => 'bbfacebook',
    ) ) );
    
    // Add YouTube Setting
    $wp_customize->add_setting( 'bbyoutube' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bbyoutube', array(
        'label' => __( 'YouTube', '_s' ),
        'section' => 'social-media',
        'settings' => 'bbyoutube',
    ) ) );
    
    // Add LinkedIn Setting
    $wp_customize->add_setting( 'bblinkedin' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bblinkedin', array(
        'label' => __( 'LinkedIn', '_s' ),
        'section' => 'social-media',
        'settings' => 'bblinkedin',
    ) ) );
    
    // Add Google Plus Setting
    $wp_customize->add_setting( 'bbgoogleplus' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bbgoogleplus', array(
        'label' => __( 'Google Plus', '_s' ),
        'section' => 'social-media',
        'settings' => 'bbgoogleplus',
    ) ) );
    
    // Add Instagram Setting
    $wp_customize->add_setting( 'bbinstagram' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bbinstagram', array(
        'label' => __( 'Instagram', '_s' ),
        'section' => 'social-media',
        'settings' => 'bbinstagram',
    ) ) );
    
    // Add Pinterest Setting
    $wp_customize->add_setting( 'bbpinterest' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bbpinterest', array(
        'label' => __( 'Pinterest', '_s' ),
        'section' => 'social-media',
        'settings' => 'bbpinterest',
    ) ) );
    
}
add_action( 'customize_register', 'bbum_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bbum_customize_preview_js() {
	wp_enqueue_script( 'bbum_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'bbum_customize_preview_js' );
