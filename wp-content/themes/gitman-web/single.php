<?php

get_header(); ?>

<div id="primary" class="content-area">
	
	<main id="main" class="site-main">
		
		<?php 
			while( have_posts() ) : the_post();

				$previous_post = get_previous_post();
				$next_post = get_next_post();

				echo get_permalink($previous_post->ID);
				echo "------------||||||-------------";
				echo get_permalink($next_post->ID);
                
				var_dump($next_page);

				get_template_part( 'template-parts/content', get_post_type() );

				if( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation();

			endwhile;
		?>

	</main>
</div>

<?php
get_footer();