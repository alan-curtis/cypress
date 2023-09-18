<?php
// Check rows exists.
$count = 0;
if (have_rows('faqs')): ?>
  <div class="accordion-wrap">
    <h2 class="mb-4"><?php print __('Frequently Asked Questions'); ?></h2>
    <div id="accordion">
      <?php while (have_rows('faqs')) : the_row();
        // Load sub field value.
        $question = get_sub_field('question');
        $answer = get_sub_field('answer');
        ?>
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse"
                      data-target="#target-<?php print $count; ?>" aria-expanded="false"
                      aria-controls="target-<?php print $count; ?>">
                <?php print $question; ?>
              </button>
            </h5>
          </div>
          <div id="target-<?php print $count; ?>" class="collapse"
               aria-labelledby="headingOne"
               data-parent="#accordion">
            <div class="card-body">
              <?php print $answer; ?>
            </div>
          </div>
        </div>
        <?php $count += 1; endwhile; ?>
    </div>
  </div>
<?php endif;