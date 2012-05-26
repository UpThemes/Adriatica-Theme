<?php
/*
Template Name: Sitemap Page
*/
?>

<?php get_header(); ?>

  <div id="main">
  
    <div id="content">
    
      <div class="inner">
      
			<div <?php post_class(); ?>>
				
				<h1 class="page-title entry-title"><?php _e('Sitemap','adriatica'); ?></h1>
				
				<div class="grid_3 alpha">
					<div class="buffer">
						<h3><?php _e('Blog / News Monthly Archives','adriatica'); ?></h3>
						<ul><?php wp_get_archives('type=monthly&limit=12'); ?> </ul>
					</div>
				</div>
				
				<div class="grid_3 omega">
					<div class="buffer">
						<h3><?php _e('Pages','adriatica'); ?></h3>
						<ul><?php wp_list_pages('sort_column=menu_order&depth=0&title_li='); ?></ul>
					</div>
				</div>
				
				<div class="grid_3">
					<h3><?php _e('Blog / News Categories','adriatica'); ?></h3>
					<ul><?php wp_list_categories('depth=0&title_li=&show_count=1'); ?></ul>
				</div>
				
			</div><!-- /.hentry -->

      </div><!-- /#inner -->
      
    </div><!-- /#content -->
      
	  <?php get_sidebar() ?>

  </div><!-- /#main -->
  
<?php get_footer() ?>