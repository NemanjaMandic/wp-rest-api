<?php
get_header();
?>

<?php if( have_posts() ) : 
	  while( have_posts() ) : the_post(); ?>

	  <h2><?php the_title(); ?></h2>

	  <?php the_post_thumbnail(); ?>

	  <?php the_excerpt(); ?>

	  <?php endwhile; else: ?>

	  <h2><?php _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); ?></h2>

<?php endif; ?>

<?php get_footer(); ?>