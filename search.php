<?php get_header(); ?>

  <div id="main">
  
  	<div id="content" class="equal">
    
      <div class="inner">
      
				<?php if (have_posts()) : ?>
    
        <h1><?php _e('Search Results for','adriatica'); ?> <em id="search-terms">'<?php echo wp_specialchars(stripslashes($_GET['s']), true); ?>'</em></h1>
            
        <?php while (have_posts()) : the_post(); ?>
        
        <?php get_template_part( 'content', get_post_format() ); ?>
    
        <?php endwhile; ?>
    
        <?php else : ?>
        
        <?php adriatica_no_posts(); ?>
        
        <?php endif; ?>
        
        <?php adriatica_pagination(); ?>
        
      </div><!-- /#inner -->
      
    </div><!-- /#content -->

		<?php get_sidebar() ?>
  
  </div><!--/#main-->

<?php get_footer(); ?>