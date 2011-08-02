$j = jQuery.noConflict();

$j(document).ready(function(){
	
	if(!isFontFaceSupported()){
		$j('link[href="font/stylesheet.css"]')
	}
	
	$j('.s').each(function(){
		if($j(this).val()){
			$label = $j(this).parent('fieldset').find('label');
			$label.fadeOut('fast');
		}
	});
	$j('.search-form label').click(function(e){
					
		$j(this).parent('fieldset').find('.s').focus();

	});
	
	$j('.s').focus(function(e){
													
		$label = $j(this).parent('fieldset').find('label');
		if($j(this).val() == ""){
			$label.fadeOut('fast');
		}
		
	});
	$j('.s').blur(function(e){
												 
		$label = $j(this).parent('fieldset').find('label');
		if($j(this).val() == "")
			$label.fadeIn('fast');
		
	});
	
	$j('#nav li ul.children').parent('li').addClass('hasChildren').mouseover(function(e){
			$j(this).addClass('hasChildrenHasHover');
	});
	
	$j('#nav li ul.children').parent('li').mouseout(function(e){
			$j(this).removeClass('hasChildrenHasHover');
	});
	
	$j("#nav li").mouseover(function(e){
		$j(this).addClass('sfhover');
	});
	
	$j("#nav li").mouseout(function(e){
		$j(this).removeClass('sfhover');
	});
	
});