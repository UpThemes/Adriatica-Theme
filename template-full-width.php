<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>

  <div id="main">
  
    <div id="maincontent" class="fullwidth">
    
      <div class="inner">
      
		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>		
				
				<div class="post-outer">
				
				<div class="post-alt blog" id="post-<?php the_ID(); ?>">
				
					<h1><?php the_title(); ?></h1> 
		
					<div class="entry">
						<?php the_content(__('<span class="continue">Continue Reading</span>','aperturious')); ?>
					</div>
				
				</div><!--/post-->
				
				</div><!--/post-outer-->

			<?php endwhile; ?>
	
		<?php endif; ?>

      </div><!-- /#inner -->
      
    </div><!-- /#maincontent -->
    
  </div><!-- /#main -->
  
<?php get_footer() ?>