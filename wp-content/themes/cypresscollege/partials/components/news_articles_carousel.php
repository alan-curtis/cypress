<?php
$args = [
  'post_type' => 'post',
  'posts_per_page' => 6,
  'orderby' => 'publish_date',
  'order' => 'DESC',
  'no_found_rows' => TRUE,
  'meta_query' => [
    'relation' => 'AND',
    [
      'key' => 'featured',
      'value' => 'true',
      'compare' => 'LIKE',
    ],
  ]
];
$_posts = new WP_Query($args);

if ($_posts->have_posts()):
  ?>

  <div class="persons-wrap my-cypress-story">
    <div
      class="owl-carousel owl-theme owl-loaded owl-drag persons-carousel">
      <div class="owl-stage-outer">
        <div class="owl-stage">
          <?php while ($_posts->have_posts()): $_posts->the_post(); ?>
            <div class="owl-item col-sm-12">
              <div class="news-content row align-items-center">
                <div class="image col-sm-4">
                  <?php $featured_image = get_the_post_thumbnail_url($_posts->ID, 'cypress-post-thumb');
                  if ($featured_image):
                      $category = get_the_category();
                      $cat_name = isset($category[0]) ? $category[0]->cat_name : '';
                      ?>
                    <img
                      src="<?php print $featured_image; ?>"
                      alt="<?php print get_the_title(); ?>">
                      <span><?php print $cat_name; ?></span>
                  <?php endif; ?>
                </div>
                <div class="content col-sm-8">
                  <div class="content-header">
                    <div
                      class="tags"><?php the_category('<span class="dot"><i class="fa fa-circle" aria-hidden="true" style="
"></i></span>'); ?></div>
                    <div class="post-date"><?php the_date('F j, Y'); ?></div>
                  </div>
                  <h2><?php print str_replace('My Cypress Story: ', '', get_the_title()); ?></h2>
                  <div class="excerpt"><?php print excerpt(52); ?></div>
                  <div class="read-more"><a
                      href="<?php the_permalink(); ?>"><?php print __('Read More') ?>
                      <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php wp_reset_postdata(); wp_reset_query(); ?>
