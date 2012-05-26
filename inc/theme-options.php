<?php

  $options = array(
  "linkcolor" => array(
  	"tab" => "general",
  	"name" => "linkcolor",
  	"title" => "Default Link Color",
  	"description" => __( "Select a custom link color for the default state.", "adriatica" ),
  	"section" => "appearance",
  	"since" => "1.0",
      "id" => "appearance",
      "type" => "color",
      "default" => "#555"
  ),
  "hovercolor" => array(
  	"tab" => "general",
  	"name" => "hovercolor",
  	"title" => "Hover Link Color",
  	"description" => __( "Select a link color for the hover state.", "adriatica" ),
  	"section" => "appearance",
  	"since" => "1.0",
      "id" => "appearance",
      "type" => "color",
      "default" => "#444"
  ),
  "activecolor" => array(
  	"tab" => "general",
  	"name" => "activecolor",
  	"title" => "Active Link Color",
  	"description" => __( "Select a link color for the active state.", "adriatica" ),
  	"section" => "appearance",
  	"since" => "1.0",
      "id" => "appearance",
      "type" => "color",
      "default" => "#333"
  ),
  "theme" => array(
  	"tab" => "general",
  	"name" => "theme",
  	"title" => "Color Scheme",
  	"description" => __( "Select the color scheme you want to use.", "adriatica" ),
  	"section" => "appearance",
  	"since" => "1.0",
      "id" => "appearance",
      "type" => "radio_image",
      "default" => "default",
      "valid_options" => array(
      	"default" => array(
      		"name" => "default",
      		"image" => get_template_directory_uri() . "/images/colors/default.jpg",
      		"title" => __( "Dark", "adriatica" )
      	),
        "light" => array(
        	"name" => "light",
      		"image" => get_template_directory_uri() . "/images/colors/light.jpg",
        	"title" => __( "Light &amp; Colorful", "adriatica" )
        ),
        "bluegray" => array(
        	"name" => "bluegray",
      		"image" => get_template_directory_uri() . "/images/colors/bluegray.jpg",
        	"title" => __( "Blue &amp; Gray", "adriatica" )
        )
      )
  ),
  "layout" => array(
  	"tab" => "general",
  	"name" => "layout",
  	"title" => "Theme Layout",
  	"description" => __( "Select the layout you want to use.", "adriatica" ),
  	"section" => "appearance",
  	"since" => "1.0",
      "id" => "appearance",
      "type" => "radio_image",
      "default" => "default",
      "valid_options" => array(
      	"default" => array(
      		"name" => "default",
      		"image" => upfw_get_theme_options_directory_uri() . "images/layouts/right_sidebar.gif",
      		"title" => __( "Sidebar on the Right", "adriatica" )
      	),
        "reversed" => array(
        	"name" => "reversed",
      		"image" => upfw_get_theme_options_directory_uri() . "images/layouts/left_sidebar.gif",
        	"title" => __( "Sidebar on the Left", "adriatica" )
        ),
        "single_column" => array(
        	"name" => "single_column",
      		"image" => upfw_get_theme_options_directory_uri() . "images/layouts/no_sidebar.gif",
        	"title" => __( "No Sidebar", "adriatica" )
        )
      )
  )

);

register_theme_options($options);

$general = array(
	"name" => "general",
	"title" => __("General","adriatica"),
	'sections' => array(
    'appearance' => array(
    	'name' => 'appearance',
    	'title' => __( 'Appearance', 'adriatica' ),
    	'description' => __( 'Modify the visual appearance of the theme.','adriatica' )
    ),
    'text' => array(
    	'name' => 'text',
    	'title' => __( 'Text', 'adriatica' ),
    	'description' => __( 'Modify text parts displayed within the theme.','adriatica' )
    )
	)
);

register_theme_option_tab($general);

$options = array(

  "footertext" => array(
  	"tab" => "general",
  	"name" => "footertext",
  	"title" => "Footer Text",
  	"description" => __( "Text to be displayed in the footer.", "adriatica" ),
  	"section" => "text",
  	"since" => "1.0",
      "id" => "text",
      "type" => "textarea",
      "default" => "Copyright ".date('Y')." ".get_bloginfo('name').". All Rights Reserved."
  )

);

register_theme_options($options);