<?php

global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }
	else { $$value['id'] = get_settings( $value['id'] ); }
} 

$pop_posts = 5;
$now = gmdate("Y-m-d H:i:s",time());
$lastweek = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m"),date("d")-7,date("Y")));
$popularposts = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastweek' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT ".$pop_posts;
$posts = $wpdb->get_results($popularposts);
$popular = '';

$popthisweek_array = array();

if($posts){
	foreach($posts as $post){
		$post_title = stripslashes($post->post_title);
		$guid = get_permalink($post->ID);
		$popthisweek_array[]=$post->ID;
?>
		<li>
            <a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>">
				<?php //get_alt_thumbnail($post->ID,32,32); ?>
				<img src="<?php bloginfo('template_url'); ?>/images/favicon-<?php echo $aper_theme; ?>.png" alt="<?php echo $post_title; ?>" />
	            <?php echo $post_title; ?>
	            <div class="clear"></div>
            </a>
        </li>
<?php 
	}
}
?>
