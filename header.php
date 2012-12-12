<?php
$up_options = upfw_get_options();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(); ?></title>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/print.css" media="print" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<div id="wrapper">

	<div id="header">
	
	  <div class="inner">
  
      <div id="headimg">
  
        <?php if( get_header_image() ): ?>
  			<a title="<?php bloginfo('name'); ?>" href="<?php bloginfo('url'); ?>"><img src="<?php echo header_image(); ?>"/></a>
        <?php else: ?>
          <h1 id="title"><a class="title" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
          <div id="desc"><?php bloginfo('description'); ?></div>
        <?php endif; ?>
  
      </div><!--/#headimg-->
  
  		<div class="search-form">
  			<?php get_template_part("searchform"); ?>
  		</div><!-- /.search-form -->
  
      <?php
      if( function_exists('wp_nav_menu') ):
      	wp_nav_menu(array(
      		'menu' => 'Main Menu',
      		'theme_location' => 'main_menu',
      		'container' => "nav",
      		'container_class' => "menu",
      		'menu_id' => 'primary',
      		'menu_class' => 'sf-menu',
      		'fallback_cb' => 'wp_page_nav'
      	));
      else:
        wp_page_nav();
      endif;
      ?>
      <div class="clear"></div>
    </div><!--/.inner-->

	</div><!--#header-->
  <div id="container" class="clearfix">