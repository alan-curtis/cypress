<?php
if (!function_exists('kwall_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   *
   * @since kwall 1.0
   */
  function kwall_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
     * If you're building a theme based on kwall, use a find and replace
     * to change 'kwall' to the name of your theme in all the template files
     */
    load_theme_textdomain('kwall', get_template_directory() . '/languages');
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */ //	add_theme_support( 'title-tag' );
    // Add default posts and comments RSS feed links to head.
    //	add_theme_support( 'automatic-feed-links' );
    // Add shortcode support to widgets
    //	add_filter('widget_text', 'do_shortcode');
    //  add_filter('acf/format_value/type=text', 'do_shortcode');
    //  add_filter('acf/format_value/type=textarea', 'do_shortcode');

    // Remove default <p> in content.
    //remove_filter( 'the_content', 'wpautop' );
    //	remove_filter( 'the_excerpt', 'wpautop' );
    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */ //	add_theme_support( 'html5', array(
    //		'search-form',
    //		'comment-form',
    //		'comment-list',
    //		'gallery',
    //		'caption',
    //	) );

    add_image_size('cypress-post-thumb', 320, 215, TRUE);
    add_image_size('cypress-person-thumb', 555, 555, TRUE);
  }
endif; // kwall_setup
add_action('after_setup_theme', 'kwall_setup');

/**
 * Wordpress has a known bug with the posts_per_page value and overriding it
 * using query_posts. The result is that although the number of allowed
 * posts_per_page is abided by on the first page, subsequent pages give a 404
 * error and act as if there are no more custom post type posts to show and
 * thus gives a 404 error.
 *
 * This fix is a nicer alternative to setting the blog pages show at most value
 * in the WP Admin reading options screen to a low value like 1.
 *
 */
function kwall_posts_per_page($query) {
  if ($query->is_archive('posts')) {
    set_query_var('posts_per_page', 10);
  }
}

add_action('pre_get_posts', 'kwall_posts_per_page');

/**
 * Remove custom post type testimonial.
 * testimonial posttype will be added from Thim Testimonials plugin.
 */
function remove_post_types() {
  unregister_post_type('testimonial');
}

add_action('init', 'remove_post_types');

/**
 * Custom excerpt function.
 *
 * @param $limit
 *
 * @return array|string|string[]|null
 */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt) >= $limit) {
    array_pop($excerpt);
    $excerpt = '"' . implode(" ", $excerpt) . '"';
  }
  else {
    $excerpt = '"' . implode(" ", $excerpt) . '"';
  }
  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

  return $excerpt;
}

add_filter('posts_where', 'posts_where_statement');
function posts_where_statement($where) {
  global $wp_query;
  if (isset($wp_query->query_vars['taxonomy']) &&
    $wp_query->query_vars['taxonomy'] == 'department' &&
    strpos($where, "wp_2_posts.post_type IN ('post', 'program', 'person')")) {
    $where = str_replace(
      "wp_2_posts.post_type IN ('post', 'program', 'person')",
      "wp_2_posts.post_type IN ('program')", $where);
  }
  return $where;
}

function get_term_slug($post, $taxonomy) {
  $terms = get_the_terms($post->ID, $taxonomy);
  if (!empty($terms)) {
    // get the first term
    $term = array_shift($terms);
    return get_term_link($term, $taxonomy);
  }
  return '';
}