<?php
function cypress_sidebar() {
  register_sidebar(
    array (
      'name' => __( 'Cypress', 'cypresscollege' ),
      'id' => 'cypress-sidebar',
      'description' => __( 'Cypress Sidebar', 'cypresscollege'),
      'before_widget' => '<div class="widget-content">',
      'after_widget' => "</div>",
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    )
  );
}
add_action( 'widgets_init', 'cypress_sidebar' );