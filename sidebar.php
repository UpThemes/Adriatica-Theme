<div id="sidebar">
  <ul>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) : else : ?>
		<li class="widget widget_categories">
		  <?php echo the_widget("WP_Widget_RSS"); ?>
    </li>
   <?php endif; ?>
 </ul>
</div><!-- /#sidebar -->