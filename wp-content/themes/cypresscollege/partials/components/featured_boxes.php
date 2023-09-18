<?php
$feature_boxes = get_field('featured_boxes');
if (isset($feature_boxes['featured_box']) && !empty($feature_boxes['featured_box'])): ?>
  <div class="container-fluid feature_item_box"><div class="row">
  <?php foreach ($feature_boxes['featured_box'] as $box): ?>
      <div class="col-sm-6 mh-height">
        <div class="featuredBox <?php print $box['fg_color']?>">
          <div class="featured_overlay mh-height image_std_style"
               style="background-image: url('<?php print $box['bg_image']; ?>'); background-color: <?php print $box['bg_color']; ?>;">
            <?php  if(isset($box['fg_image'])): ?>
              <img src="<?php print $box['fg_image']; ?>" class="img-responsive featuredImg" />
            <?php endif; ?>
            <p><?php print $box['pre_title']; ?></p>
            <h1><?php print $box['title']; ?></h1>
          </div>
        </div>
      </div>
  <?php endforeach; ?>
    </div></div>
<?php endif;