<?php
require_once('options/options.php');     // UpThemes Framework
require_once('inc/theme-options.php');   // Theme options
require_once('inc/custom-header.php');   // Custom header

function adriatica_theme_setup() {

  add_theme_support( 'nav-menus' );

	load_theme_textdomain( 'adriatica', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
  if( function_exists('register_nav_menu') )
  	register_nav_menu( 'main_menu', __( 'Main Menu','adriatica' ) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'video', 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	// Add support for custom backgrounds
	if ( function_exists( 'wp_get_theme' ) ) {
	  add_theme_support('custom-background');
	} else {
  	add_custom_background();
  }

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	add_image_size('featured-image',880,380,true);

}

add_action( 'after_setup_theme', 'adriatica_theme_setup' );

function adriatica_widgets_init(){

  register_sidebar( array(
  		'name'          => __('Sidebar'),
  		'id'            => 'sidebar',
  		'before_widget' => '<li id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</li>',
  		'before_title'  => '<h4 class="widgettitle">',
  		'after_title'   => '</h4>' ));
  
  register_sidebar( array(
  		'name'          => __('Footer 1'),
  		'id'            => 'footer-1',
  		'before_widget' => '<li id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</li>',
  		'before_title'  => '<h4 class="widgettitle">',
  		'after_title'   => '</h4>' ));
  
  register_sidebar( array(
  		'name'          => __('Footer 2'),
  		'id'            => 'footer-2',
  		'before_widget' => '<li id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</li>',
  		'before_title'  => '<h4 class="widgettitle">',
  		'after_title'   => '</h4>' ));
  
  register_sidebar( array(
  		'name'          => __('Footer 3'),
  		'id'            => 'footer-3',
  		'before_widget' => '<li id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</li>',
  		'before_title'  => '<h4 class="widgettitle">',
  		'after_title'   => '</h4>' ));

}

add_action('widgets_init','adriatica_widgets_init');

/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function adriatica_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'adriatica_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function adriatica_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'adriatica' ) . '</a>';
}
add_filter( 'the_content_more_link', 'adriatica_continue_reading_link' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and adriatica_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function adriatica_auto_excerpt_more( $more ) {
	return ' &hellip;' . adriatica_continue_reading_link();
}
add_filter( 'excerpt_more', 'adriatica_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function adriatica_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= adriatica_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'adriatica_custom_excerpt_more' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function adriatica_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'adriatica_page_menu_args' );

function adriatica_enqueue_scripts(){

  wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/scripts/jquery.fitvids.js', array('jquery') );
  wp_enqueue_script( 'init', get_template_directory_uri() . '/scripts/init.js', array('jquery','fitvids') );

}

add_action('wp_enqueue_scripts','adriatica_enqueue_scripts');

function adriatica_set_theme($body_class){
	
  $up_options = upfw_get_options();
	
	if( isset($up_options->theme) && $up_options->theme ){

	  $body_class[] = "colors_" . esc_attr($up_options->theme);

	}
	
	return $body_class;
		
}

add_filter('body_class','adriatica_set_theme');

function adriatica_set_layout($body_class){
	
  $up_options = upfw_get_options();
	
	if( isset($up_options->layout) && $up_options->layout ){

	  $body_class[] = "layout_" . esc_attr($up_options->layout);

	}
	
	return $body_class;

}

add_filter('body_class','adriatica_set_layout');

function theme_footer() {

  $up_options = upfw_get_options();
	
  echo $up_options->footertext;
	
}

function adriatica_pagination( $type = 'plain', $endsize = 1, $midsize = 1 ) {

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

    echo paginate_links( $pagination );


  endif;

  echo '  </div>'."\n";
}

function adriatica_meta($author=true,$date=true,$category=true,$comments=true,$tags=true){
	
global $post,$up_options;

$metacount = 0;

if($author)		$metacount++;
if($date)		  $metacount++;
if($category)	$metacount++;
if($comments)	$metacount++;
if($tags)		  $metacount++;

	if( is_home() || is_front_page() || is_archive() || is_search() ): ?>
	
			<ul class="meta grid_<?php echo $metacount; ?>">
				<?php if($author) {?><li class="author"><i class="icon-user"></i> <?php the_author_link(); ?></li><?php } ?>
				<?php if($date) {?><li class="date"><i class="icon-calendar"></i> <a href="<?php the_permalink(); ?>"><?php the_time('M j, Y'); ?></a></li><?php } ?>
				<?php if($category) {?><li class="category"><i class="icon-book-open"></i> <?php the_category(', '); ?></li><?php } ?>
				<?php if($comments) {?><li class="comments"><i class="icon-comment"></i> <?php comments_popup_link(__('0 comments','adriatica'), __('1 comment','adriatica'), __('% comments')); ?></li><?php } ?>
				<?php if($tags) {?><?php if (function_exists('the_tags')) { echo ' '; the_tags('<li class="tags"><i class="icon-tag"></i> ', ', ', '</li>'); } ?><?php } ?>
			</ul>
  
<?php
	endif;

	if( is_singular() ): ?>
      <ul class="meta grid_<?php echo $metacount; ?>">
        <?php if($author) {?><li class="author"><i class="icon-user"></i> <?php the_author_link(); ?></li><?php } ?>
        <?php if($date) {?><li class="date"><i class="icon-calendar"></i> <a href="<?php the_permalink(); ?>"><?php the_time('M j, Y'); ?></a></li><?php } ?>
        <?php if($category) {?><li class="category"><i class="icon-book-open"></i> <?php the_category(', '); ?></li><?php } ?>
        <?php if($comments) {?><li class="comments"><i class="icon-comment"></i> <?php comments_popup_link(__('0 comments','adriatica'), __('1 comment','adriatica'), __('% comments')); ?></li><?php } ?>
        <?php if($tags) {?><?php if (function_exists('the_tags')) { echo ' '; the_tags('<li class="tags"><i class="icon-tag"></i> ', ', ', '</li>'); } ?><?php } ?>
      </ul>
<?php
  endif;
}

function adriatica_custom_css(){
  $up_options = upfw_get_options();
  
  if($up_options->linkcolor || $up_options->hovercolor || $up_options->activecolor):
  $custom_css = '<style type="text/css">';

  	if($up_options->linkcolor)
  		$custom_css .= "a{ color: ".$up_options->linkcolor.";}";
  
  	if($up_options->hovercolor)
  		$custom_css .= "a:hover{ color: ".$up_options->hovercolor.";}";
  
  	if($up_options->activecolor)
  		$custom_css .= "a:active{ color: ".$up_options->activecolor.";}";
  
    $custom_css .= "</style>";

	  echo $custom_css;

  endif;
}

add_action('wp_print_styles', 'adriatica_custom_css');

function adriatica_no_posts(){
	
	global $wp_query, $post;

?>
	
  <h1><?php _e('Not Found','adriatica'); ?></h1>
  <p><?php _e('Sorry, but you are looking for something that isn\'t here.','adriatica'); ?></p>
  <?php get_template_part("searchform"); ?>

<?php
}

if ( ! function_exists( 'adriatica_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own adriatica_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Adriatica 1.0
 */
function adriatica_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'adriatica' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'adriatica' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'adriatica' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'adriatica' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'adriatica' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'adriatica' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'adriatica' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for adriatica_comment()

?>