<?php
get_header();
?>

<?php 
 $home_page_header_text = get_field('home_page_header_text'); 
 $home_page_header_desc = get_field('home_page_header_description');
 $home_page_header_img = get_field('home_page_header_image');

 //var_dump($home_page_header_img);
?>


<h1><?php echo $home_page_header_text; ?></h1>
<p><?php echo $home_page_header_desc; ?></p>

<img src="<?php echo $home_page_header_img['url']; ?>" title="<?php echo $home_page_header_img['title']; ?>">

<div>
	
  <h1>Repeater Fields</h1>

<?php

// check if the repeater field has rows of data
if( have_rows('home_page_button_links') ):

 	// loop through the rows of data
    while ( have_rows('home_page_button_links') ) : the_row(); 

        // display a sub field value
        $button_url = get_sub_field('button_url');
        $button_txt = get_sub_field('button_text'); ?>

        <a href="<?php echo $button_url; ?>" target="_blank"><?php echo $button_txt; ?></a>
        
   <?php endwhile;

else :

    echo "Nema nista";

endif;

?>
</div>

<div>
	<h1>Gallery Fields</h1>
	<?php
    //Get the images ids from the post_metadata
    $images = acf_photo_gallery('home_page_gallery', $post->ID);
    var_dump($images);
    //Check if return array has anything in it
    if( count($images) ):
        //Cool, we got some data so now let's loop over it
        foreach($images as $image):
            $id = $image['id']; // The attachment id of the media
            $title = $image['title']; //The title
            $caption= $image['caption']; //The caption
            $full_image_url= $image['full_image_url']; //Full size image url
            $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
            $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
            $url= $image['url']; //Goto any link when clicked
            $target= $image['target']; //Open normal or new tab
            $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
            $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
?>
<div class="col-xs-6 col-md-3">
    <div class="thumbnail">
        <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
            <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
        <?php if( !empty($url) ){ ?></a><?php } ?>
        <?php if( ! empty($caption)) { ?>
              <h3><?php echo $caption; ?></h3>
        <?php } ?>
    </div>
</div>
<?php endforeach; endif; ?>
</div>  
    
<?php if(have_rows('menu_sections')): ?>

	<div class="menu-sections">
   
	<?php while(have_rows('menu_sections')): the_row(); ?>

		<div class="menu-section">

			<h3><?php the_sub_field('section_title'); ?></h3>

			<?php if(have_rows('section_items')): ?>

				<table class="section_items">

					<?php while(have_rows('section_items')): the_row();
                        
                        $dish_name = get_sub_field('dish_name');
                        $dish_description = get_sub_field('dish_description');
                        $dish_price = get_sub_field('dish_price');
					 ?>
                     <tr>
                     	<th>Dish Name</th>
                     	<th>Dish Description</th>
                     	<th>Dish Price</th>
                     </tr>
                     <tr>
                     	<td><?php echo $dish_name; ?></td>
                     	<td><?php echo $dish_description; ?></td>
                     	<td><?php echo $dish_price; ?></td>
                     </tr>
					
				

					<?php endwhile; ?>

					</table>

				<?php endif; ?>

			</div>

		<?php endwhile; ?>

	</div>

<?php endif; ?>


<h1>Movies</h1>


<?php 
$args = array( 
	'post_type' => 'movie', 
	'posts_per_page' => 10 );

$loop = new WP_Query( $args );
?>


<?php


while ( $loop->have_posts() ) : $loop->the_post(); ?>

 <h3><?php the_field('movie_title'); ?></h3>
 
 <?php if(get_field('is_available')): ?>
 	<span>Available </span>
 	<div>
 		<p><?php the_field('cost'); ?></p>
 	</div>
 	<?php else: ?>
 		<span>Not Available</span>
 	<?php endif; ?>

  <p><?php the_field('movie_description'); ?></p>
 
 <?php $movie_img = get_field('movie_image'); ?>

 
  <img id="book" src="<?php echo $movie_img['sizes']['medium'] ?>" style="position: relative; left: 10px;"/>
<?php endwhile; ?>

<div id="clickme">
  Click here
</div>

<?php wp_reset_query(); ?>


<a href="<?php the_field('page_url'); ?>">Pejdz URL</a>



<?php
get_footer();
?>















