<?php

function news_filter_function() {
  $term_id = trim($_GET['term_id']);
//  $year = trim($_GET['year']);

  $pathway = trim($_GET['pathway']);
  $department = trim($_GET['department']);

  $numb_item = 10;

  $args = [
    'post_type' => 'post',
    'posts_per_page' => $numb_item,
    'orderby' => 'desc',
    'no_found_rows' => TRUE,
  ];

  if ($term_id && $term_id != 'all') {
    $args['cat'] = $term_id;
  }

  $args['tax_query']['relation'] = 'AND';
  if($pathway && $pathway != 'all'){
    $args['tax_query'][] = [
      'taxonomy' => 'pathway',
      'field' => 'id',
      'terms' => [$pathway],
      'include_children' => FALSE,
      'operator' => 'IN',
    ];
  }

  if($department && $department != 'all'){
    $args['tax_query'][] = [
      'taxonomy' => 'department',
      'field' => 'id',
      'terms' => [$department],
      'include_children' => FALSE,
      'operator' => 'IN',
    ];
  }

//  if ($year) {
//    $args['date_query'] = [
//      [
//        'year' => $year,
//        'compare' => '=',
//        'column' => 'post_date',
//        'relation' => 'AND',
//      ],
//    ];
//  }

  $posts = new WP_Query($args);

  $html = '';
  if ($posts->have_posts()) {
    while ($posts->have_posts()) {
      $posts->the_post();

      $title = get_the_title();

      // Featured image.
      $featured_image_html = '';
      $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'cypress-post-thumb');
      if ($featured_image) {
        // Categories.
        $category = get_the_category();
        $cat_name = isset($category[0]) ? $category[0]->cat_name : '';
        // Categories html.
        $category_array = [];
        foreach ($category as $cat) {
          $name = $cat->cat_name;
          $cat_id = get_cat_ID($name);
          $link = get_category_link($cat_id);
          $category_array[] = '<a href="' . esc_url($link) . '"">' . $name . '</a>';
        }
        $category_html = '';
        if (!empty($category_array)) {
          $category_html = implode('<span class="dot"><i class="fa fa-circle" aria-hidden="true" style="
"></i></span>', $category_array);
        }

        // temp code for showing images
        //$featured_image = str_replace('https://cypress.dev-2.staging-preview.com/', 'https://www.cypresscollege.edu/', $featured_image);
        $featured_image_html = "<img src='{$featured_image}' alt='{$title}'><span>{$cat_name}</span>";
      }

      // Excerpt
      $excerpt = excerpt(52);
      // Post date.
      $date = get_the_date('F j, Y');
      // Permalink
      $link = get_the_permalink();

      $html .= "<div class='col-sm-12'>
   <div class='news-content have-border row align-items-center'>
      <div class='image col-sm-3'>
         {$featured_image_html}
      </div>
      <div class='content col-sm-9'>
         <div class='content-header'>
            <div class='tags'>{$category_html}</div>
            <div class='post-date'>{$date}</div>
         </div>
         <h2>{$title}</h2>
         <div class='excerpt'>{$excerpt}</div>
         <div class='read-more'><a href='{$link}'>Read More<i class='fa fa-angle-right' aria-hidden='true'></i></a>
         </div>
      </div>
   </div>
</div>";
    }
  }
  wp_reset_postdata();
  echo $html;
  die();
}

add_action('wp_ajax_news_filter', 'news_filter_function');    // If called from admin panel
add_action('wp_ajax_nopriv_news_filter', 'news_filter_function');    // If called from front end

function get_posts_for_pagination() {

    $term_id = trim($_GET['term_id']);
//  $year = trim($_GET['year']);

    $pathway = trim($_GET['pathway']);
    $department = trim($_GET['department']);

    $paged = ( $_GET['page'] ) ? $_GET['page'] : 1;

    $numb_item = 10;

    $args = [
        'post_type' => 'post',
        'paged' => $paged,
        'posts_per_page' => $numb_item,
        'orderby' => 'desc',
        'no_found_rows' => TRUE,
    ];

    if ($term_id && $term_id != 'all') {
        $args['cat'] = $term_id;
    }

    $args['tax_query']['relation'] = 'AND';
    if($pathway && $pathway != 'all'){
        $args['tax_query'][] = [
            'taxonomy' => 'pathway',
            'field' => 'id',
            'terms' => [$pathway],
            'include_children' => FALSE,
            'operator' => 'IN',
        ];
    }

    if($department && $department != 'all'){
        $args['tax_query'][] = [
            'taxonomy' => 'department',
            'field' => 'id',
            'terms' => [$department],
            'include_children' => FALSE,
            'operator' => 'IN',
        ];
    }


    $html = '';
    $post_type = "post";

    if ( empty($post_type) ) {
        return '';
    }

    if( filter_var( intval( $paged ), FILTER_VALIDATE_INT ) ) {

//        $year = date("Y");

//        $args = [
//            'post_type' => $post_type,
//            'paged' => $paged,
//            'posts_per_page' => 4,
//            'orderby' => 'desc',
//            'no_found_rows' => TRUE,
////            'date_query' => [
////                [
////                    'year' => $year,
////                    'compare' => '=',
////                    'column' => 'post_date',
////                    'relation' => 'AND',
////                ],
////            ],
//        ];

        $loop = new WP_Query( $args );

        if( $loop->have_posts() ) {
            while( $loop->have_posts() ) {
                $loop->the_post();
                $cat = isset(get_the_category()[0]) ? get_the_category()[0]->cat_name : '';
                $date = get_the_date('F j, Y');

                $html .= '<div class="col-sm-12">
                <div class="news-content have-border row align-items-center">
                  <div class="image col-sm-3">
                    <img src="'. get_the_post_thumbnail_url(get_the_ID(), 'cypress-post-thumb').'" alt="'. get_the_title().'">
                      <span>'.$cat.'</span>
                                      </div>
                  <div class="content col-sm-9">
                    <div class="content-header">
                      <div class="tags"><a href="'.get_category_link(get_the_category()[0]->term_id).'" rel="category tag">'. $cat .'</a></div>
                      <div class="post-date">'. $date .'</div>
                    </div>
                    <h2>'.str_replace('My Cypress Story: ', '', get_the_title()).'</h2>
                    <div class="excerpt">'.excerpt(52).'</div>
                    <div class="read-more"><a href="'.get_permalink(get_the_ID()).'">'.__('Read More').'<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>';
            }
            wp_reset_query();
        }
    }

    echo $html;
    exit();
}

add_action( 'wp_ajax_pagination', 'get_posts_for_pagination' );
add_action( 'wp_ajax_nopriv_pagination', 'get_posts_for_pagination' );