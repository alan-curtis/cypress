<?php
function cptui_register_my_cpts() {
  /**
   * Post Type: Program.
   */

  $labels = [
    'name' => _x('Programs', 'Post Type General Name', 'custom-post-type-ui'),
    'singular_name' => _x('Program', 'Post Type Singular Name', 'custom-post-type-ui'),
    'menu_name' => __('Programs', 'custom-post-type-ui'),
    'parent_item_colon' => __('Parent Program', 'custom-post-type-ui'),
    'all_items' => __('All Programs', 'custom-post-type-ui'),
    'view_item' => __('View Program', 'custom-post-type-ui'),
    'add_new_item' => __('Add New Program', 'custom-post-type-ui'),
    'add_new' => __('Add New', 'custom-post-type-ui'),
    'edit_item' => __('Edit Program', 'custom-post-type-ui'),
    'update_item' => __('Update Program', 'custom-post-type-ui'),
    'search_items' => __('Search Program', 'custom-post-type-ui'),
    'not_found' => __('Not Found', 'custom-post-type-ui'),
    'not_found_in_trash' => __('Not found in Trash', 'custom-post-type-ui'),
  ];

  $args = [
    "label" => __("Programs", "custom-post-type-ui"),
    "labels" => $labels,
    "description" => "",
    "public" => TRUE,
    "publicly_queryable" => TRUE,
    "show_ui" => TRUE,
    "show_in_rest" => TRUE,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => FALSE,
    "show_in_menu" => TRUE,
    "show_in_nav_menus" => TRUE,
    "delete_with_user" => FALSE,
    "exclude_from_search" => FALSE,
    "capability_type" => "post",
    "map_meta_cap" => TRUE,
    "hierarchical" => FALSE,
    "rewrite" => ["slug" => "programs", "with_front" => TRUE],
    "query_var" => TRUE,
    "supports" => ["title", "editor", "thumbnail", "revisions"],
    "taxonomies" => ["department"],
  ];

  register_post_type("program", $args);

  //	/**
  //	 * Post Type: Testimonials.
  //	 */
  //
  //	$labels = [
  //		"name" => __( "Testimonials", "custom-post-type-ui" ),
  //		"singular_name" => __( "Testimonial", "custom-post-type-ui" ),
  //		"menu_name" => __( "Testimonials", "custom-post-type-ui" ),
  //		"all_items" => __( "All Testimonials", "custom-post-type-ui" ),
  //		"add_new" => __( "Add New", "custom-post-type-ui" ),
  //		"add_new_item" => __( "Add New Testimonial", "custom-post-type-ui" ),
  //		"edit_item" => __( "Edit Testimonial", "custom-post-type-ui" ),
  //		"new_item" => __( "New Testimonial", "custom-post-type-ui" ),
  //		"view_item" => __( "View Testimonial", "custom-post-type-ui" ),
  //		"view_items" => __( "View Testimonials", "custom-post-type-ui" ),
  //		"search_items" => __( "Search Testimonials", "custom-post-type-ui" ),
  //		"not_found" => __( "No Testimonials found", "custom-post-type-ui" ),
  //		"not_found_in_trash" => __( "No Testimonials found in Trash", "custom-post-type-ui" ),
  //		"parent" => __( "Parent Testimonial:", "custom-post-type-ui" ),
  //		"featured_image" => __( "Featured image for this testimonial", "custom-post-type-ui" ),
  //		"set_featured_image" => __( "Set featured image for this testimonial", "custom-post-type-ui" ),
  //		"remove_featured_image" => __( "Remove featured image for this testimonial", "custom-post-type-ui" ),
  //		"use_featured_image" => __( "Use as featured image for this testimonial", "custom-post-type-ui" ),
  //		"archives" => __( "Testimonial archives", "custom-post-type-ui" ),
  //		"insert_into_item" => __( "Insert into this testimonial", "custom-post-type-ui" ),
  //		"uploaded_to_this_item" => __( "Uploaded to this testimonial", "custom-post-type-ui" ),
  //		"filter_items_list" => __( "Filter testimonials list", "custom-post-type-ui" ),
  //		"items_list_navigation" => __( "Testimonials list navigation", "custom-post-type-ui" ),
  //		"items_list" => __( "Testimonials list", "custom-post-type-ui" ),
  //		"attributes" => __( "Testimonials Attributes", "custom-post-type-ui" ),
  //		"name_admin_bar" => __( "Testimonial", "custom-post-type-ui" ),
  //		"item_published" => __( "Testimonial published", "custom-post-type-ui" ),
  //		"item_published_privately" => __( "Testimonial published privately.", "custom-post-type-ui" ),
  //		"item_reverted_to_draft" => __( "Testimonial reverted to draft", "custom-post-type-ui" ),
  //		"item_scheduled" => __( "Testimonial scheduled", "custom-post-type-ui" ),
  //		"item_updated" => __( "Testimonial updated", "custom-post-type-ui" ),
  //		"parent_item_colon" => __( "Parent Testimonial:", "custom-post-type-ui" ),
  //	];
  //
  //	$args = [
  //		"label" => __( "Testimonials", "custom-post-type-ui" ),
  //		"labels" => $labels,
  //		"description" => "",
  //		"public" => true,
  //		"publicly_queryable" => true,
  //		"show_ui" => true,
  //		"show_in_rest" => true,
  //		"rest_base" => "",
  //		"rest_controller_class" => "WP_REST_Posts_Controller",
  //		"has_archive" => false,
  //		"show_in_menu" => true,
  //		"show_in_nav_menus" => true,
  //		"delete_with_user" => false,
  //		"exclude_from_search" => false,
  //		"capability_type" => "post",
  //		"map_meta_cap" => true,
  //		"hierarchical" => false,
  //		"rewrite" => [ "slug" => "testimonial", "with_front" => true ],
  //		"query_var" => true,
  //		"supports" => [ "title", "editor", "thumbnail", "custom-fields", "author" ],
  //	];
  //
  //	register_post_type( "testimonial", $args );

  /**
   * Post Type: Persons.
   */

  $labels = [
    "name" => __("Persons", "custom-post-type-ui"),
    "singular_name" => __("Person", "custom-post-type-ui"),
    "all_items" => __("All Persons", "custom-post-type-ui"),
    "add_new" => __("Add New Person", "custom-post-type-ui"),
    "add_new_item" => __("Add New Person", "custom-post-type-ui"),
    "edit_item" => __("Edit Person", "custom-post-type-ui"),
    "new_item" => __("New Person", "custom-post-type-ui"),
    "view_item" => __("View Person", "custom-post-type-ui"),
    "view_items" => __("View Persons", "custom-post-type-ui"),
    "search_items" => __("Search Person", "custom-post-type-ui"),
    "featured_image" => __("Profile Photo", "custom-post-type-ui"),
    "set_featured_image" => __("Set Profile Photo", "custom-post-type-ui"),
    "remove_featured_image" => __("Remove Profile Photo", "custom-post-type-ui"),
    "use_featured_image" => __("Use as Profile Photo", "custom-post-type-ui"),
    "item_published" => __("Person published", "custom-post-type-ui"),
    "item_updated" => __("Person updated", "custom-post-type-ui"),
  ];

  $args = [
    "label" => __("Persons", "custom-post-type-ui"),
    "labels" => $labels,
    "description" => "",
    "public" => TRUE,
    "publicly_queryable" => TRUE,
    "show_ui" => TRUE,
    "show_in_rest" => TRUE,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => FALSE,
    "show_in_menu" => TRUE,
    "show_in_nav_menus" => TRUE,
    "delete_with_user" => FALSE,
    "exclude_from_search" => FALSE,
    "capability_type" => "post",
    "map_meta_cap" => TRUE,
    "hierarchical" => FALSE,
    "rewrite" => ["slug" => "person", "with_front" => TRUE],
    "query_var" => TRUE,
    "supports" => ["title", "editor", "thumbnail", 'revisions'],
  ];

  register_post_type("person", $args);
}

add_action('init', 'cptui_register_my_cpts');
