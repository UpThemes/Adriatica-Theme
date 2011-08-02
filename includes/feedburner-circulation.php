<?php
/*
 * Plugin Name: Feedburner Circulation
 * Plugin URI: http://valendesigns.com
 * Description: Returns a database stored Feedburner circulation count in simple text format. Reduces the API calls by only executing once an hour.
 * Version: 1.0.1
 * Author: Derek Herman
 * Author URI: http://valendesigns.com
 */

/*
 * Wordpress Hooks
 */
register_activation_hook(__FILE__, 'feedburner_circulation_install');
register_deactivation_hook(__FILE__, 'feedburner_circulation_uninstall');

/**
 * Install Feedburner Circulation
 */
function feedburner_circulation_install() {
  global $wpdb;
  
  $table = $wpdb->prefix . 'feedburner';

  $sql = 
  'CREATE TABLE IF NOT EXISTS ' . $table . ' ( 
    `id` bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `feedburner_id` varchar(250) NOT NULL,
    `feedburner_circulation` bigint NOT NULL,
    `feedburner_time` datetime NOT NULL default "0000-00-00 00:00:00",
    UNIQUE key (feedburner_id)
  );';
  
  $wpdb->query($sql);
}

/**
 * Uninstall Feedburner Circulation
 */
function feedburner_circulation_uninstall() {
  global $wpdb;
  
  $table = $wpdb->prefix . 'feedburner';
  $sql = 'DROP TABLE ' . $table;
  $wpdb->query($sql);
}

/**
 * Fetch circulation count from the feedburner api & return formatted integer
 *
 * @param string $feed_id
 * @return integer
 */
function feedburner_circulation($feed_id) {
  global $wpdb;
  
  $sql = 'SELECT *
          FROM ' . $wpdb->prefix . 'feedburner
          WHERE feedburner_id = "' . $feed_id . '"';
  $feedcount = $wpdb->get_results($sql);
  $difference = (strtotime(date('Y-m-d H:i:s')) - strtotime($feedcount[0]->feedburner_time));
  $api_time_seconds = 3600;
  
  if(!$feedcount || $difference >= $api_time_seconds) {
    $api_page = 'https://feedburner.google.com/api/awareness/1.0/GetFeedData?uri=' . $feed_id;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_URL, $api_page);
		$xml = curl_exec($ch);
		$info = curl_getinfo($ch);
		
		curl_close($ch);
    
    $http_code = $info['http_code'];
    
    if ($http_code == 200) { 
    
      $feedburner = new SimpleXMLElement($xml);
      $circulation = $feedburner->feed->entry['circulation'];
      
      if (!$feedcount) 
      {
        $sql = 'INSERT into ' . $wpdb->prefix . 'feedburner
              (feedburner_id, feedburner_circulation, feedburner_time)
              VALUES("' . $feed_id . '", ' . $circulation . ', "' . date('Y-m-d H:i:s') . '")';
      } 
      else 
      {
        $sql = 'UPDATE ' . $wpdb->prefix . 'feedburner 
                SET feedburner_circulation = ' . $circulation . ',
                feedburner_time = "' . date('Y-m-d H:i:s') . '" 
                WHERE feedburner_id = "' . $feed_id . '"';
      }
      
      $query = $wpdb->query($sql);
      
    } else {
    
      if ($feedcount) {
        $circulation = $feedcount[0]->feedburner_circulation;
      } else {
        $circulation = 0;
      }
      
    }
    
  } else {
    $circulation = $feedcount[0]->feedburner_circulation;
  }
  return $circulation;
}

/**
 * Echo the circulation count
 *
 * @param string $feed_id
 * @return integer
 */
function feedburner_circulation_text($feed_id) {
  
  $feedcount = feedburner_circulation($feed_id);
  echo $feedcount;
  
}