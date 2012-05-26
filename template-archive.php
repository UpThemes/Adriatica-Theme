<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>

  <div id="main">
  
    <div id="content">
    
      <div class="inner">
      		
			<h1 class="entry-title"><?php the_title(); ?></h1>        
			
      <div class="buffer">
      
          <div class="grid_2 alpha">		
          
              <h3><?php _e("Categories","adriatica"); ?></h3>
  
              <ul>
                  <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
              </ul>				
          
          </div><!--/.grid_2-->
          
          <div class="grid_2 omega">
          
              <h3 class="cufon"><?php _e('Monthly archives','adriatica'); ?></h3>
  
              <ul>
                  <?php wp_get_archives('type=monthly&show_post_count=1') ?>	
              </ul>				
          
          </div><!--//.grid_2-->
          
          <div class="clear"></div>
      
      </div>
			
			<?php if (function_exists('wp_tag_cloud')) { ?>
                
      <div id="tag-cloud" class="buffer">

        <h3><?php _e('Popular tags','adriatica'); ?></h3>					        
	            
        <ul class="list1">
          <?php wp_tag_cloud('smallest=10&largest=18'); ?>
        </ul>	

			</div><!--/#tag-cloud -->

      <?php } ?>	
			
			<div class="clear"></div>
			
			<div class="last-thirty-posts" class="buffer">
			
				<h3><?php _e('The last 30 posts','adriatica'); ?></h3>
            
        <ul>
            <?php $query = new WP_Query('showposts=30'); ?>
            <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php the_time('j F Y') ?> - <?php sprintf("%s comments","adriatica"), $post->comment_count() ); ?></li>
            <?php endwhile; endif; ?>	
        </ul>	
            				
			</div><!--/#last-thirty-posts -->		
		
      </div><!-- /#inner -->
      
    </div><!-- /#content -->
      
	  <?php get_sidebar() ?>

  </div><!-- /#main -->
  
<?php get_footer() ?>