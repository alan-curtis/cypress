<?php
$image_url = get_field('banner_image', get_the_ID());
if ($image_url):
  ?>
  <div class="top_site_main "
       style="background-image: url(<?php print $image_url; ?>);">
    <span class="overlay-top-header" style="background: none;"></span>
    <div class="page-title-wrapper container">
      <div class="banner-wrapper container">
        <h1><?php print get_the_title(); ?></h1></div>
    </div>
  </div>
<?php endif; ?>
