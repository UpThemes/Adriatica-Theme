<div id="sidebar">
  <?php if( is_active_sidebar('sidebar') ): ?>
  <ul>
    <?php dynamic_sidebar(); ?>
 </ul>
	<?php else : ?>
   <?php echo the_widget("WP_Widget_Pages"); ?>
  <?php endif; ?>

</div><!-- /#sidebar -->