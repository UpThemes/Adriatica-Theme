<?php
/*  Array Options:
   
   name (string)
   desc (string)
   id (string)
   type (string) - text, color, image, select, multiple, textarea, page, pages, category, categories
   value (string) - default value - replaced when custom value is entered - (text, color, select, textarea, page, category)
   options (array)
   attr (array) - any form field attributes
   url (string) - for image type only - defines the default image
    
*/

$options = array (

		array(	"name" => "Ads Below Header",
						"desc" => "Paste ad code into this box.",
						"id" => "below_header_ads",
						"std" => "",
						"type" => "textarea"),

		array(	"name" => "Ads Above Footer",
						"desc" => "Paste ad code into this box.",
						"id" => "above_footer_ads",
						"value" => "",
						"type" => "textarea"),

		array(	"name" => "Ads Above Content",
						"desc" => "Paste ad code into this box.",
						"id" => "top_content_ads",
						"value" => "",
						"type" => "textarea"),

		array(	"name" => "Ads Below Content",
						"desc" => "Paste ad code into this box.",
						"id" => "bottom_content_ads",
						"value" => "",
						"type" => "textarea"),

		array(	"name" => "Ads Above Sidebar",
						"desc" => "Paste ad code into this box.",
						"id" => "top_sidebar_ads",
						"value" => "",
						"type" => "textarea"),

		array(	"name" => "Ads Below Sidebar",
						"desc" => "Paste ad code into this box.",
						"id" => "bottom_sidebar_ads",
						"value" => "",
						"type" => "textarea")


);

/* ------------ Do not edit below this line ----------- */

//Check if theme options set
global $default_check;
global $default_options;

if(!$default_check):
    foreach($options as $option):
        if($option['type'] != 'image'):
            $default_options[$option['id']] = $option['value'];
        else:
            $default_options[$option['id']] = $option['url'];
        endif;
    endforeach;
    $update_option = get_option('up_themes_'.UPTHEMES_SHORT_NAME);
    if(is_array($update_option)):
        $update_option = array_merge($update_option, $default_options);
        update_option('up_themes_'.UPTHEMES_SHORT_NAME, $update_option);
    else:
        update_option('up_themes_'.UPTHEMES_SHORT_NAME, $default_options);
    endif;
endif;

render_options($options);
?>