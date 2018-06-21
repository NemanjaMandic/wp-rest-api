<?php

/*
Plugin Name: MyPlugin
Description: This is my demo plugin
Version: 1.0.3
Author: Me 
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: ddadsa
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

//exit if file is called directly
if( ! defined( 'ABSPATH' ) ){
	exit;
}

//if admin area
if( is_admin() ){
	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
}

?>

<?php

function myplugin_register_settings(){

	register_setting(
		'myplugin_options',
		'myplugin_options',
		'myplugin_callback_validate_options'
	);

	add_settings_section(
		'myplugin_section_login',
		'Customize Login Page',
		'myplugin_callback_section_login',
		'myplugin'
	);

	add_settings_section(
		'myplugin_section_admin',
		'Customize Admin Area',
		'myplugin_callback_section_admin',
		'myplugin'
	);
}

add_action( 'admin_init', 'myplugin_register_settings' );

function myplugin_callback_validate_options($input){
	return $input;
}


function myplugin_callback_section_login(){
	echo '<p>These settings enable you to customize the WP Login screen.</p>';
}

function myplugin_callback_section_admin(){
	echo '<p>These settings enable you to customize the WP Admin Area</p>';
}





