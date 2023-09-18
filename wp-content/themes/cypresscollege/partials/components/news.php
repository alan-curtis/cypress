<?php
// Fetch all the latest news from the post
$news_title = get_sub_field('news_title');
$read_more = get_sub_field('news_button_text');
$numberOfNews = get_sub_field('news_display_num');
if ($numberOfNews == '') {
    $numberOfNews = 6;
}
$news_link = get_sub_field('news_link');
if ($news_link != '') :
    $news_link_url = $news_link['url'];
    $news_link_title = $news_link['title'];
endif;

$term = get_queried_object();

$args = [
    'post_type' => 'post',
    'posts_per_page' => $numberOfNews,
    'orderby' => 'publish_date',
    'no_found_rows' => TRUE,
];

$term_id = get_sub_field('news_category_filter');
$pathway = get_sub_field('pathway_filter');
$department = get_sub_field('department_filter');
$program = get_sub_field('program_filter');

if ($term_id) {
    $args['cat'] = $term_id;

    $pathway_ids = get_terms('pathway', ['get' => 'all', 'fields' => 'ids']);
    $args['tax_query'] = [
        'relation' => 'AND',
        [
            'taxonomy' => 'pathway',
            'field' => 'id',
            'terms' => $term_id,
            'include_children' => FALSE,
            'operator' => 'NOT IN'
        ],
    ];
}

if ($pathway) {
    //  $category_ids = get_terms('category', ['get' => 'all', 'fields' => 'ids']);
    //  $args['category__not_in'] = $category_ids;
    $args['tax_query'] = [
        'relation' => 'AND',
        [
            'taxonomy' => 'pathway',
            'field' => 'id',
            'terms' => [$pathway],
            'include_children' => FALSE,
            'operator' => 'IN',
        ],
    ];
}

if ($department) {
    $args['tax_query'] = [
        'relation' => 'AND',
        [
            'taxonomy' => 'department',
            'field' => 'id',
            'terms' => [$department],
            'include_children' => FALSE,
            'operator' => 'IN',
        ],
    ];
}

if ($program) {
    $args['meta_query'] = [
        'relation' => 'AND',
        [
            'key' => 'program_refs',
            'value' => $program,
            'compare' => 'LIKE',
        ],
    ];
}

?>
<div class="container latest-news">
    <?php if ($news_title !== '') : ?>
        <h3 class="blue-title"><?php echo __($news_title); ?></h3>
    <?php endif; ?>

    <div class="row">
        <div class="owl-carousel owl-theme owl-loaded owl-drag news-carousel">
            <div class="owl-stage-outer">
                <div class="owl-stage">
                    <?php
                    $news_posts = new WP_Query($args);
                    $count = 1;
                    $sites = get_sites();
                    $site_with_news = get_current_blog_id();
                    switch_to_blog($site_with_news);

                    if ($news_posts->have_posts()) :
                        while ($news_posts->have_posts()) : $news_posts->the_post(); ?>
                            <div class="owl-item">
                                <div class="item">
                                    <div class="card" style="width: 18rem;">
                                        <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
                                            <?php
                                            if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'cypress-post-thumb');
                                                ?>
                                                <img src="<?php echo $featured_image; ?>" class="card-img-top" alt="<?php echo $news_title . "_" . $count; ?>">
                                            <?php } else{
                                                ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/General-News-320x215.jpg" class="card-img-top" alt="<?php echo $news_title . "_" . $count; ?>">
                                                <?php
                                            } ?>
                                        </a>
                                        <div class="card-body text-center">
                                            <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo __("Read More"); ?></a>
                                            <div class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $count++;
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    wp_reset_query();
                    restore_current_blog();
                    ?>
                </div>
            </div>
            <?php if ($news_link != '') : ?>
                <a class="news-more-link" href="<?php echo $news_link_url; ?>"><?php echo $news_link_title; ?></a>
            <?php endif; ?>
        </div>
        <div class="owl-dots disabled"></div>
    </div>
</div>
