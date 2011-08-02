<?php get_header() ?>

  <div id="main">
  
    <div id="maincontent">
    
      <div class="inner">
      
      <?php top_content_ads(); ?>

      <?php if (have_posts()) : ?>
      
      <h1 class="single-cat"><?php single_cat_title(); ?></h1>
  
      <?php while (have_posts()) : the_post(); ?>
      
      <?php ap_post(); ?>
  
      <?php endwhile; ?>
  
      <?php else : ?>
      
      <?php no_posts(); ?>
      
      <?php endif; ?>
      
      <?php navigation_below(); ?>

      <?php bottom_content_ads(); ?>
        
      </div><!-- /#inner -->
      
    </div><!-- /#maincontent -->
      
	  <?php get_sidebar() ?>

  </div><!-- /#main -->
  
<?php get_footer() ?>