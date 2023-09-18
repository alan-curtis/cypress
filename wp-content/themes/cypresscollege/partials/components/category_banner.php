<?php
$term_id = get_queried_object()->term_id;
$image_url = get_field('banner_image', 'department_' . $term_id);
  ?>
<?php if(!empty($image_url["url"]) && $image_url["filesize"] > 0): ?>
  <div class="top_site_main "
       style="background: url(<?php print $image_url["url"]; ?>);">
      <?php else: ?>
      <div class="top_site_main "
           style="background: none;">
      <?php endif;  ?>
    <span class="overlay-top-header" style="background: none;"></span>
    <div class="page-title-wrapper container">
      <div class="banner-wrapper container">
        <h1><?php single_term_title(); ?></h1></div>
    </div>
  </div>
