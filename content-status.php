<div id="post-<?php the_ID(); ?>" <?php post_class("clearfix postwrapper"); ?>>

  <h1 class="entry-title">
    <?php if( !is_singular() ) echo '<a href="' . get_permalink() . '" title="' . __('Permanent Link to','adriatica') . get_the_title() .'">'; ?>
    <?php the_title(); ?>
    <?php if( !is_singular() ) echo '</a>'; ?>
  </h1>

  <?php the_content(); ?>

  <?php the_ap_meta($author=false,$date=true,$category=false,$comments=true,$tags=false); ?>

</div><!-- /.postwrapper -->