<?php
$post_class = "clearfix";

if( has_post_thumbnail() )
  $post_class .= " has-featured-image";
else
  $post_class .= " no-featured-image";
?>

<div id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>

  <?php if( has_post_thumbnail() ): ?>
  <div class="featured-image"><?php the_post_thumbnail("featured-image") ?></div>
  <?php endif; ?>

	<?php adriatica_meta(); ?>
  
	<h1 class="entry-title">
	  <?php if( !is_singular() ) echo '<a href="' . get_permalink() . '" title="' . __('Permanent Link to','adriatica') . get_the_title() .'">'; ?>
	  <?php the_title(); ?>
	  <?php if( !is_singular() ) echo '</a>'; ?>
	</h1>

	<div class='content-wrapper'>
	<?php the_content(); ?>
  </div>
    
 	</div><!-- /.hentry -->