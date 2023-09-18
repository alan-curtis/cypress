<?php
$nav_count = $pane_count = 0;
?>
<div class="course-tabs mb-3">
  <?php if (have_rows('course_tabs')): ?>
    <ul class="nav nav-tabs">
      <?php while (have_rows('course_tabs')) : the_row(); ?>
        <li class='nav-item'>
          <a
            class='nav-link <?php ($nav_count == 0) ? print 'active' : print ''; ?>'
            data-toggle='tab'
            href='#pane-<?php print $nav_count; ?>'><?php the_sub_field('tab_title'); ?></a>
        </li>
        <?php $nav_count += 1; endwhile; ?>
    </ul>
  <?php endif;
  if (have_rows('course_tabs')): ?>
    <div class="tab-content">
      <?php while (have_rows('course_tabs')) : the_row(); ?>
        <div
          class='tab-pane container fade <?php ($pane_count == 0) ? print 'show active' : print ''; ?>'
          id='pane-<?php print $pane_count; ?>'><?php the_sub_field('tab_body'); ?>
          <?php
          $persons = get_sub_field('person_refs');
          if (!empty($persons)): ?>
            <div class="persons-wrap">
              <div
                class="owl-carousel owl-theme owl-loaded owl-drag persons-carousel">
                <div class="owl-stage-outer">
                  <div class="owl-stage">
                    <?php foreach ($persons as $person): ?>
                      <div class="owl-item col-sm-12">
                        <div class="person-content row">
                          <?php $featured_image = get_the_post_thumbnail_url($person->ID, 'cypress-person-thumb'); ?>
                          <?php if ($featured_image): ?>
                            <div class="image col-sm-4">
                              <img
                                src="<?php print $featured_image; ?>"
                                alt="<?php print $person->post_title; ?>">
                            </div>
                          <?php endif; ?>
                          <div
                            class="content <?php echo $featured_image ? 'col-sm-8' : 'col-sm-12'; ?>">
                            <div class="person-header">
                              <div class="title">
                                <a class="link"
                                   href="<?php print get_permalink($person->ID); ?>"><?php print $person->post_title; ?></a>
                                <a
                                  href="mailto:<?php print get_field('email_address', $person->ID); ?>"><i
                                    class="fa fa-envelope"
                                    aria-hidden="true"></i></a>
                              </div>
                              <div class="sub-title">
                                <small><?php print get_field('designation', $person->ID); ?></small>
                              </div>
                            </div>
                            <p><?php print get_field('short_bio_txt', $person->ID); ?></p>
                            <div class="person-footer">
                              <a class="link"
                                 href="<?php print get_permalink($person->ID); ?>"><?php print __('Read More'); ?>
                                <i class="fa fa-angle-right"
                                   aria-hidden="true"></i></a>
                              <a class="all-program"
                                 href="<?php print get_term_slug($person, 'person_category'); ?>?hide=filters"><?php print __('All Program Faculty'); ?></a>
                            </div>
                          </div>
                        </div>
                      </div><!-- owl-item -->
                    <?php endforeach;
                    ?>
                  </div><!-- owl-stage -->
                </div><!-- owl-stage-outer -->
              </div><!-- owl-carousel -->
            </div>
          <?php
          endif;
          ?>
        </div>
        <?php $pane_count += 1; endwhile; ?>
    </div>
  <?php endif; ?>
</div>