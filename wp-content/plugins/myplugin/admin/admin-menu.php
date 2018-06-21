<?php // MyPlugin - Admin Menu

//exit if file is called directly
if( ! defined( 'ABSPATH' ) ){
	exit;
}

function myplugin_add_sublevel_menu(){

	add_submenu_page(
		'options-general.php',
		'MyPlugin Settings',
		'MyPlugin',
		'manage_options',
		'myplugin',
		'myplugin_display_settings_page'
	);
}

add_action( 'admin_menu', 'myplugin_add_sublevel_menu' );