<?php

function ap_post(){

	global $post;
	
	if( function_exists('p75GetVideo') && p75GetVideo($post->ID) ): ?>
        
		<div id="post-<?php the_ID(); ?>" class="postwrapper has-video no-featured-image">

			<?php echo p75GetVideo( $post->ID ); ?>
			<?php the_ap_meta($author=false,$date=true,$category=false,$comments=true,$tags=false); ?>
			<h1 class="no-image"><a href="<?php the_permalink(); ?>" title="<?php echo __('Permanent Link to','aperturious') . get_the_title(); ?>"><?php the_title(); ?></a></h1>
			<?php

	else:

		if( has_post_thumbnail( $post->ID ) ): ?>
		
			<div id="post-<?php the_ID(); ?>" class="postwrapper has-featured-image">
			<div class="featured-image"><?php the_post_thumbnail('featured-image') ?></div>
			
		<?php else: ?>
	
			<div id="post-<?php the_ID(); ?>" class="postwrapper no-featured-image">

		<?php endif; ?>
        
		<h1><a href="<?php the_permalink(); ?>" title="<?php echo __('Permanent Link to','aperturious') . get_the_title(); ?>"><?php the_title(); ?></a></h1>
		
		<?php the_ap_meta();

	endif;
	
	the_ap_content();

?>
    
    	</div><!-- /.postwrapper -->

<?php
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
				<?php if($author) {?><li class="author"><span><?php the_author_link(); ?></span></li><?php } ?>
				<?php if($date) {?><li class="date"><span><?php the_time('M j, Y'); ?></span></li><?php } ?>
				<?php if($category) {?><li class="category"><span><?php the_category(', '); ?></span></li><?php } ?>
				<?php if($comments) {?><li class="comments"><?php comments_popup_link('0 ' . __('comments'), '1 ' . __('comment'), '% ' . __('comments')); ?></li><?php } ?>
				<?php if($tags) {?><?php if (function_exists('the_tags')) { the_tags('<li class="tags"><span>', ', ', '</span></li>'); } ?><?php } ?>
			</ul>
  
<?php
	
	endif;
				
	if(is_single() || is_page()){
		
		if($up_options->postmeta_single == 1){

?>

      <ul class="meta grid_<?php echo $metacount; ?>">
        <?php if($author) {?><li class="author"><span><?php the_author_link(); ?></span></li><?php } ?>
        <?php if($date) {?><li class="date"><span><?php the_time('M j, Y'); ?></span></li><?php } ?>
        <?php if($category) {?><li class="category"><span><?php the_category(', '); ?></span></li><?php } ?>
        <?php if($comments) {?><li class="comments"><span><?php comments_popup_link('0 ' . __('comments'), '1 ' . __('comment'), '% ' . __('comments')); ?></span></li><?php } ?>
        <?php if($tags) {?><?php if (function_exists('the_tags')) { the_tags('<li class="tags"><span>', ', ', '</span></li>'); } ?><?php } ?>
      </ul>
  
<?php
		}
	} 
}

function custom_css(){
    global $up_options;
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

function category_nav(){ ?>

			<ul id="nav">
				<?php wp_list_categories('title_li='); ?>
			</ul>

<?php
}

function the_ap_content(){
	
	global $post;
	
?>
  <div class="content-wrapper">
		<?php if(is_search() || is_category()){ ?>
      <?php echo the_excerpt(); ?>
    <?php }else{ ?>
      <?php echo the_content(__('Continue reading','aperturious') . ' &raquo;'); ?>
    <?php } ?>
  </div>					

<?php 

}

function no_posts(){
	
	global $wp_query, $post;

?>
	
  <h1><?php _e('Not Found','aperturious'); ?></h1>
  <p><?php _e('Sorry, but you are looking for something that isn\'t here.','aperturious'); ?></p>
  <?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php
}

function navigation_above(){ 

	global $wp_query, $post;
	
?>
	<?php if(function_exists('wp_pagenavi')) { ?>
		<?php wp_pagenavi(); ?>
  <?php } else { ?>  
			<div class="navigation above clearfix">
				<div class="alignleft"><?php next_posts_link(__('&laquo; Previous Posts','aperturious')) ?></div>
				<div class="alignright"><?php previous_posts_link(__('Next Posts &raquo;','aperturious')) ?></div>
			</div><!-- /.navigation -->
	<?php } ?>
<?php
}

function navigation_below(){ 

	global $wp_query, $post;
	
?>
	<?php if(function_exists('wp_pagenavi')) { ?>
		<?php wp_pagenavi(); ?>
  <?php } else { ?>  
			<div class="navigation below clearfix">
				<div class="alignleft"><?php next_posts_link(__('&laquo; Previous Posts','aperturious')) ?></div>
				<div class="alignright"><?php previous_posts_link(__('Next Posts &raquo;','aperturious')) ?></div>
			</div><!-- /.navigation -->
	<?php } ?>
<?php
}


// Create a modified output of wp_list_categories where the categories description
// is added inside a span tag within the link like so:
//<li><a title="Category Description" href="#">Category Name<span>Category Description</span></a></li>
function list_cats_with_desc() {
  $base = wp_list_categories('title_li=&echo=0&exclude=1');
 
  // wp_list_categories adds a "cat-item-[category_id]" class to the <li> so let's make use of that!
  // Shouldn't really use regexp to parse HTML, but oh well.
  // (for the curious, here's why: http://stackoverflow.com/questions/1732348/regex-match-open-tags-except-xhtml-self-contained-tags/1732454#1732454 )
 
  $get_cat_id = '/cat-item-[0-9]+/';
  preg_match_all($get_cat_id, $base, $cat_id);
 
  // Let's prepare our category descriptions to be injected.
  // Format will be <a>category-name<span>category-desc</span></a>
  $inject_desc = array();

  $i = 0;
  foreach($cat_id[0] as $id) {
    $id = trim($id,'cat-item-');
    $id = trim($id,'"');
 
    $desc = trim(strip_tags(category_description($id)),"\n");   // For some reason, category_description returns the
                                                                // description wrapped in an unwanted paragraph tag which
                                                                // we remove with strip_tags. It also adds a newline
                                                                // which we promptly trim out.
    if($desc=="") $desc = __("Add Description",'aperturious');
 
    $inject_desc[$i] = '<span class="cat-desc">' . $desc . '</span></a>';
    $i++;
  }

  // Now we inject our descriptions
  $base_arr = explode("\n", $base);
 
  $base_i = 0;
  foreach($inject_desc as $desc) {
 
    // We check whether there's an occurence of "</a>"
    while(strpos($base_arr[$base_i], "</a>") === false) {
      $base_i++;
    }
 
    // If we find one, inject our description <span>
    $base_arr[$base_i] = str_replace("</a>", $desc, $base_arr[$base_i]);
 
    $base_i++;
  }
 
  $base = implode("\n", $base_arr);
  echo $base;
}

// Generates semantic classes for BODY element
function thematic_body_class( $print = true ) {
	global $wp_query, $current_user;

	// It's surely a WordPress blog, right?
	$c = array('wordpress');

	// Applies the time- and date-based classes (below) to BODY element
	thematic_date_classes( time(), $c );

	// Generic semantic classes for what type of content is displayed
	is_front_page()  ? $c[] = 'home'       : null; // For the front page, if set
	is_home()        ? $c[] = 'blog'       : null; // For the blog posts page, if set
	is_archive()     ? $c[] = 'archive'    : null;
	is_date()        ? $c[] = 'date'       : null;
	is_search()      ? $c[] = 'search'     : null;
	is_paged()       ? $c[] = 'paged'      : null;
	is_attachment()  ? $c[] = 'attachment' : null;
	is_404()         ? $c[] = 'four04'     : null; // CSS does not allow a digit as first character

	// Special classes for BODY element when a single post
	if ( is_single() ) {
		$postID = $wp_query->post->ID;
		the_post();

        // Adds post slug class, prefixed by 'slug-'
        $c[] = 'slug-' . $wp_query->post->post_name;

		// Adds 'single' class and class with the post ID
		$c[] = 'single postid-' . $postID;

		// Adds classes for the month, day, and hour when the post was published
		if ( isset( $wp_query->post->post_date ) )
			thematic_date_classes( mysql2date( 'U', $wp_query->post->post_date ), $c, 's-' );

		// Adds category classes for each category on single posts
		if ( $cats = get_the_category() )
			foreach ( $cats as $cat )
				$c[] = 's-category-' . $cat->slug;

		// Adds tag classes for each tags on single posts
		if ( $tags = get_the_tags() )
			foreach ( $tags as $tag )
				$c[] = 's-tag-' . $tag->slug;

		// Adds MIME-specific classes for attachments
		if ( is_attachment() ) {
			$mime_type = get_post_mime_type();
			$mime_prefix = array( 'application/', 'image/', 'text/', 'audio/', 'video/', 'music/' );
				$c[] = 'attachmentid-' . $postID . ' attachment-' . str_replace( $mime_prefix, "", "$mime_type" );
		}

		// Adds author class for the post author
		$c[] = 's-author-' . sanitize_title_with_dashes(strtolower(get_the_author_login()));
		rewind_posts();
	}

	// Author name classes for BODY on author archives
	elseif ( is_author() ) {
		$author = $wp_query->get_queried_object();
		$c[] = 'author';
		$c[] = 'author-' . $author->user_nicename;
	}

	// Category name classes for BODY on category archvies
	elseif ( is_category() ) {
		$cat = $wp_query->get_queried_object();
		$c[] = 'category';
		$c[] = 'category-' . $cat->slug;
	}

	// Tag name classes for BODY on tag archives
	elseif ( is_tag() ) {
		$tags = $wp_query->get_queried_object();
		$c[] = 'tag';
		$c[] = 'tag-' . $tags->slug;
	}

	// Page author for BODY on 'pages'
	elseif ( is_page() ) {
		$pageID = $wp_query->post->ID;
		$page_children = wp_list_pages("child_of=$pageID&echo=0");
		the_post();

        // Adds post slug class, prefixed by 'slug-'
        $c[] = 'slug-' . $wp_query->post->post_name;

		$c[] = 'page pageid-' . $pageID;
		$c[] = 'page-author-' . sanitize_title_with_dashes(strtolower(get_the_author('login')));
		// Checks to see if the page has children and/or is a child page; props to Adam
		if ( $page_children )
			$c[] = 'page-parent';
		if ( $wp_query->post->post_parent )
			$c[] = 'page-child parent-pageid-' . $wp_query->post->post_parent;
		if ( is_page_template() ) // Hat tip to Ian, themeshaper.com
			$c[] = 'page-template page-template-' . str_replace( '.php', '-php', get_post_meta( $pageID, '_wp_page_template', true ) );
		rewind_posts();
	}

	// Search classes for results or no results
	elseif ( is_search() ) {
		the_post();
		if ( have_posts() ) {
			$c[] = 'search-results';
		} else {
			$c[] = 'search-no-results';
		}
		rewind_posts();
	}

	// For when a visitor is logged in while browsing
	if ( $current_user->ID )
		$c[] = 'loggedin';

	// Paged classes; for 'page X' classes of index, single, etc.
	if ( ( ( $page = $wp_query->get('paged') ) || ( $page = $wp_query->get('page') ) ) && $page > 1 ) {
		$c[] = 'paged-' . $page;
		if ( is_single() ) {
			$c[] = 'single-paged-' . $page;
		} elseif ( is_page() ) {
			$c[] = 'page-paged-' . $page;
		} elseif ( is_category() ) {
			$c[] = 'category-paged-' . $page;
		} elseif ( is_tag() ) {
			$c[] = 'tag-paged-' . $page;
		} elseif ( is_date() ) {
			$c[] = 'date-paged-' . $page;
		} elseif ( is_author() ) {
			$c[] = 'author-paged-' . $page;
		} elseif ( is_search() ) {
			$c[] = 'search-paged-' . $page;
		}
	}
	
	// A little Browser detection shall we?
	$browser = $_SERVER[ 'HTTP_USER_AGENT' ];
	
	// Mac, PC ...or Linux
	if ( preg_match( "/Mac/", $browser ) ){
			$c[] = 'mac';
		
	} elseif ( preg_match( "/Windows/", $browser ) ){
			$c[] = 'windows';
		
	} elseif ( preg_match( "/Linux/", $browser ) ) {
			$c[] = 'linux';

	} else {
			$c[] = 'unknown-os';
	}
	
	// Checks browsers in this order: Chrome, Safari, Opera, MSIE, FF
	if ( preg_match( "/Chrome/", $browser ) ) {
			$c[] = 'chrome';

			preg_match( "/Chrome\/(\d.\d)/si", $browser, $matches);
			$ch_version = 'ch' . str_replace( '.', '-', $matches[1] );      
			$c[] = $ch_version;

	} elseif ( preg_match( "/Safari/", $browser ) ) {
			$c[] = 'safari';
			
			preg_match( "/Version\/(\d.\d)/si", $browser, $matches);
			$sf_version = 'sf' . str_replace( '.', '-', $matches[1] );      
			$c[] = $sf_version;
			
	} elseif ( preg_match( "/Opera/", $browser ) ) {
			$c[] = 'opera';
			
			preg_match( "/Opera\/(\d.\d)/si", $browser, $matches);
			$op_version = 'op' . str_replace( '.', '-', $matches[1] );      
			$c[] = $op_version;
			
	} elseif ( preg_match( "/MSIE/", $browser ) ) {
			$c[] = 'msie';
			
			if( preg_match( "/MSIE 6.0/", $browser ) ) {
					$c[] = 'ie6';
			} elseif ( preg_match( "/MSIE 7.0/", $browser ) ){
					$c[] = 'ie7';
			} elseif ( preg_match( "/MSIE 8.0/", $browser ) ){
					$c[] = 'ie8';
			}
			
	} elseif ( preg_match( "/Firefox/", $browser ) && preg_match( "/Gecko/", $browser ) ) {
			$c[] = 'firefox';
			
			preg_match( "/Firefox\/(\d)/si", $browser, $matches);
			$ff_version = 'ff' . str_replace( '.', '-', $matches[1] );      
			$c[] = $ff_version;
			
	} else {
			$c[] = 'unknown-browser';
	}
	
	

	// Separates classes with a single space, collates classes for BODY
	$c = join( ' ', apply_filters( 'body_class',  $c ) ); // Available filter: body_class

	// And tada!
	return $print ? print($c) : $c;
}

// Generates semantic classes for each post DIV element
function thematic_post_class( $print = true ) {
	global $post, $thematic_post_alt;

	// hentry for hAtom compliace, gets 'alt' for every other post DIV, describes the post type and p[n]
	$c = array( 'hentry', "p$thematic_post_alt", $post->post_type, $post->post_status );

	// Author for the post queried
	$c[] = 'author-' . sanitize_title_with_dashes(strtolower(get_the_author('login')));

	// Category for the post queried
	foreach ( (array) get_the_category() as $cat )
		$c[] = 'category-' . $cat->slug;

	// Tags for the post queried; if not tagged, use .untagged
	if ( get_the_tags() == null ) {
		$c[] = 'untagged';
	} else {
		foreach ( (array) get_the_tags() as $tag )
			$c[] = 'tag-' . $tag->slug;
	}

	// For password-protected posts
	if ( $post->post_password )
		$c[] = 'protected';

	// For sticky posts
	if (is_sticky())
	   $c[] = 'sticky';

	// Applies the time- and date-based classes (below) to post DIV
	thematic_date_classes( mysql2date( 'U', $post->post_date ), $c );

	// If it's the other to the every, then add 'alt' class
	if ( ++$thematic_post_alt % 2 )
		$c[] = 'alt';

    // Adds post slug class, prefixed by 'slug-'
    $c[] = 'slug-' . $post->post_name;

	// Separates classes with a single space, collates classes for post DIV
	$c = join( ' ', apply_filters( 'post_class', $c ) ); // Available filter: post_class

	// And tada!
	return $print ? print($c) : $c;
}

// Define the num val for 'alt' classes (in post DIV and comment LI)
$thematic_post_alt = 1;

// Generates semantic classes for each comment LI element
function thematic_comment_class( $print = true ) {
	global $comment, $post, $thematic_comment_alt, $comment_depth, $comment_thread_alt;

	// Collects the comment type (comment, trackback),
	$c = array( $comment->comment_type );

	// Counts trackbacks (t[n]) or comments (c[n])
	if ( $comment->comment_type == 'comment' ) {
		$c[] = "c$thematic_comment_alt";
	} else {
		$c[] = "t$thematic_comment_alt";
	}

	// If the comment author has an id (registered), then print the log in name
	if ( $comment->user_id > 0 ) {
		$user = get_userdata($comment->user_id);
		// For all registered users, 'byuser'; to specificy the registered user, 'commentauthor+[log in name]'
		$c[] = 'byuser comment-author-' . sanitize_title_with_dashes(strtolower( $user->user_login ));
		// For comment authors who are the author of the post
		if ( $comment->user_id === $post->post_author )
			$c[] = 'bypostauthor';
	}

	// If it's the other to the every, then add 'alt' class; collects time- and date-based classes
	thematic_date_classes( mysql2date( 'U', $comment->comment_date ), $c, 'c-' );
	if ( ++$thematic_comment_alt % 2 )
		$c[] = 'alt';

	// Comment depth
	$c[] = "depth-$comment_depth";

	// Separates classes with a single space, collates classes for comment LI
	$c = join( ' ', apply_filters( 'comment_class', $c ) ); // Available filter: comment_class

	// Tada again!
	return $print ? print($c) : $c;
}

// Generates time- and date-based classes for BODY, post DIVs, and comment LIs; relative to GMT (UTC)
function thematic_date_classes( $t, &$c, $p = '' ) {
	$t = $t + ( get_option('gmt_offset') * 3600 );
	$c[] = $p . 'y' . gmdate( 'Y', $t ); // Year
	$c[] = $p . 'm' . gmdate( 'm', $t ); // Month
	$c[] = $p . 'd' . gmdate( 'd', $t ); // Day
	$c[] = $p . 'h' . gmdate( 'H', $t ); // Hour
}

function get_alt_thumbnail($id = null,$width = null,$height = null) {

    if(empty($id))
    {
	    global $post;
	    $id = $post->ID;
    } 
    $output = '';

    $set_width = ' width="' . $width .'" ';
    $set_height = ' height="' . $height .'" '; 
    
    if($height == null OR $height == ''){
        $set_height = '';
    }
        
    if($offset >= 1){$repeat = $repeat + $offset;}

    $attachments = get_children( array(
            'post_parent' => $id,
            'numberposts' => $repeat,
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
			'order' => 'DESC', 
			'orderby' => 'menu_order date')
            );

    if ( empty($attachments) )
    return;
    else{

	    $size = 'large';
	    foreach ( $attachments as $att_id => $attachment ) {
	        
	        $counter++;
	        
	        if($counter < 2) {
	    
		        $output = '';
		        $src = wp_get_attachment_image_src($att_id, $size, true);
		        //$link = get_attachment_link($id);
		        
		        $img_link = '<img src="' . get_bloginfo('template_url') . '/thumb.php?src=' . $src[0] . '&amp;w=' . $width . '&amp;h=' . $height . '&amp;q=100&amp;zc=1" class="thumbnail" alt="" />';
		
		        echo $img_link;  
	        
	        }
		}
	}

}

function has_attachments($id = null) {

    if(empty($id))
    {
	    global $post;
	    $id = $post->ID;
    } 

    $attachments = get_children( array(
            'post_parent' => $id,
            'numberposts' => $repeat,
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
			'order' => 'DESC', 
			'orderby' => 'menu_order date')
            );
            
    if ( empty($attachments) )  return false;
    else return true;

}

function aperturious_comment($comment, $args, $depth) {

   $GLOBALS['comment'] = $comment;

?>  

   
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
     	<div class="author-comment-badge"></div>
		<div class="comment-author vcard">
		 <?php echo get_avatar($comment,$size='64',$default='<path_to_url>' ); ?>
		
		 <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
		</div>
		<?php if ($comment->comment_approved == '0') : ?>
		 <em><?php _e('Your comment is awaiting moderation.','aperturious') ?></em>
		 <br />
		<?php endif; ?>
		
		<div class="comment-meta commentmetadata"><span class="date"><?php comment_time('l, F j, Y'); ?> at <?php comment_time('g:i a'); ?></span> <span class="edit"><?php edit_comment_link(__(''),'  ','') ?></span></div>
		
		<div class="comment-wrap"><?php comment_text() ?></div>
		
		<div class="reply">
		 <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
		
		<div class="clear"></div>
     </div>
<?php
}

function aperturious_pings($comment, $args, $depth) {

   $GLOBALS['comment'] = $comment;

?>  

   <li <?php comment_class(); ?> id="li-ping-<?php comment_ID() ?>">
     <div id="ping-<?php comment_ID(); ?>">
		
		<h3><?php comment_author_link(); ?></h3>

		<?php comment_text(); ?>
		
		<div class="clear"></div>
     </div>
<?php
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

function curl($url) {
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_HEADER, 0);
    // EDIT your domain to the next line:
    curl_setopt($ch,CURLOPT_USERAGENT,"liftux.com");
    curl_setopt($ch,CURLOPT_TIMEOUT,10);
    $data = curl_exec($ch);
    if (curl_errno($ch) !== 0 || curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {
        $data === false;
    }
    curl_close($ch);
    return $data;
}

// Get Twitter Follower count as plain text
add_option('mytwitter_followers','0','','yes');
add_option('mytwitter_api_timer',mktime() - 10000,'','yes');

function mytwitter_followers($twitter_id) {
    $twittercount = get_option('mytwitter_followers');
    if ( get_option('mytwitter_api_timer') < (mktime() - 3600) ) {
        // EDIT your Twitter user name here:

        $followers = curl("http://twitter.com/users/show.xml?screen_name=" . $twitter_id);
        try {
            $xml = new SimpleXmlElement($followers, LIBXML_NOCDATA);
            if ($xml) {
                $twittercount = (string) $xml->followers_count;
                update_option('mytwitter_followers', $twittercount);
            }
        } catch (Exception $e) { }
        update_option('mytwitter_api_timer', mktime());
    }
    if ( $twittercount != '0' ) { return $twittercount; }
    else { return false; }
}

function twitter_plus_feedburner(){

	global $up_options;

	$total = (int) mytwitter_followers($up_options->twitter) + (int) feedburner_circulation($up_options->feedburner);
	echo number_format($total);
}

function ad_insert_content($content){

	global $up_options;
	
	if(is_single()){
		
		$ai_adsused;
		$numads = 1;
	
		while($ai_adsused < $numads){
			$poses = array();
			$lastpos = -1;
			$repchar = "<p";
			if(strpos($content, "<p") === false)
				$repchar = "<br";
			
			while(strpos($content, $repchar, $lastpos+1) !== false){
				$lastpos = strpos($content, $repchar, $lastpos+1);
				$poses[] = $lastpos;
			}
			
			//cut the doc in half so the ads don't go past the end of the article.
			$half = sizeof($poses);
			$adsperpost = $ai_adsused+1;
			if(!is_single())
				$half = sizeof($poses)/2;
			
			while(sizeof($poses) > $half)
				array_pop($poses);
			
			$pickme = $poses[rand(0, sizeof($poses)-1)];
			
			$replacewith = $up_options->contentinjection_ads;
			
			$content = substr_replace($content, $replacewith.$repchar, $pickme, 2);
			$ai_adsused++;
			
		}
				
	}

	return $content;
	
}

add_filter('the_content', 'ad_insert_content');

function curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
	$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}
?>