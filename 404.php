<?php get_header(); ?>
  
  <div id="main">
  
    <div id="maincontent">
    
      <div class="inner">

        <h1 class="single-cat"><?php _e('Page Not Found','adriatica'); ?></h1>
        
        <p><?php _e('The page you requested may have been moved or deleted.','adriatica'); ?></p>
        
        <a class="backtohome" href="<?php bloginfo('url'); ?>"><?php _e('&larr; Back to Home','adriatica'); ?></a>

      </div><!-- /.inner -->
    
    </div><!-- /#maincontent -->
      
	  <?php get_sidebar(); ?>

  </div><!-- /#main -->

<?php get_footer(); ?>