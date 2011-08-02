<?php get_header() ?>    

  <div id="main">
  
  	<div id="maincontent" class="equal">
    
      <div class="inner">

      <?php top_content_ads(); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      
      <?php ap_post(); ?>
  
      <?php comments_template(); ?>
            
      <?php endwhile; ?>
      
			<?php else : ?>
  
      <?php no_posts(); ?>
  
      <?php endif; ?>

      <?php bottom_content_ads(); ?>
      
      </div><!-- /.inner -->
      
    </div><!-- /#maincontent -->
	  
    <?php get_sidebar() ?>
    
  </div><!-- /#main -->
  
<?php get_footer() ?>