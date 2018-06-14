<?php 
get_header(); ?>


<?php if( have_posts() ) : 

	  while( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', get_post_format() );

	  	endwhile;

	  	the_posts_navigation();

        else : ?>

        	<h2><?php __( 'Sorry, no posts matched your criteria', 'wordpress-test'); ?></h2>
 
 <?php endif; ?>



<?php
get_sidebar();
get_footer();
?>