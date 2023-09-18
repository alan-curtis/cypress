<?php
// Admin can add the testimonial from the post type *Testimonials*
$homepage_testimonials_title = get_sub_field('testimonials_title');
$testimonials_display_num = get_sub_field('testimonials_display_num');
$testimonials_link = get_sub_field('testimonials_link');
if ($testimonials_link != ''):
  $testimonials_link_url = $testimonials_link['url'];
  $testimonials_link_title = $testimonials_link['title'];
endif;

$term_id = get_sub_field('testimonials_category_filter');

$args = [
  'post_type' => 'jetpack-testimonial',
  'posts_per_page' => $testimonials_display_num,
  'orderby' => 'desc',
  'no_found_rows' => TRUE,
];

if ($term_id) {
  $args['tax_query'] = [
    [
      'taxonomy' => 'testimonial_category',
      'field' => 'term_id',
      'terms' => [$term_id],
      'include_children' => TRUE,
      'operator' => 'IN',
    ],
  ];
}

$testimonials_posts = new WP_Query($args);
?>

<?php if ($testimonials_posts->have_posts()) : ?>
  <script type="text/javascript">
      jQuery(document).ready(function( $ ) {
      var owl = $('.testimonials-carousel');
      owl.owlCarousel({
      loop:true,
      autoplay:true,
      autoplayTimeout:8000,
      autoplayHoverPause:true,
      dots: false,
      responsive: {
        0:{
          items: 1
        },
        768: {
          items: 2
        }
      }
  });
  });
  </script>

  <div class="container testimonials">
    <?php if ($homepage_testimonials_title !== ''): ?>
      <h3 class="blue-title"><?php echo $homepage_testimonials_title; ?></h3>
    <?php endif; ?>
    <div class="row testimonials-row">

      <div
        class="owl-carousel owl-theme owl-loaded owl-drag testimonials-carousel">
        <div class="owl-stage-outer">
          <div class="owl-stage">
            <?php
            while ($testimonials_posts->have_posts()) : $testimonials_posts->the_post();
              $testimonial_author = get_field('student_name') ? get_field('student_name') : get_field('testimonial_author');
              //student_name
              ?>
              <div class="owl-item col-sm-6 quote">
                <div class="quote-content row">
                  <div class="image col-sm-4">
                      <img src="<?php echo get_template_directory_uri() ?>/assets/images/Testimonial-Thumbnail.jpg"
                           alt="<?php the_title(); ?>">
<!--                    --><?php //if (has_post_thumbnail()): ?>
<!--                      --><?php //echo get_the_post_thumbnail(); ?>
<!--                    --><?php //else: ?>
<!--                      <img-->
<!--                        src="--><?php //echo get_template_directory_uri() ?><!--/assets/images/Testimonial-Thumbnail.jpg"-->
<!--                        alt="--><?php //the_title(); ?><!--">-->
<!--                    --><?php //endif; ?>
                  </div>
                  <div class="content col-sm-8">
                    <div class="heading-six"><?php the_title(); ?></div>
                    <p><?php the_content(); ?></p>
                    <p class="name">
                      -&nbsp;<?php echo $testimonial_author; ?></p>
                  </div>
                </div>
              </div><!-- owl-item -->
            <?php endwhile;
            wp_reset_postdata(); ?>
          </div><!-- owl-stage -->
        </div><!-- owl-stage-outer -->
        <?php if ($testimonials_link != ''): ?>
          <a class="testimonials-more-link"
             href="<?php echo $testimonials_link_url; ?>"><?php echo $testimonials_link_title; ?></a>
        <?php endif; ?>
      </div><!-- owl-carousel -->
    </div><!-- row -->
  </div>
<?php endif; ?>
