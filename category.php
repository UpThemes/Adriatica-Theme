<?php get_header() ?>

  <div id="main">
  
    <div id="maincontent">
    
      <div class="inner">

      <?php if (have_posts()) : ?>
      
      <h1 class="single-cat"><?php single_cat_title(); ?></h1>
  
      <?php while (have_posts()) : the_post(); ?>
      
      <?php get_template_part( 'content', get_post_format() ); ?>
  
      <?php endwhile; ?>
  
      <?php else : ?>
      
      <?php no_posts(); ?>
      
      <?php endif; ?>
      
      <?php navigation_below(); ?>
        
      </div><!-- /.inner -->
      
    </div><!-- /#maincontent -->
      
	  <?php get_sidebar() ?>

  </div><!-- /#main -->
  
<?php get_footer() ?>