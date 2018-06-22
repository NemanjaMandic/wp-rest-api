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
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
}


function myplugin_options_default(){

	return array(
		'custom_url' => 'https://wordpress.org/',
		'custom_title' => 'Powered By WordPress',
		'custom_style' => 'disable',
		'custom_message' => '<p class="custom-message">My Custom Message</p>',
		'custom_footer' => 'Special message for users',
		'custom_toolbar' => false,
		'custom_scheme' => 'default',
	);
}
?>




