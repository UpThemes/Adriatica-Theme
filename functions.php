<?php

if ( function_exists( 'add_theme_support' ) ):
	add_theme_support( 'post-thumbnails' ); // New 2.9 Post Thumbnail
	add_theme_support( 'nav-menus' ); // New menu system
endif;

function theme_init() {

	if( function_exists('register_nav_menu') )
		register_nav_menu( 'main_menu', __( 'Main Menu' ) );

	wp_enqueue_script('isFontFaceSupported',get_bloginfo('stylesheet_directory') . '/js/isFontFaceSupported.js',array('jquery'));
	wp_enqueue_script('init',get_bloginfo('stylesheet_directory') . '/js/init.js',array('jquery','isFontFaceSupported'));

	if(!function_exists('wp_pagenavi')){
	  include('wp-pagenavi.php'); // Paged navigation
	}
	
	add_image_size('featured-image',618,240,true);
	
	if(!function_exists('feedburner_circulation')){
		include_once('includes/feedburner-circulation.php'); // This is what gets our feedburner count
	}

	if(isset($_REQUEST['style'])):
		$theme_color = $_REQUEST['style'];
		$_COOKIE['style'] = $theme_color;
	elseif($_COOKIE['style'] && ($_COOKIE['style']=='light' || $_COOKIE['style']=='default' || $_COOKIE['style']=='bluegray')):
		$theme_color = $_COOKIE['style'];
	elseif($up_options->style):
		$theme_color = $up_options->style;
	endif;
	
	if( $theme_color == 'bluegray' )
		wp_enqueue_style( 'bluegray', get_bloginfo('template_url') . '/themes/bluegray.css' );
	if( $theme_color == 'light' )
		wp_enqueue_style( 'light', get_bloginfo('template_url') . '/themes/light.css' );

}

add_action( 'init', 'theme_init' );

include_once('admin/admin.php'); // Bootstrap UpThemes Framework

include_once('functions/theme-setup.php'); // Load scripts, sidebars, and favicons 

include_once('functions/user-profile.php'); // Custom fields for user profiles and author box

include_once('functions/theme-ad-zones.php'); // Set up ad zones for this theme

include_once('functions/meta-boxes.php'); // Custom write panel for ratings/reviews

include_once('functions/general.php'); // Randomly awesome functions for this theme

?>