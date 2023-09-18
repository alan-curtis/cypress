<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

get_header();
$year = get_query_var('year');
$description = get_the_archive_description();

$hide = isset($_GET['hide']) && ($_GET['hide'] == 'filters');
$query_object = get_queried_object();
?>

<?php if (have_posts()) : ?>
  <div class="container" id="page-content">
    <div class="row">
      <div class="col" id="main-column">
        <div class="page-header alignwide">
          <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
          <?php if ($description) : ?>
            <div
              class="archive-description"><?php echo wp_kses_post(wpautop($description)); ?></div>
          <?php endif; ?>
        </div><!-- .page-header -->
        <!-- news_articles_carousel -->
        <?php
        if(!$hide) {
          get_template_part('partials/components/news_articles_carousel');
        }
        ?>
        <!-- end news_articles_carousel -->
        <?php if(!$hide) { ?>
        <div class="news-filters">
          <div class="row">
            <div class="col-sm-12">
              <div class="news-filters-inner">
                <form>
                  <div class="form-group">
                    <label for="categories">Category</label>
                    <select data-year="<?php print $year; ?>" name="categories" class="form-control" id="categories">
                      <option value="all">All</option>
                      <?php
                      $_term_id = ($query_object instanceof WP_Term) ? $query_object->term_id : null;
                      $terms = get_terms( array(
                        'taxonomy' => 'category',
                        'hide_empty' => true,
                      ) );
                      foreach ($terms as $term): ?>
                        <option
                          value="<?php print $term->term_id; ?>" <?php if($_term_id == $term->term_id){ ?> selected="selected" <?php } ?>> <?php print $term->name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="pathway">Pathway</label>
                    <select name="pathway" class="form-control" id="pathway">
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
                    <select name="department" class="form-control" id="department">
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
                    <button type="submit" class="base_button">Apply Filters</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <div class="news-results">
          <div class="row">
            <?php while (have_posts()): the_post(); ?>
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
          </div>
        </div>

            <div id="pagination"><a href="page/2/" class="infinite-more next"><?php echo ('Load More'); ?></a>
            </div>

      </div>
    </div>
  </div>
<?php endif; ?>
<?php get_footer(); ?>
