<?php

global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }
	else { $$value['id'] = get_settings( $value['id'] ); }
} 

$random_posts = 12;
$now = gmdate("Y-m-d H:i:s",time());
$last6months = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m"),date("d"),date("Y")-2));
$randomposts = "SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_date < '$now' AND post_date > '$last6months' ORDER BY rand() LIMIT ".$random_posts;
$posts = $wpdb->get_results($randomposts);
$random = '';
$count = 0;
if($posts){
	foreach($posts as $post){
		
		if($count==5)
		break;
		
		$post_title = stripslashes($post->post_title);
		$guid = get_permalink($post->ID);
		if(!has_attachments($post->ID))
		continue;
?>
		<li>
            <a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>">
				<?php //get_alt_thumbnail($post->ID,32,32);	?>
				<img src="<?php bloginfo('template_url'); ?>/images/favicon-<?php echo $aper_theme; ?>.png" alt="<?php echo $post_title; ?>" />
	            <?php echo $post_title; ?>
	            <div class="clear"></div>
            </a>
        </li>
<?php
		$count++;
	}
}
?>
