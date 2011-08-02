<?php

if(!is_admin()){
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'cufon', get_bloginfo('template_url') . '/js/cufon.min.js' );
	wp_enqueue_script( 'custom-font', get_bloginfo('template_url') . '/js/custom.font.js' );
	wp_enqueue_script( 'equalheights', get_bloginfo('template_url') . '/js/jquery.equalheights.js' );
	wp_enqueue_script( 'init', get_bloginfo('template_url') . '/js/init.js' );
	wp_enqueue_script( 'tabs', get_bloginfo('template_url') . '/js/tabs.js' );
	wp_enqueue_script( 'pop', get_bloginfo('template_url') . '/js/jquery.pop.js' );
	wp_enqueue_script( 'tipsy', get_bloginfo('template_url') . '/js/jquery.tipsy.js' );
}

register_sidebar( array(
		'name'          => sprintf(__('Primary Aside'), $i ),
		'id'            => 'primary-aside',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' ));

register_sidebar( array(
		'name'          => sprintf(__('Footer 1'), $i ),
		'id'            => 'footer-1',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' ));

register_sidebar( array(
		'name'          => sprintf(__('Footer 2'), $i ),
		'id'            => 'footer-2',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' ));

register_sidebar( array(
		'name'          => sprintf(__('Footer 3'), $i ),
		'id'            => 'footer-3',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' ));

function get_aperturious_theme(){
	
  global $up_options;
	
	if($up_options->theme) echo '<link href="' . get_bloginfo('stylesheet_directory') . '/themes/' . $up_options->theme . '.css" rel="stylesheet" type="text/css" media="screen" />';
	
}

function get_aperturious_layout(){
	
  global $up_options;
	
	if($up_options->layout == 'reversed') echo '<link href="' . get_bloginfo('template_url') . '/layout/reversed.css" rel="stylesheet" type="text/css" media="screen" />';
	if($up_options->layout == 'single_column') echo '<link href="' . get_bloginfo('template_url') . '/layout/single_column.css" rel="stylesheet" type="text/css" media="screen" />';
	
}

function theme_footer() {

  global $up_options;
	
  echo $up_options->footertext;
	
}

function grab_favicon(){

	global $up_options;

?>

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon-<?php echo $up_options->theme; ?>.png" type="image/vnd.microsoft.icon"/>
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon-<?php echo $up_options->theme; ?>.png" type="image/x-ico"/>
	
<?php

}

?>