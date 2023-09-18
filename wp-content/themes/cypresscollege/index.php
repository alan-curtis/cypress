<?php
get_header();
get_template_part('partials/components/hero_carousel');
?>
  <div class="container" id="page-content">
    <div class="row">
      <div class="<?php if ( is_active_sidebar( 'cypress-sidebar' )) : ?>col-md-9<?php else:?>col<?php endif;?>" id="main-column">
        <?php
        if ( have_posts() && !is_search() ) {
          while ( have_posts() ) {
            the_post();
            get_template_part( 'partials/content/content' );
          }}
        ?>

        <?php if ( is_search() ): ?>
          <h1>Search Results</h1>

          <!-- Google Custom Search -->
          <script>
            (function() {
            var cx = '004846117102936190849:bl7xr4zhdte';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
            })();
          </script>
          <gcse:searchresults-only queryParameterName="s"></gcse:searchresults-only>
        <?php endif; ?>

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