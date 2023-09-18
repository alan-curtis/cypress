<?php
/* Template Name: Full-Width */
get_header();
get_template_part('partials/components/hero_carousel');
?>
  <div id="page-content">
    <div class="row">
      <div class="<?php if ( is_active_sidebar( 'cypress-sidebar' )) : ?>col-md-9<?php else:?>col<?php endif;?>" id="main-column">
        <?php
        if ( have_posts() && !is_search() ) {
          while ( have_posts() ) {
            the_post();
            get_template_part( 'partials/content/content' );
          }}
        ?>
      </div>
      <?php if ( is_active_sidebar( 'cypress-sidebar' )) : ?>
      <aside class="col-md-3" id="sidebar-column">
        <?php dynamic_sidebar( 'cypress-sidebar' ); ?>
      </aside>
      <?php endif; ?>
    </div>
  </div>
  <?php if (get_template_part('partials/flexible_content')) : ?>
  <div id="flexible-content">
    <?php get_template_part('partials/flexible_content'); ?>
  </div>
  <?php endif; ?>
<?php
get_footer();