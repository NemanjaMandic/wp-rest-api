<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_home-page',
		'title' => 'Home Page',
		'show_in_rest' => true,
		'fields' => array (
			array (
				'key' => 'field_5b1fbc4316445',
				'label' => 'Header Section',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5b1a7c6ffa84f',
				'label' => 'Home Page Header Text',
				'name' => 'home_page_header_text',
				'type' => 'text',
				'instructions' => 'Write the header text for the home page',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b1a7d37fa850',
				'label' => 'Home Page Header Description',
				'name' => 'home_page_header_description',
				'type' => 'textarea',
				'instructions' => 'Write the header description',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_5b1a7eb2fa851',
				'label' => 'Home Page Header Image',
				'name' => 'home_page_header_image',
				'type' => 'image',
				'instructions' => 'Upload your image',
				'required' => 1,
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5b1a8b50d4ef1',
				'label' => 'Home Page Button Links',
				'name' => 'home_page_button_links',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5b1a8baad4ef2',
						'label' => 'Button URL',
						'name' => 'button_url',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5b1a8c41d4ef3',
						'label' => 'Button Text',
						'name' => 'button_text',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Button',
			),
			array (
				'key' => 'field_5b1a97b3fb24e',
				'label' => 'Home Page Gallery',
				'name' => 'home_page_gallery',
				'type' => 'photo_gallery',
				'instructions' => 'Add Photo Gallery',
			),
			array (
				'key' => 'field_5b1e82f59a5dc',
				'label' => 'Page URL',
				'name' => 'page_url',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5b1fc35c16446',
				'label' => 'Youtube',
				'name' => '',
				'type' => 'tab',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '6',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_menu',
		'title' => 'Menu',
		'show_in_rest' => true,
		'fields' => array (
			array (
				'key' => 'field_5b19395f86dda',
				'label' => 'Sections',
				'name' => 'menu_sections',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5b193a80b2f88',
						'label' => 'Section Title',
						'name' => 'section_title',
						'type' => 'text',
						'column_width' => 20,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5b193ae3b2f89',
						'label' => 'Section Items',
						'name' => 'section_items',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_5b193b73b2f8a',
								'label' => 'Dish Name',
								'name' => 'dish_name',
								'type' => 'text',
								'column_width' => 20,
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_5b193bc3b2f8b',
								'label' => 'Dish Description',
								'name' => 'dish_description',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_5b193c09b2f8c',
								'label' => 'Dish Price',
								'name' => 'dish_price',
								'type' => 'number',
								'column_width' => 20,
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '$',
								'append' => '',
								'min' => '',
								'max' => '',
								'step' => '',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Dishes',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Section',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '6',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_movies',
		'title' => 'Movies',
		'show_in_rest' => true,
		'fields' => array (
			array (
				'key' => 'field_5b1e25b939b59',
				'label' => 'Movie Title',
				'name' => 'movie_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b1e25df39b5a',
				'label' => 'Movie Description',
				'name' => 'movie_description',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5b1e263939b5b',
				'label' => 'Movie Image',
				'name' => 'movie_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5b1e8a6ff2d72',
				'label' => 'Is Available',
				'name' => 'is_available',
				'type' => 'true_false',
				'message' => 'Is Movie Available',
				'default_value' => 1,
			),
			array (
				'key' => 'field_5b1fa8a13aebb',
				'label' => 'Cost',
				'name' => 'cost',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5b1e8a6ff2d72',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'movie',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}


function cptui_register_my_cpts() {

	/**
	 * Post Type: Movies.
	 */

	$labels = array(
		"name" => __( "Movies", "etabwebsite" ),
		"singular_name" => __( "Movie", "etabwebsite" ),
		"add_new" => __( "Add Movie", "etabwebsite" ),
	);

	$args = array(
		"label" => __( "Movies", "etabwebsite" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "movie", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-video-alt",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "movie", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_cpts_movie() {

	/**
	 * Post Type: Movies.
	 */

	$labels = array(
		"name" => __( "Movies", "etabwebsite" ),
		"singular_name" => __( "Movie", "etabwebsite" ),
		"add_new" => __( "Add Movie", "etabwebsite" ),
	);

	$args = array(
		"label" => __( "Movies", "etabwebsite" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "movie", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-video-alt",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "movie", $args );
}

add_action( 'init', 'cptui_register_my_cpts_movie' );

