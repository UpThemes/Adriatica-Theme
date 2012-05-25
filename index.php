<?php get_header() ?>

  <div id="main">

    <div id="maincontent">

      <div class="inner">

  		<?php if( have_posts() ): while( have_posts() ) : the_post(); ?>

  		<?php get_template_part( 'content', get_post_format() ); ?>    

  		<?php endwhile; else: ?>

  		<?php adriatica_no_posts(); ?>

  		<?php endif; ?>

      <?php adriatica_pagination(); ?>

      </div><!-- /.inner -->

    </div><!-- /#maincontent -->

	  <?php get_sidebar() ?>

  </div><!-- /#main -->

<?php get_footer() ?>