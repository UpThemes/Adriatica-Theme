<form method="get" class="search-form" action="<?php bloginfo('url'); ?>/">
  <fieldset>
    <input type="text" name="s" class="s" placeholder="<?php _e("Search","adriatica"); ?>" value="<?php the_search_query(); ?>"/>
		<button type="submit" name="submit-search" class="submit-image"><?php _e("Submit","adriatica"); ?></button>
	</fieldset>
</form>