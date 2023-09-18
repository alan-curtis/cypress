<?php
function cptui_register_my_taxes() {

  /**
   * Taxonomy: Testimonial Categories.
   */

  $labels = [
    "name" => __("Testimonial Categories", "custom-post-type-ui"),
    "singular_name" => __("Testimonial Category", "custom-post-type-ui"),
  ];

  $args = [
    "label" => __("Testimonial Categories", "custom-post-type-ui"),
    "labels" => $labels,
    "public" => TRUE,
    "publicly_queryable" => TRUE,
    "hierarchical" => FALSE,
    "show_ui" => TRUE,
    "show_in_menu" => TRUE,
    "show_in_nav_menus" => TRUE,
    "query_var" => TRUE,
    "rewrite" => ['slug' => 'testimonial_category', 'with_front' => TRUE,],
    "show_admin_column" => FALSE,
    "show_in_rest" => TRUE,
    "rest_base" => "testimonial_category",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => FALSE,
  ];
  register_taxonomy("testimonial_category", ["testimonials"], $args);

  /**
   * Taxonomy: Person Categories.
   */

  $labels = [
    "name" => __("Person Categories", "custom-post-type-ui"),
    "singular_name" => __("Person Category", "custom-post-type-ui"),
  ];

  $args = [
    "label" => __("Person Categories", "custom-post-type-ui"),
    "labels" => $labels,
    "public" => TRUE,
    "publicly_queryable" => TRUE,
    "hierarchical" => FALSE,
    "show_ui" => TRUE,
    "show_in_menu" => TRUE,
    "show_in_nav_menus" => TRUE,
    "query_var" => TRUE,
    "rewrite" => ['slug' => 'person_category', 'with_front' => TRUE,],
    "show_admin_column" => FALSE,
    "show_in_rest" => TRUE,
    "rest_base" => "person_category",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => FALSE,
  ];
  register_taxonomy("person_category", ["person"], $args);

  /**
   * Taxonomy: Departments.
   */

  $labels = [
    'name' => __( 'Departments', 'custom-post-type-ui' ),
    'singular_name' => __( 'Department', 'custom-post-type-ui' ),
    'search_items' =>  __( 'Search Departments' ),
    'all_items' => __( 'All Departments' ),
    'parent_item' => __( 'Parent Department' ),
    'parent_item_colon' => __( 'Parent Department:' ),
    'edit_item' => __( 'Edit Department' ),
    'view_item' => __('View Department', 'custom-post-type-ui'),
    'update_item' => __( 'Update Department' ),
    'add_new_item' => __( 'Add New Department' ),
    'new_item_name' => __( 'New Location Name' ),
    'menu_name' => __( 'Departments' ),
  ];

  $args = [
    "label" => __("Departments", "custom-post-type-ui"),
    "labels" => $labels,
    "public" => TRUE,
    "publicly_queryable" => TRUE,
    "hierarchical" => FALSE,
    "show_ui" => TRUE,
    "show_in_menu" => TRUE,
    "show_in_nav_menus" => TRUE,
    "query_var" => TRUE,
    "rewrite" => [
      'slug' => 'department',
      'with_front' => TRUE,
      'hierarchical' => TRUE,
    ],
    "show_admin_column" => FALSE,
    "show_in_rest" => TRUE,
    "rest_base" => "department",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => FALSE,
  ];
  register_taxonomy("department", ["program", 'person', 'post'], $args);

  
	/**
	 * Taxonomy: Pathways.
	 */

	$labels = [
		"name" => __( "Pathways", "custom-post-type-ui" ),
		"singular_name" => __( "Pathway", "custom-post-type-ui" ),
		"menu_name" => __( "Pathways", "custom-post-type-ui" ),
		"all_items" => __( "All Pathways", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Pathway", "custom-post-type-ui" ),
		"view_item" => __( "View Pathway", "custom-post-type-ui" ),
		"update_item" => __( "Update Pathway", "custom-post-type-ui" ),
		"add_new_item" => __( "Add New Pathway", "custom-post-type-ui" ),
		"new_item_name" => __( "New Pathway", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Pathway", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Pathway:", "custom-post-type-ui" ),
		"search_items" => __( "Search Pathways", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Pathways", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Pathways with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Pathways", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Pathways", "custom-post-type-ui" ),
		"not_found" => __( "No pathways found", "custom-post-type-ui" ),
		"no_terms" => __( "No pathways", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to pathways", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Pathways", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'pathway', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "pathway",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "pathway", [ "post" ], $args );
}

add_action('init', 'cptui_register_my_taxes');
