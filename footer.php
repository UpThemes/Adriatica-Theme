  </div><!-- /#container -->
  
  <div id="footer">
    <div class="inner">
    	
      <div class="column one alpha">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : endif; ?>
      </div>
    	
      <div class="column two">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : endif; ?>
      </div>
    	
      <div class="column three omega">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3') ) : endif; ?>
      </div>
      
      <div class="clear"></div>

			<div class="theme_footer"><?php theme_footer(); ?></div>
      
      <div class="clear"></div>
      
      </div><!-- /#inner-->
  </div><!-- /#footer-->
</div><!-- /#wrapper -->

<?php wp_footer() ?>

</body>
</html>