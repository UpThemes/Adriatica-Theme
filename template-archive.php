<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>

  <div id="main">
  
    <div id="maincontent">
    
      <div class="inner">
      		
			<h1 class="entry-title"><?php the_title(); ?></h1>        
			
            <div class="buffer">
            
                <div class="grid_2 alpha">		
                
                    <h3><?php _e('Categories'); ?></h3>
        
                    <ul>
                        <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
                    </ul>				
                
                </div><!--/.grid_2-->
                
                <div class="grid_2 omega">
                
                    <h3 class="cufon"><?php _e('Monthly archives','aperturious'); ?></h3>
        
                    <ul>
                        <?php wp_get_archives('type=monthly&show_post_count=1') ?>	
                    </ul>				
                
                </div><!--//.grid_2-->
                
                <div class="clear"></div>
            
            </div>
						
			<?php if (function_exists('wp_tag_cloud')) { ?>
                
            <div id="tag-cloud" class="buffer">
	            
	            <h3><?php _e('Popular tags','aperturious'); ?></h3>					        
	            
	            <ul class="list1">
	                <?php wp_tag_cloud('smallest=10&largest=18'); ?>
	            </ul>	
				
				<?php } ?>	
				
			</div><!--/#tag-cloud -->
			
			<div class="clear"></div>
			
			<div class="last-thirty-posts" class="buffer">
			
				<h3 class="cufon"><?php _e('The last 30 posts','aperturious'); ?></h3>
            
	            <ul>
	                <?php query_posts('showposts=30'); ?>
	                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	                    <?php $wp_query->is_home = false; ?>
	                    <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php the_time('j F Y') ?> - <?php echo $post->comment_count ?> comments</li>
	                
	                <?php endwhile; endif; ?>	
	            </ul>	
            				
			</div><!--/#last-thirty-posts -->		
		
      </div><!-- /#inner -->
      
    </div><!-- /#maincontent -->
      
	  <?php get_sidebar() ?>

  </div><!-- /#main -->
  
<?php get_footer() ?>