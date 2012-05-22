<?php get_header() ?>    

  <div id="main">

  	<div id="maincontent">

      <div class="inner">

			<?php if( have_posts() ): while( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'content', get_post_format() ); ?>

      <?php comments_template(); ?>

      <?php endwhile; else : ?>

      <?php no_posts(); ?>

      <?php endif; ?>

      </div><!-- /.inner -->

    </div><!-- /#maincontent -->

    <?php get_sidebar() ?>

  </div><!-- /#main -->

<?php get_footer() ?>