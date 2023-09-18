<?php
get_header();

$term_id = get_queried_object()->term_id;

$department_contacts = get_field('department_info_box', 'department_' . $term_id);
if (!empty($department_contacts) & array_key_exists('department_info_box', $department_contacts)) {
    $department_contacts = $department_contacts['department_info_box'];
}
?>
    <div class="top_heading_out">
        <?php get_template_part('partials/components/category_banner'); ?>
        <?php get_template_part('partials/components/breadcrumb'); ?>
    </div>
    <div class="container" id="page-content">
        <div class="row">
            <div
                    class="col-md-8"
                    id="main-column">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3><?php print __("Build Your Future in ");
                                print single_term_title(); ?></h3>
                            <?php print get_field('description_box', 'department_' . $term_id); ?>
                        </div>
                    </div>
                </div>
                <?php
                if (have_posts() && !is_search()) { ?>
                    <div class="container mb-4 mt-3">
                        <div class="row">
                            <?php while (have_posts()) {
                                the_post();
                                get_template_part('partials/components/department-cell');
                            } ?>
                        </div>
                    </div>
                    <?php
                }
                #get_template_part('partials/components/price_table');
                ?>
            </div>
            <aside class="col-md-4" id="sidebar-column">
                <?php if (is_active_sidebar('cypress-sidebar')) : ?>
                    <?php dynamic_sidebar('cypress-sidebar'); ?>
                <?php endif; ?>
                <?php get_template_part('partials/content/sidebar'); ?>
            </aside>
        </div>
    </div>

<?php

$term = get_queried_object();

if (have_rows('page_content', $term)):
    while (have_rows('page_content', $term)) : the_row();
        if (get_row_layout() == 'whats_happening_component') {
            get_template_part('partials/components/what_happening');
        } elseif ((get_row_layout() == ('news')) ||
            (get_row_layout() == ('news__department')) ||
            (get_row_layout() == ('news__pathway')) ||
            (get_row_layout() == ('news__program'))) {
            get_template_part('partials/components/news');
        } elseif (get_row_layout() == ('cypress_banner')) {
            get_template_part('partials/components/cypress_banner');
        } elseif (get_row_layout() == ('testimonials')) {
            get_template_part('partials/components/testimonials');
        } elseif (get_row_layout() == ('banner')) {
            get_template_part('partials/components/banner_widget');
        } elseif (get_row_layout() == ('programs')) {
            get_template_part('partials/components/explore_programs');
        }
    endwhile;
endif;
?>
<?php
get_footer();
