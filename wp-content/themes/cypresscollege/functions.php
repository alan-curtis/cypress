<?php
/**
 * Cypress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage KWALL

 */
/**
 * This function will add a new options page to the wp-admin sidebar
 *
 * All data saved on an options page is global. This means it is not attached
 * to any particular post or page, but is saved in the wp_options table
 *

 */
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
    'menu_title'	=> 'Header Settings',
    'parent_slug'	=> 'theme-general-settings',
  ));

  /* As Mobile Design is not provided yet
  acf_add_options_sub_page(array(
    'page_title' 	=> 'Mobile Menu Settings',
    'menu_title'	=> 'Mobile Menu Settings',
    'parent_slug'	=> 'theme-general-settings',
  ));
  */

  acf_add_options_sub_page(array(
    'page_title' 	=> 'Theme Footer Settings',
    'menu_title'	=> 'Footer Settings',
    'parent_slug'	=> 'theme-general-settings',
  ));
}
/**
 * cypress_custom includes
 *
 * The $cypress_custom_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 */

$cypress_custom_includes = [
  '/functions/setup.php',             // Theme setup
  '/functions/breadcrumbs.php',       // Breadcrumb
  '/functions/navwalker.php',         // Main navigation setup
  '/functions/menus.php',             // Custom Menus setup
  '/functions/scripts.php',           // Theme scripts init
  '/functions/sidebar.php',           // Custom Sidebar
  '/functions/ajax.php',              // Ajax
  '/functions/shortcodes.php',        // Shortcode
];
foreach ($cypress_custom_includes as $filename) {
  require_once get_template_directory() . $filename;
}

require( __DIR__ . '/functions/cypress-custom-post-types.php');
require( __DIR__ . '/functions/cypress-custom-post-type-taxonomies.php');