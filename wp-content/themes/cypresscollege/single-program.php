<?php
get_header(); ?>
    <div class="top_heading_out">
        <?php get_template_part('partials/components/banner_image'); ?>
        <?php get_template_part('partials/components/breadcrumb'); ?>
    </div>
    <script type="text/javascript">
        window.hero_carousel_height_auto = false;
    </script>
    <div class="container" id="page-content">
        <div class="row">
            <div
                    class="col-md-8"
                    id="main-column">
                <?php
                if (have_posts() && ! is_search()) {
                    while (have_posts()) {
                        the_post();
                        // Tile links.
                        get_template_part('partials/components/tile_links');
                        // Main content.
                        get_template_part('partials/content/content');
                        // Faqs
                        get_template_part('partials/components/faq');
                        // Course tabs
                        get_template_part('partials/components/course_tabs');
                    }
                }
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
    <div id="flexible-content">
        <?php get_template_part('partials/components/featured_boxes'); ?>
        <?php get_template_part('partials/components/page_strip'); ?>
        <?php if (get_template_part('partials/flexible_content')) : ?>
            <?php get_template_part('partials/flexible_content'); ?>
        <?php endif; ?>
    </div>
<?php
get_template_part('partials/components/bs_video_wrapper');
get_footer();