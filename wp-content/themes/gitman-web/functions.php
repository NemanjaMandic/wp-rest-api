<?php


if( ! isset( $content_width ) ){
	$content_width = 800;
}


/**
*Theme setup
*/
if ( ! function_exists('gitmansite_setup') ){

	function gitmansite_setup(){

		load_theme_textdomain( 'gitmansite', get_template_directory() . '/language');

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'post-formats', array(
           'aside', 'gallery', 'quote', 'image', 'video'
		));

		add_theme_support( 'html5', array(
			'search-form',
			'gallery',
			'caption',
		) );

        /**
        
         Register Menus
        
        Each of the menus you define can be called later using wp_nav_menu() and using the name assigned (i.e. primary) as the theme_location parameter.
        */
		register_nav_menus( array(

			'large-menu' => __( 'Large Menu', 'gitmansite' ),
			'small-menu' => __( 'Small Menu', 'gitmansite' )
		) );



	}
}

add_action( 'after_setup_theme', 'gitmansite_setup' );


/**
* Enqueue scripts and styles
*/
if( ! function_exists('gitmansite_scripts') ){
	
	function gitmansite_scripts(){

		wp_enqueue_style( 'style', get_stylesheet_uri() );

		wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css',false,'1.1','all');

		wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/src/js/script.js', array ( 'jquery' ), 1.1, true);

		wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/src/js/main.js', 1.1, true );

		if( is_singular() && comments_open() && get_option( 'thread_comments' )){
			wp_enqueue_script( 'comment-reply' );
		}

		wp_localize_script( 'script', 'magicData', array(
		    'root' => esc_url_raw( rest_url() ),
		    'nonce' => wp_create_nonce( 'wp_rest' )

		) );

	}

}

add_action( 'wp_enqueue_scripts', 'gitmansite_scripts' );



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}


add_filter( 'rest_post_collection_params', 'big_json_change_post_per_page', 10, 1 );
function big_json_change_post_per_page( $params ) {
    if ( isset( $params['per_page'] ) ) {
        $params['per_page']['maximum'] = 200;
    }
    return $params;
}









