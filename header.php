<?php
global $up_options;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php
/* Title Function */
    if(function_exists('up_title')):
        echo "<title>".up_title()."</title>";
    else:
        echo "<title>";
        wp_title('');
        if(!is_home())echo ' - '.get_bloginfo('name');
        echo "</title>";
    endif;
    
    /* SEO */
    do_action('up_seo');
?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/print.css" media="print" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/vnd.microsoft.icon"/>
<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-ico"/>
<link rel="start" href="<?php bloginfo('url'); ?>" title="Home" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php upfw_rss(); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/font/stylesheet.css" media="screen" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

<!-- Fixes for IE6 and lower -->
<!--[if lte IE 8]><script src="<?php bloginfo('template_url'); ?>/js/DD_belatedPNG.js"></script><script type="text/javascript">DD_belatedPNG.fix('.comment-meta a,.meta .date,.url,.meta .tags,.meta .category,.backtotop,.meta .author,.meta .comments a,.comment-reply-link,.comment-meta a.comment-edit-link,#header,#header #logo a,#nav li.hasChildren:hover,#nav li.hasChildrenHasHover,.comment-author,.submit-image');</script><style type="text/css">#header #nav ul li a{height: auto}</style><![endif]-->

<?php get_aperturious_theme(); ?>
<?php get_aperturious_layout(); ?>

</head>
<body class="<?php thematic_body_class() ?>">

<div id="wrapper">
	<div id="header">
		<div class="inner">
			<h1 id="logo"><a title="<?php bloginfo('name'); ?>" href="<?php bloginfo('url'); ?>"><img src="<?php echo $up_options->logo; ?>"/></a></h1>
			
			<?php if( function_exists('wp_nav_menu') ): ?>
			
				<?php
				wp_nav_menu(array(
					'menu' => 'Main Menu',
					'theme_location' => 'main_menu',
					'container' => false,
					'menu_id' => 'nav',
					'menu_class' => 'sf-menu',
					'fallback_cb' => 'category_nav'
				));
				?>
			
			<?php else: ?>
			
			<?php category_nav(); ?>
			
			<?php endif; ?>

		<div class="search-form">
			<?php include (TEMPLATEPATH . "/header-searchform.php"); ?>
		</div><!-- /.inner -->

		</div>
	</div>
  
  <div class="ads_below_header">
  	<?php ads_below_header(); ?>
  </div>
  
  <div id="container">