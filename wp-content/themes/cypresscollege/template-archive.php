<?php
/**
 * Template Name: Archive
 */

get_header();

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

//$year = date("Y");

$get_all = [
    'post_type' => 'post',
    'orderby' => 'desc',
    'no_found_rows' => TRUE,
//    'date_query' => [
//        [
//            'year' => $year,
//            'compare' => '=',
//            'column' => 'post_date',
//            'relation' => 'AND',
//        ],
//    ],
];

$args = [
    'post_type' => 'post',
    'paged' => $paged,
    'posts_per_page' => 4,
    'orderby' => 'desc',
    'no_found_rows' => TRUE,
//    'date_query' => [
//        [
//            'year' => $year,
//            'compare' => '=',
//            'column' => 'post_date',
//            'relation' => 'AND',
//        ],
//    ],
];

$post_count_query = new WP_Query($get_all);
$archivePosts = new WP_Query($args);
$post_count = $post_count_query->post_count;
?>
<?php get_template_part('partials/components/hero_carousel'); ?>
<div class="container" id="page-content">
  <div class="row">
    <div class="col" id="main-column">
      <div class="page-header alignwide">
        <h1 class="page-title"><?php print get_the_title(); ?></h1>
      </div><!-- .page-header -->
      <!-- news_articles_carousel -->
      <?php get_template_part('partials/components/news_articles_carousel'); ?>
      <!-- end news_articles_carousel -->
      <div class="news-filters">
        <div class="row">
          <div class="col-sm-12">
            <div class="news-filters-inner">
              <form>
                <div class="form-group">
                  <label for="categories">Category</label>
<!--                  <select data-year="--><?php //print $year; ?><!--" class="form-control" id="categories">-->
                    <select class="form-control" id="categories">
                    <option value="all">All</option>
                    <?php
                    $terms = get_terms([
                      'taxonomy' => 'category',
                      'hide_empty' => TRUE,
                    ]);
                    foreach ($terms as $term): ?>
                      <option
                        value="<?php print $term->term_id; ?>"> <?php print $term->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="pathway">Pathway</label>
                  <select class="form-control" id="pathway">
                    <option value="all">All</option>
                    <?php
                    $terms = get_terms([
                      'taxonomy' => 'pathway',
                      'hide_empty' => TRUE,
                    ]);
                    foreach ($terms as $term): ?>
                      <option
                        value="<?php print $term->term_id; ?>"> <?php print $term->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="department">Department</label>
                  <select class="form-control" id="department">
                    <option value="all">All</option>
                    <?php
                    $terms = get_terms([
                      'taxonomy' => 'department',
                      'hide_empty' => TRUE,
                    ]);
                    foreach ($terms as $term): ?>
                      <option
                        value="<?php print $term->term_id; ?>"> <?php print $term->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="actions">
                  <button type="reset" class="reset_button">Reset</button>
                  <button type="submit" class="base_button">Apply Filters
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="news-results">
        <div class="row">
          <?php if ($archivePosts->have_posts()) : ?>
            <?php while ($archivePosts->have_posts()): $archivePosts->the_post(); ?>
              <div class="col-sm-12">
                <div class="news-content have-border row align-items-center">
                  <div class="image col-sm-3">
                    <?php $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'cypress-post-thumb');
                    if ($featured_image):
                      $category = get_the_category();
                      $cat_name = isset($category[0]) ? $category[0]->cat_name : '';
                      // temp code for showing images
                      //$featured_image = str_replace('https://cypress.dev-2.staging-preview.com/', 'https://www.cypresscollege.edu/', $featured_image);
                      ?>
                      <img
                        src="<?php print $featured_image; ?>"
                        alt="<?php print get_the_title(); ?>">
                      <span><?php print $cat_name; ?></span>
                    <?php endif; ?>
                  </div>
                  <div class="content col-sm-9">
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
          <?php endif; wp_reset_query(); wp_reset_postdata(); ?>
        </div>
      </div>
        <?php
        if ( $post_count > 4 ) {
            ?>
            <div id="pagination"><a href="page/2/" class="infinite-more next"><span id="pagination-post-type"></span><?php echo ('Load More'); ?></a>
            </div>
            <?php
        }
        ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
