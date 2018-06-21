<?php

get_header(); ?>

<div id="primary" class="content-area">
	
	<main id="main" class="site-main">
		
		<?php 
			while( have_posts() ) : the_post(); ?>

				<div class="wrap">
					
					<div id="primary" class="content-area">
						
						<main id="main" class="site-main">
							<?php 
							get_template_part( 'template-parts/content', get_post_type() );
							?>
						</main>
						
					</div>

				</div>
				<nav class="navigation post-navigation load-previous" role="navigation">
					<span class="nav-subtitle">Previous Post</span>
					<div class="nav-links">
						<div class="nav-previous">
							
							<?php $previous_post = get_previous_post(); ?>

							<a href="<?php echo get_permalink($previous_post->ID); ?>" data-id="<?php echo $previous_post->ID; ?>">
								<?php echo $previous_post->post_title; ?>
							</a>

							<div class="ajax-loader">
								<img src="<?php echo get_theme_file_uri('assets/images/spinner.svg'); ?>" />
							</div>

						</div>
					</div>
				</nav>

				<?php
				// $previous_post = get_previous_post();
				// $next_post = get_next_post();

				// echo get_permalink($previous_post->ID);
				// echo "------------||||||-------------";
				// echo get_permalink($next_post->ID);
                
				// var_dump($next_page);

				

				// if( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

				// the_post_navigation();

			endwhile;
		?>

	</main>
</div>

<?php
get_footer();