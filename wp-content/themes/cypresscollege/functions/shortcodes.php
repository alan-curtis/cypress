<?php

/**
 * Shortcode departments grid.
 *
 * @param $atts
 * @return string
 */
function departments_grid_html($atts)
{
    $html = '';

    $atts = shortcode_atts([
        'taxonomy' => 'department',
    ], $atts, 'departments_grid');

    $taxonomy_terms = get_terms($atts['taxonomy'], [
        'hide_empty' => 0,
        'fields' => 'ids',
    ]);

    if (!empty($taxonomy_terms)) {
        $html = '<div class="row">';
        foreach ($taxonomy_terms as $term_id) {
            $term = get_term($term_id);
            $link = get_term_link($term);
            $image = get_field('DpImage', $term);
            $default = get_template_directory_uri()."/assets/images/General-News-320x215.jpg";
            if (!empty($image)):
                $html .= "<div class='col-sm-3 col-xs-6 department-listing-block'>
                        <a href='{$link}' class='department-listing-block-image' style='background-image: url({$image});' title='{$term->name}'>
                            <div class='mh-height department-listing-block-bottom-overlay' style='height: 72px;'>
                                 <span style='color: white' href='{$link}'>
                                    <h3>{$term->name}</h3>
                                 </span>
                            </div>
                        </a>
                    </div>";
            else:
                $html .= "<div class='col-sm-3 col-xs-6 department-listing-block'>
                        <a href='{$link}' class='department-listing-block-image' style='background-image: url({$default});' title='{$term->name}'>
                            <div class='mh-height department-listing-block-bottom-overlay' style='height: 72px;'>
                                 <span style='color: white' href='{$link}'>
                                    <h3>{$term->name}</h3>
                                 </span>
                            </div>
                        </a>
                    </div>";
            endif;
        }
        $html .= '</div>';
    }

    return $html;
}

add_shortcode('departments_grid', 'departments_grid_html');
