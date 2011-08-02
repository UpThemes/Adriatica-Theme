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

		array(	"name" => "Theme",
						"desc" => "Select the theme you want to use for this design.",
						"id" => "theme",
						"value" => "default",
						"type" => "select",
						"default_text" => "Default (Dark Theme)",
						"options" => array(
							"Light and Colorful" => "light",
							"Blue and Gray" => "bluegray")
						),

		array(	"name" => "Layout",
						"desc" => "Choose the layout for this theme.",
						"id" => "layout",
						"value" => "default",
						"type" => "select",
						"options" => array(
							"Default (Right Sidebar)" => "default",
							"Reversed (Left Sidebar)" => "reversed",
							"No Sidebar" => "single_column")
						),

		array(	"name" => "Show post metadata on homepage/category/archive pages?",
						"desc" => "Select yes to show post metadata on these pages.",
						"id" => "postmeta_homepage",
						"default_text" => "No",
						"default" => 1,
						"options" => array(
							"Yes" => 1
						),
						"type" => "select"),

		array(	"name" => "Show post metadata on single posts?",
						"desc" => "Select yes to show post metadata on single posts.",
						"id" => "postmeta_single",
						"default_text" => "No",
						"default" => 1,
						"options" => array(
							"Yes" => 1
						),
						"type" => "select"),
						
		array(	"name" => "Footer Text",
						"desc" => "Enter the text you'd like to have in the footer.",
						"id" => "footertext",
						"value" => "Copyright ".date('Y')." Me. All Rights Reserved.",
						"type" => "textarea"),


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