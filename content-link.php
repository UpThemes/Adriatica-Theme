<?php
$post_class = "clearfix postwrapper";

if( has_post_thumbnail() )
  $post_class .= " has-featured-image";
else
  $post_class .= " no-featured-image";
?>

<div id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>

	<?php the_content(); ?>

  <?php adriatica_meta($author=true,$date=true,$category=false,$comments=true,$tags=false); ?>
    
 	</div><!-- /.postwrapper -->