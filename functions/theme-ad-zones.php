<?php

// Create Header Ads
function ads_below_header(){
  
	global $up_options;
	 ?>

	<?php if($up_options->below_header_ads){ ?>
  
  <div id="ads_below_header">
    <div class="adblock">
      <?php echo $up_options->below_header_ads; ?>
      <div class="clear"></div>
    </div>
  </div>
  
  <?php
  }

}

// Create Internal Ads
function top_content_ads(){
  
	global $up_options;
	 ?>

	<?php if($up_options->top_content_ads){ ?>
  
  <div id="top_content_ads">
    <div class="adblock">
      <?php echo $up_options->top_content_ads; ?>
      <div class="clear"></div>
    </div>
  </div>
  
  <?php
  }

}

// Create Internal Ads
function bottom_content_ads(){
  
	global $up_options;
	 ?>

	<?php if($up_options->bottom_content_ads){ ?>
  
  <div id="bottom_content_ads">
    <div class="adblock">
      <?php echo $up_options->bottom_content_ads; ?>
      <div class="clear"></div>
    </div>
  </div>
  
  <?php
  }

}

// Create Sidebar Ads
function top_sidebar_ads(){
  
	global $up_options;
	 ?>

	<?php if($up_options->top_sidebar_ads){ ?>
  <li>
	  <div id="top_sidebar_ads">
	    <div class="adblock">
	      <?php echo $up_options->top_sidebar_ads; ?>
	      <div class="clear"></div>
	    </div>
	  </div>
  </li>
  <?php
  }

}
// Create Sidebar Ads
function share_box_ad(){
  
	global $up_options;
	
	
	if($up_options->share_box_ads){
		echo $up_options->share_box_ads;
	}

}

// Create Internal Ads
function bottom_sidebar_ads(){
  
	global $up_options;
	 ?>

	<?php if($up_options->bottom_sidebar_ads){ ?>
  <li>
	  <div id="bottom_sidebar_ads">
	    <div class="adblock">
	      <?php echo $up_options->bottom_sidebar_ads; ?>
	      <div class="clear"></div>
	    </div>
	  </div>
  </li>
  <?php
  }

}

// Create Footer Ads
function ads_above_footer(){
  
	global $up_options;
	 ?>
  
	<?php if($up_options->above_footer_ads){ ?>

    <div id="ads_above_footer">
      <div class="adblock">
        <?php echo $up_options->above_footer_ads; ?>
      <div class="clear"></div>
      </div>
    </div>
    
	<?php
	}
	
}

?>