<div class="person-data-wrap">
  <div class="accordion" id="accordion">
    <!-- Static tabs -->
    <!-- About tab -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading-about">
        <button class="accordion-button collapsed" type="button"
                data-toggle="collapse"
                data-target="#collapse-about"
                aria-expanded="false"
                aria-controls="collapse-about">
          About <?php print get_the_title(); ?>
        </button>
      </h2>
      <div id="collapse-about"
           class="accordion-collapse collapse"
           aria-labelledby="heading-about"
           data-parent="#accordion">
        <div class="accordion-body">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    <!-- Recommended Courses -->
    <?php if (get_field('recommended_course_wysiwyg')): ?>
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading-recommended">
          <button class="accordion-button collapsed" type="button"
                  data-toggle="collapse"
                  data-target="#collapse-recommended"
                  aria-expanded="false"
                  aria-controls="collapse-recommended">
            <?php _e('Recommended Courses'); ?>
          </button>
        </h2>
        <div id="collapse-recommended"
             class="accordion-collapse collapse"
             aria-labelledby="heading-recommended"
             data-parent="#accordion">
          <div class="accordion-body">
            <?php the_field('recommended_course_wysiwyg'); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <!-- Classes-->
    <?php if (get_field('classes_wysiwyg')): ?>
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading-classes">
          <button class="accordion-button collapsed" type="button"
                  data-toggle="collapse"
                  data-target="#collapse-classes"
                  aria-expanded="false"
                  aria-controls="collapse-classes">
            <?php _e('Classes'); ?>
          </button>
        </h2>
        <div id="collapse-classes"
             class="accordion-collapse collapse"
             aria-labelledby="heading-classes"
             data-parent="#accordion">
          <div class="accordion-body">
            <?php the_field('classes_wysiwyg'); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <!-- Resources-->
    <?php if (have_rows('resources')): ?>
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading-resources">
          <button class="accordion-button collapsed" type="button"
                  data-toggle="collapse"
                  data-target="#collapse-resources"
                  aria-expanded="false"
                  aria-controls="collapse-resources">
            <?php _e('Resources'); ?>
          </button>
        </h2>
        <div id="collapse-resources"
             class="accordion-collapse collapse"
             aria-labelledby="heading-resources"
             data-parent="#accordion">
          <div class="accordion-body">
            <ul>
            <?php while (have_rows('resources')): the_row();
              $link = get_sub_field('links');
              ?>
              <li><a href="<?php print $link['url']; ?>"
                 title="<?php print $link['title']; ?>"
                 target="<?php print $link['target']; ?>"><?php print $link['title']; ?></a></li>
            <?php endwhile; ?>
            </ul>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <!-- End static tabs -->
    <?php if (have_rows('custom_tabs')): ?>
      <?php
      $index = 0;
      while (have_rows('custom_tabs')): the_row();
        $index += 1;
        ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading-<?php print $index; ?>">
            <button class="accordion-button collapsed" type="button"
                    data-toggle="collapse"
                    data-target="#collapse-<?php print $index; ?>"
                    aria-expanded="false"
                    aria-controls="collapse-<?php print $index; ?>">
              <?php the_sub_field('tab_title'); ?>
            </button>
          </h2>
          <div id="collapse-<?php print $index; ?>"
               class="accordion-collapse collapse"
               aria-labelledby="heading-<?php print $index; ?>"
               data-parent="#accordion">
            <div class="accordion-body">
              <?php the_sub_field('tab_wysiwyg'); ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>