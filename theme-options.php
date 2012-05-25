<?php
$colors = array(
	"name" => "colors",
	"title" => __("Colors","adriatica"),
	'sections' => array(
		'text' => array(
			'name' => 'text',
			'title' => __( 'Text Colors', 'adriatica' ),
			'description' => __( 'Select the color for different text elements.','adriatica' )
		)
	)
);

register_theme_option_tab($colors);

  $options = array(
  "linkcolor" => array(
  	"tab" => "colors",
  	"name" => "linkcolor",
  	"title" => "Default Link Color",
  	"description" => __( "Select a custom link color for the default state.", "adriatica" ),
  	"section" => "text",
  	"since" => "1.0",
      "id" => "text",
      "type" => "color",
      "default" => "#555"
  ),
  "hovercolor" => array(
  	"tab" => "colors",
  	"name" => "hovercolor",
  	"title" => "Hover Link Color",
  	"description" => __( "Select a link color for the hover state.", "adriatica" ),
  	"section" => "text",
  	"since" => "1.0",
      "id" => "text",
      "type" => "color",
      "default" => "#444"
  ),
  "activecolor" => array(
  	"tab" => "colors",
  	"name" => "activecolor",
  	"title" => "Active Link Color",
  	"description" => __( "Select a link color for the active state.", "adriatica" ),
  	"section" => "text",
  	"since" => "1.0",
      "id" => "text",
      "type" => "color",
      "default" => "#333"
  ),
  "theme" => array(
  	"tab" => "colors",
  	"name" => "theme",
  	"title" => "Color Scheme",
  	"description" => __( "Select the color scheme you want to use.", "adriatica" ),
  	"section" => "text",
  	"since" => "1.0",
      "id" => "text",
      "type" => "select",
      "default" => "default",
      "valid_options" => array(
      	"default" => array(
      		"name" => "default",
      		"title" => __( "Dark", "adriatica" )
      	),
        "light" => array(
        	"name" => "light",
        	"title" => __( "Light &amp; Colorful", "adriatica" )
        ),
        "bluegray" => array(
        	"name" => "bluegray",
        	"title" => __( "Blue &amp; Gray", "adriatica" )
        )
      )
  ),
  "layout" => array(
  	"tab" => "colors",
  	"name" => "layout",
  	"title" => "Theme Layout",
  	"description" => __( "Select the layout you want to use.", "adriatica" ),
  	"section" => "text",
  	"since" => "1.0",
      "id" => "text",
      "type" => "select",
      "default" => "default",
      "valid_options" => array(
      	"default" => array(
      		"name" => "default",
      		"title" => __( "Sidebar on the Right", "adriatica" )
      	),
        "reversed" => array(
        	"name" => "reversed",
        	"title" => __( "Sidebar on the Left", "adriatica" )
        ),
        "single_column" => array(
        	"name" => "single_column",
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
    'other' => array(
    	'name' => 'other',
    	'title' => __( 'Other', 'adriatica' ),
    	'description' => __( 'Additional theme settings.','adriatica' )
    )
	)
);

register_theme_option_tab($general);

$options = array(

  "feedburner" => array(
  	"tab" => "general",
  	"name" => "feedburner",
  	"title" => "Feedburner",
  	"description" => __( "Add your username to redirect RSS feeds to Feedburner", "adriatica" ),
  	"section" => "other",
  	"since" => "1.0",
      "id" => "other",
      "type" => "text",
      "default" => ""
  ),

  "postmeta_homepage" => array(
  	"tab" => "general",
  	"name" => "postmeta_homepage",
  	"title" => "Show post metadata on homepage/category/archive pages?",
  	"description" => __( "Select yes to show post metadata on these pages.", "adriatica" ),
  	"section" => "other",
  	"since" => "1.0",
      "id" => "other",
      "type" => "select",
      "default" => 1,
      "valid_options" => array(
      	"no" => array(
      		"name" => 0,
      		"title" => __( "No", "adriatica" )
      	),
      	"yes" => array(
      		"name" => 1,
      		"title" => __( "Yes", "adriatica" )
      	)
      )
  ),
  
  "postmeta_single" => array(
  	"tab" => "general",
  	"name" => "postmeta_single",
  	"title" => "Show post metadata on single posts?",
  	"description" => __( "Select yes to show post metadata on single posts.", "adriatica" ),
  	"section" => "other",
  	"since" => "1.0",
      "id" => "other",
      "type" => "select",
      "default" => 1,
      "valid_options" => array(
      	"no" => array(
      		"name" => 0,
      		"title" => __( "No", "adriatica" )
      	),
      	"yes" => array(
      		"name" => 1,
      		"title" => __( "Yes", "adriatica" )
      	)
      )
  ),
  
  "footertext" => array(
  	"tab" => "general",
  	"name" => "footertext",
  	"title" => "Footer Text",
  	"description" => __( "Text to be displayed in the footer.", "adriatica" ),
  	"section" => "other",
  	"since" => "1.0",
      "id" => "other",
      "type" => "textarea",
      "default" => "Copyright ".date('Y')." ".get_bloginfo('name').". All Rights Reserved."
  )

);

register_theme_options($options);