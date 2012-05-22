<?php

function adriatica_theme_setup() {

  add_theme_support( 'nav-menus' );

	load_theme_textdomain( 'adriatica', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
  if( function_exists('register_nav_menu') )
  	register_nav_menu( 'main_menu', __( 'Main Menu','adriatica' ) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'video', 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	// Add support for custom backgrounds
	add_custom_background();

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	add_image_size('featured-image',880,380,true);

	// The default header text color
	define( 'HEADER_TEXTCOLOR', '000' );

	// The height and width of your custom header.
	// Add a filter to adriatica_header_image_width and adriatica_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'adriatica_header_image_width', 260 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'adriatica_header_image_height', 80 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the size of the header image that we just defined
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Add logo image size
	add_image_size( 'logo', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Turn on random header image rotation by default.
	add_theme_support( 'custom-header' );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See adriatica_admin_header_style(), below.
	add_custom_image_header( 'adriatica_header_style', 'adriatica_admin_header_style', 'adriatica_admin_header_image' );

	// ... and thus ends the changeable header business.

}

add_action( 'after_setup_theme', 'adriatica_theme_setup' );

function adriatica_widgets_init(){

  register_sidebar( array(
  		'name'          => __('Sidebar'),
  		'id'            => 'sidebar',
  		'before_widget' => '<li id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</li>',
  		'before_title'  => '<h4 class="widgettitle">',
  		'after_title'   => '</h4>' ));
  
  register_sidebar( array(
  		'name'          => __('Footer 1'),
  		'id'            => 'footer-1',
  		'before_widget' => '<li id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</li>',
  		'before_title'  => '<h4 class="widgettitle">',
  		'after_title'   => '</h4>' ));
  
  register_sidebar( array(
  		'name'          => __('Footer 2'),
  		'id'            => 'footer-2',
  		'before_widget' => '<li id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</li>',
  		'before_title'  => '<h4 class="widgettitle">',
  		'after_title'   => '</h4>' ));
  
  register_sidebar( array(
  		'name'          => __('Footer 3'),
  		'id'            => 'footer-3',
  		'before_widget' => '<li id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</li>',
  		'before_title'  => '<h4 class="widgettitle">',
  		'after_title'   => '</h4>' ));

}

add_action('widgets_init','adriatica_widgets_init');

if ( ! function_exists( 'adriatica_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @since Adriatica 1.0
 */
function adriatica_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		#site-title,
		#site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // adriatica_header_style

if ( ! function_exists( 'adriatica_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in adriatica_theme_init().
 *
 * @since Aperturious 1.0
 */
function adriatica_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
		font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif;
	}
	#headimg h1 {
		margin: 0;
	}
	#headimg h1 a {
		font-size: 32px;
		line-height: 36px;
		text-decoration: none;
	}
	#desc {
		font-size: 14px;
		line-height: 23px;
		padding: 0 0 3em;
	}
	<?php
		// If the user has set a custom color for the text use that
		if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?>;
		}
	<?php endif; ?>
	#headimg img {
		max-width: 1000px;
		height: auto;
		width: 100%;
	}
	</style>
<?php
}
endif; // adriatica_admin_header_style

if ( ! function_exists( 'adriatica_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in adriatica_setup().
 *
 * @since Adriatica 1.0
 */
function adriatica_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
		?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // adriatica_admin_header_image

/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function adriatica_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'adriatica_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function adriatica_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'adriatica' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and adriatica_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function adriatica_auto_excerpt_more( $more ) {
	return ' &hellip;' . adriatica_continue_reading_link();
}
add_filter( 'excerpt_more', 'adriatica_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function adriatica_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= adriatica_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'adriatica_custom_excerpt_more' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function adriatica_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'adriatica_page_menu_args' );

function adriatica_enqueue_scripts(){

  wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/scripts/jquery.fitvids.js', array('jquery') );
  wp_enqueue_script( 'init', get_template_directory_uri() . '/scripts/init.js', array('jquery','fitvids') );

}

add_action('wp_enqueue_scripts','adriatica_enqueue_scripts');

function adriatica_set_theme($body_class){
	
  $up_options = upfw_get_options();
	
	if( isset($up_options->theme) && $up_options->theme ){

	  $body_class[] = "colors_" . esc_attr($up_options->theme);

	}
	
	return $body_class;
		
}

add_filter('body_class','adriatica_set_theme');

function adriatica_set_layout($body_class){
	
  $up_options = upfw_get_options();
	
	if( isset($up_options->layout) && $up_options->layout ){

	  $body_class[] = "layout_" . esc_attr($up_options->layout);

	}
	
	return $body_class;

}

add_filter('body_class','adriatica_set_layout');

function theme_footer() {

  $up_options = upfw_get_options();
	
  echo $up_options->footertext;
	
}

?>