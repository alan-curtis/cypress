<?php
get_header();
get_template_part('partials/components/hero_carousel');
?>
  <div class="container" id="page-content">
    <div class="row">
      <div class="col" id="main-column">
        <div class="page-header alignwide">
          <h1 class="page-title"><?php print get_the_title(); ?></h1>
        </div><!-- .page-header -->
        <?php
        if (have_posts() && !is_search()) {
          while (have_posts()) {
            the_post();
            $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'cypress-person-thumb');

            // Get office hours.
            $office_hours = [];
            while (have_rows('office_hours')): the_row();
              $office_hours[] = get_sub_field('office_hour_txt');
            endwhile;
            $office_hours = implode(',', $office_hours);

            // Terms.
            $tags = get_the_terms(get_the_ID(), 'person_category');
            $_tags = [];
            foreach ($tags as $tag) {
              $_tags[] = '<a href="' . get_tag_link($tag) . '">' . $tag->name . '</a>';
            }
            $_tags = implode(' | ', $_tags);
            ?>
            <div class="row align-items-center">
              <div class="col-sm-6 image">
                <?php if ($featured_image): ?>
                  <img
                    src="<?php print $featured_image; ?>"
                    alt="<?php print get_the_title(); ?>"
                    style="width: 100%;">
                <?php endif; ?>
              </div>
              <div class="col-sm-6 contact">
                <div class="contact-inner">
                  <p><?php print $_tags; ?></p>
                  <?php if (get_field('email_address')): ?>
                    <p><strong>Email:</strong> <a
                        href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a>
                    </p>
                  <?php endif; ?>
                  <?php if (get_field('phone_number_txt')): ?>
                    <p><strong>Phone:</strong> <a
                        href="tel:<?php the_field('phone_number_txt'); ?>"><?php the_field('phone_number_txt'); ?></a>
                    </p>
                  <?php endif; ?>
                  <?php if (!empty($office_hours)): ?>
                    <p><strong>Office
                        Hours:</strong> <?php print $office_hours; ?></p>
                  <?php endif; ?>
                  <?php if (get_field('location_txt')): ?>
                    <p>
                      <strong>Location:</strong> <?php the_field('location_txt'); ?>
                    </p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php
            // Course tabs
            get_template_part('partials/components/person_data');
          }
        }
        ?>
      </div>
    </div>
  </div>
<?php
get_footer();