<?php

add_action( 'wp_enqueue_scripts', 'mdd_custom_load_scripts' );
add_action( 'wp_enqueue_scripts', 'add_chatbotscript' );

function add_chatbotscript()
{
         global $post;
        $arr = array(11083, 8623,9472,8893,8886,8875,8873,8866,8862,8860,8858,8636,8855,8853,8629,39821,43391);
        if( is_page() || is_single() )
        {
                //if ($post->ID != 11083 || $post->ID != 8623)
                if(in_array($post->ID, $arr)==false)
                      {wp_enqueue_script( 'chatbot-js', 'https://cdn.edulla.ai/prod/Cypress/edulla.min.js', array(), '1.0.0', true );
                                /*$child_args = array(
                                        'post_parent' => 8623, // The parent id.
                                        'post_type'   => 'page',
                                        'post_status' => 'publish'
                                        );
                                $children = get_children( $child_args );
                                print_r($children);*/
                                //echo $post->ID;
                        }

        }
}


function mdd_custom_load_scripts() {

  /**
   * Compied assets
   *
   **/
  // check if resources have been compiled
  $compiled_css = get_template_directory() . '/assets/css/styles.css';
  if ( file_exists( $compiled_css ) ) {

    wp_enqueue_style( 'font-family-cypress', "https://use.typekit.net/kjl3vvy.css" );
    wp_enqueue_style( 'mdd_custom-theme', get_template_directory_uri() . '/assets/css/styles.css' );
    wp_enqueue_style( 'owl-stylesheet-css', "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" );
    wp_enqueue_style( 'sb-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array() );
    //wp_deregister_script('jquery');
    // wp_enqueue_script('jquery', "https://code.jquery.com/jquery-3.4.1.min.js" , array(), null, true);
    wp_enqueue_script('jquery', "https://code.jquery.com/jquery-1.12.4.min.js" , array(), null, true);
    wp_enqueue_script('owl-carousel-js',"https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js", array(), '1.0.0', true );
    wp_enqueue_script('popper-js',"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js", array(), '1.0.0', true );
    wp_enqueue_script( 'mdd_custom-theme-js', get_template_directory_uri() . '/assets/js/all.min.js', array(), '1.0.0', true );
	//wp_enqueue_script( 'chatbot-js', 'https://cdn.edulla.ai/prod/Cypress/edulla.min.js', array(), '1.0.0', true );
    wp_localize_script( 'mdd_custom-theme-js', 'theme',
      array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
      )
    );
  }

  // add default theme styling
  wp_enqueue_style( 'theme', get_template_directory_uri() . '/style.css' );
}

function cypresscollege_body_class($classes) {
  $classes[] = 'home-page push';
  return $classes;
}
add_filter('body_class', 'cypresscollege_body_class');
