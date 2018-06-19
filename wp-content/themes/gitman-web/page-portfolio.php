<?php
get_header();
?>

<?php if( current_user_can( 'administrator' ) ) : ?>
<form class="admin-quick-add">
	<h3>Quick Add Post</h3>
	<input id="title" type="text" name="title" placeholder="Title"><br/><br/>
	<textarea id="content" name="content" placeholder="Content"></textarea><br/><br/>
	<button id="quick-add-button">Create Post</button>
</form>
<?php endif; ?>

<?php echo get_page_template_slug(); ?>

<?php if(have_posts()) :
	while(have_posts()) : the_post(); ?>

		<article class="post page">
			
			<div class="column-container">
				
				<div class="title-column">
					<h2><?php the_title(); ?></h2>
				</div>

				<div class="text-column">
					<?php the_content(); 

						the_post_thumbnail();
			        ?>
					

					<div id="portfolio-posts-container"></div>

					<button id="portfolio-posts-btn">Load portfolio related blog post</button>

				</div>

			</div>
		</article>

<?php endwhile;

	the_posts_navigation();

endif;
?>
<?php get_footer(); ?>