<?php get_header() ?>    

  <div id="main">

  	<div id="content">

      <div class="inner">

			<?php if( have_posts() ): while( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'content', 'page' ); ?>

      <?php comments_template(); ?>

      <?php endwhile; else : ?>

      <?php adriatica_no_posts(); ?>

      <?php endif; ?>

      </div><!-- /.inner -->

    </div><!-- /#content -->

    <?php get_sidebar() ?>

  </div><!-- /#main -->

<?php get_footer() ?>