<div id="post-<?php the_ID(); ?>" <?php post_class("clearfix postwrapper"); ?>>

  <?php if( get_the_title() ): ?>
  <h1 class="entry-title">
    <?php the_title(); ?>
  </h1>
  <?php endif; ?>

  <?php if( get_the_content() ) the_content(); ?>

  <?php adriatica_meta($author=false,$date=true,$category=false,$comments=true,$tags=false); ?>

</div><!-- /.postwrapper -->