<?php

/*
Plugin Name: Custom Write Panel
Plugin URI: http://wefunction.com/2008/10/tutorial-create-custom-write-panels-in-wordpress
Description: Allows custom fields to be added to the WordPress Post Page
Version: 1.0
Author: Spencer
Author URI: http://wefunction.com
/* ----------------------------------------------*/

$new_meta_boxes =
  array(
  "itemtitle" => array(
  "name" => "itemtitle",
  "std" => "",
  "title" => "Title of Item Being Reviewed",
  "description" => "Leave blank if you don't want this to appear.",
  "type" => "input",
  "size" => 25),
 
  "rating" => array(
  "name" => "rating",
  "std" => "",
  "title" => "Rating (out of 10)",
  "description" => "Go ahead and enter a rating as a number between 1 and 10.",
  "type" => "input",
  "size" => 3),
  
  "ratingcontent" => array(
  "name" => "ratingcontent",
  "std" => "",
  "title" => "Review Details",
  "description" => "Add any relevant information on this item here, including links to purchase the item.",
  "type" => "textarea")
);

function new_meta_boxes() {
  global $post, $new_meta_boxes;
  
  foreach($new_meta_boxes as $meta_box) {
    $meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
    
    if($meta_box_value == "")
      $meta_box_value = $meta_box['std'];

   	echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

    echo'<label style="font-weight: bold; display: block; padding: 5px 0 2px 2px" for="'.$meta_box['name'].'">'.$meta_box['title'].'</label>';
    
    if($meta_box['type']=="textarea") {
    	echo'<textarea name="'.$meta_box['name'].'" cols="45" rows="6" />'.$meta_box_value.'</textarea><br />';
    } else {
    	echo'<input type="text" name="'.$meta_box['name'].'" value="'.$meta_box_value.'" size="'.$meta_box['size'].'" /><br />';
    }
    
    
    echo'<p><label for="'.$meta_box['name'].'">'.$meta_box['description'].'</label></p>';
  }
}

function create_meta_box() {
  global $theme_name;
  if ( function_exists('add_meta_box') ) {
    add_meta_box( 'new-meta-boxes', 'Rating/Review Section', 'new_meta_boxes', 'post', 'normal', 'high' );
  }
}

function save_postdata( $post_id ) {
  global $post, $new_meta_boxes;
  
  foreach($new_meta_boxes as $meta_box) {
  // Verify
  if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }
  
  if ( 'page' == $_POST['post_type'] ) {
  if ( !current_user_can( 'edit_page', $post_id ))
    return $post_id;
  } else {
  if ( !current_user_can( 'edit_post', $post_id ))
    return $post_id;
  }
  
  $data = $_POST[$meta_box['name']];
  
  if(get_post_meta($post_id, $meta_box['name']) == "")
    add_post_meta($post_id, $meta_box['name'], $data, true);
  elseif($data != get_post_meta($post_id, $meta_box['name'], true))
    update_post_meta($post_id, $meta_box['name'], $data);
  elseif($data == "")
    delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
  }
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

?>
