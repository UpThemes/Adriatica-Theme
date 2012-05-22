<?php

function adriatica_navigation( $type = 'plain', $endsize = 1, $midsize = 1 ) {

  echo '  <div class="paging clearfix">'."\n";
  if( function_exists('wp_pagenavi') ) : ?>

    <?php wp_pagenavi(); ?>

  <?php else :

    global $wp_query, $wp_rewrite;  
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    // Sanitize input argument values
    if ( ! in_array( $type, array( 'plain', 'list', 'array' ) ) ) $type = 'plain';
    $endsize = (int) $endsize;
    $midsize = (int) $midsize;

    // Setup argument array for paginate_links()
    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'show_all' => false,
        'end_size' => $endsize,
        'mid_size' => $midsize,
        'type' => $type,
        'prev_text' => __('&larr; Previous','adriatica'),
        'next_text' => __('Next &rarr;','adriatica')
    );

    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    echo "<p><strong>" . paginate_links( $pagination ) . "</strong></p>";


  endif;

  echo '  </div>'."\n";
}

function the_ap_meta($author=true,$date=true,$category=true,$comments=true,$tags=true){
	
global $post,$up_options;

$metacount = 0;

if($author)		$metacount++;
if($date)		$metacount++;
if($category)	$metacount++;
if($comments)	$metacount++;
if($tags)		$metacount++;

	if( ($up_options->postmeta_homepage == 1 && (is_home() || is_front_page() || is_category())) ): ?>
	
			<ul class="meta grid_<?php echo $metacount; ?>">
				<?php if($author) {?><li class="author"><i class="icon-user"></i> <?php the_author_link(); ?></li><?php } ?>
				<?php if($date) {?><li class="date"><i class="icon-calendar"></i> <?php the_time('M j, Y'); ?></li><?php } ?>
				<?php if($category) {?><li class="category"><i class="icon-book-open"></i> <?php the_category(', '); ?></li><?php } ?>
				<?php if($comments) {?><li class="comments"><i class="icon-comment"></i> <?php comments_popup_link(__('0 comments','adriatica'), __('1 comment','adriatica'), __('% comments')); ?></li><?php } ?>
				<?php if($tags) {?><?php if (function_exists('the_tags')) { echo ' '; the_tags('<li class="tags"><i class="icon-tag"></i> ', ', ', '</li>'); } ?><?php } ?>
			</ul>
  
<?php
	
	endif;
				
	if(is_single() || is_page()){
		
		if($up_options->postmeta_single == 1){

?>

      <ul class="meta grid_<?php echo $metacount; ?>">
        <?php if($author) {?><li class="author"><i class="icon-user"></i> <?php the_author_link(); ?></li><?php } ?>
        <?php if($date) {?><li class="date"><i class="icon-calendar"></i> <?php the_time('M j, Y'); ?></li><?php } ?>
        <?php if($category) {?><li class="category"><i class="icon-book-open"></i> <?php the_category(', '); ?></li><?php } ?>
        <?php if($comments) {?><li class="comments"><i class="icon-comment"></i> <?php comments_popup_link(__('0 comments','adriatica'), __('1 comment','adriatica'), __('% comments')); ?></li><?php } ?>
        <?php if($tags) {?><?php if (function_exists('the_tags')) { echo ' '; the_tags('<li class="tags"><i class="icon-tag"></i> ', ', ', '</li>'); } ?><?php } ?>
      </ul>
  
<?php
		}
	} 
}

function custom_css(){
    $up_options = upfw_get_options();
    if($up_options->linkcolor || $up_options->hovercolor || $up_options->activecolor):
    $custom_css = '<style type="text/css">';
	
		if($up_options->linkcolor)
			$custom_css .= "a{ color: ".$up_options->linkcolor.";}";

		if($up_options->hovercolor)
			$custom_css .= "a:hover{ color: ".$up_options->hovercolor.";}";

		if($up_options->activecolor)
			$custom_css .= "a:active{ color: ".$up_options->activecolor.";}";

    $custom_css .= '</style>';

	echo $custom_css;
    endif;
}

add_action('wp_head', 'custom_css');

function no_posts(){
	
	global $wp_query, $post;

?>
	
  <h1><?php _e('Not Found','adriatica'); ?></h1>
  <p><?php _e('Sorry, but you are looking for something that isn\'t here.','adriatica'); ?></p>
  <?php get_template_part("searchform"); ?>

<?php
}

function navigation_above(){ 

  adriatica_navigation();

}

function navigation_below(){ 

  adriatica_navigation();

}

function contributors() {
	
	global $wpdb;
	 
	$authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users ORDER BY display_name");
	
	$count = 2;
	
	foreach($authors as $author) {
	?>
		<div class="grid_3">
			<div class="contributor">
				<a href="<?php bloginfo('url'); ?>/?author=<?php echo $author->ID; ?>">
					<?php echo get_avatar($author->ID); ?>
				</a>
				<h2><a href="<?php bloginfo('url'); ?>/?author=<?php echo $author->ID; ?>"><?php echo the_author_meta('display_name', $author->ID); ?></a>
					<?php if(get_the_author_meta('user_url', $author->ID)){ ?> <span class="author url">(<a href="<?php echo the_author_meta('user_url', $author->ID); ?>"><?php echo the_author_meta('user_url', $author->ID); ?></a>)</span><?php } ?>
				</h2>
				<div>
					<?php echo the_author_meta('description', $author->ID); ?></a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
<?php
		if($count % 3 == 1) echo '<div class="clear"></div>';
		$count++;
	}
}

?>