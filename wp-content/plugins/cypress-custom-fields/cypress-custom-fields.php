<?php
/*
Plugin Name: Cypress Advanced Custom Fields: Global
Plugin URI:
Description: Saves acf custom fields json to plugin folder.
Author: KWALL
Version: 0.1
*/

//Change ACF Local JSON save location to /acf folder inside this plugin
add_filter('acf/settings/save_json', function() {
	return dirname(__FILE__) . '/acf';
});

//Include the /acf folder in the places to look for ACF Local JSON files
add_filter('acf/settings/load_json', function($paths) {
	$paths[] = dirname(__FILE__) . '/acf';
	return $paths;
});