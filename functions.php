<?php
/**
 * bbum functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bbum
 */

if ( ! function_exists( 'bbum_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bbum_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bbum, use a find and replace
	 * to change 'bbum' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bbum', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'top' => __( 'Secondary Top', 'default' ),
        'primary' => __( 'Primary', 'default' ),
        'footer' => __( 'Footer', 'default' ),
        'mobile' => __( 'Mobile', 'default' ),
    ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

}
endif; // bbum_setup
add_action( 'after_setup_theme', 'bbum_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bbum_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bbum_content_width', 640 );
}
add_action( 'after_setup_theme', 'bbum_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bbum_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Widget', 'bbum' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Footer Widget', 'bbum' ),
		'id'            => 'footer-widgets',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bbum_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bbum_scripts() {
	wp_register_style('googleFonts', 'Open+Sans:300italic,400italic,600italic,400,300,600,700');
    
	wp_enqueue_style( 'bbum-style', get_stylesheet_uri() );
    wp_enqueue_style( 'custom', get_template_directory_uri()."/custom.css" ); 
    wp_enqueue_style( 'googleFonts');
    wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array(), '4.3' );
    
    //load flexslider css for homepage only
    wp_register_style('flexslider', get_template_directory_uri()."/css/flexslider.css" ); 
    if ( is_front_page()){
        wp_enqueue_style( 'flexslider' );   
    }
    
	wp_enqueue_script( 'bbum-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'bbum-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
    
    //load flexslider js for homepage only
    wp_register_script('flexslider', get_template_directory_uri()."/js/jquery.flexslider-min.js", array(jquery), '', true ); 
    if ( is_front_page('home')){
        wp_enqueue_script( 'flexslider' );   
    }
    
    wp_enqueue_script('bbum', get_template_directory_uri()."/js/bbum.js", array(jquery), '', true ); 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bbum_scripts' );

/*additional functions*/

// add CMB2
if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

//custom comments 
function bbum_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	?>

	<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<br />
	<?php endif; ?>
        
    <div class="comment-author vcard">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
	</div>

	<div class="comment-metadata commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		<span class="entry-date">
        <?php
			/* translators: 1: date, 2: time */
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
		?>
	</span></div>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	   <?php comment_text(); ?>
    </div>

	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>

<?php
}

/**
 * Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';
 */

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';
 */
