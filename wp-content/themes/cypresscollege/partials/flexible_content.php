<?php
if( have_rows('page_content') ):
  while ( have_rows('page_content') ) : the_row();
    if ( get_row_layout() == 'whats_happening_component' ){
      get_template_part('partials/components/what_happening');
    }
    elseif ((get_row_layout() ==('news')) ||
      (get_row_layout() ==('news__department')) ||
      (get_row_layout() ==('news__pathway')) ||
      (get_row_layout() ==('news__program'))){
      get_template_part('partials/components/news');
    }
    elseif( get_row_layout() == ('cypress_banner' )){
      get_template_part('partials/components/cypress_banner');
    }
    elseif( get_row_layout() == ('testimonials' )){
      get_template_part('partials/components/testimonials');
    }
    elseif(get_row_layout() == ('banner')){
      get_template_part('partials/components/banner_widget');
    }
    elseif(get_row_layout() == ('programs')){
      get_template_part('partials/components/explore_programs');
    }
  endwhile;
endif;