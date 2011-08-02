<?php get_header(); ?>

  <div id="main">
  
  	<div id="maincontent" class="equal">
    
      <div class="inner">
      
				<?php if (have_posts()) : ?>
    
        <h1><?php _e('Search Results for','aperturious'); ?> <em id="search-terms">'<?php echo wp_specialchars(stripslashes($_GET['s']), true); ?>'</em></h1>
      
        <?php navigation_above(); ?>
      
        <?php while (have_posts()) : the_post(); ?>
        
        <?php ap_post(); ?>
    
        <?php endwhile; ?>
    
        <?php else : ?>
        
        <?php no_posts(); ?>
        
        <?php endif; ?>
        
        <?php navigation_below(); ?>
        
      </div><!-- /#inner -->
      
    </div><!-- /#maincontent -->

		<?php get_sidebar() ?>
  
  </div><!--/#main-->

<?php get_footer(); ?>