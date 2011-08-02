<?php
/*
Template Name: Contributors Page
*/
?>

<?php get_header(); ?>

  <div id="main">
  
    <div id="maincontent">
    
      <div class="inner contributors">
				
				<h1 class="page-title"><?php _e('Contributors','aperturious'); ?></h1>
				
				<?php contributors(); ?>
				
				<div class="clear"></div>
					            
      </div><!-- /#inner -->
      
    </div><!-- /#maincontent -->
      
	  <?php get_sidebar() ?>

  </div><!-- /#main -->
  
<?php get_footer() ?>