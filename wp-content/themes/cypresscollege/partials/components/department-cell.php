<?php
global $post;

$image_url = get_the_post_thumbnail_url();
if(empty($image_url)){
    $image_url = get_template_directory_uri()."/assets/images/General-News-320x215.jpg";
}
$attachment_id = get_post_thumbnail_id( $post->ID );
if($attachment_id && empty($image_url)){
  $attachment = get_post($attachment_id);
  $image_url = $attachment->guid;
}
?>
<div class="col-sm-4 col-xs-6 department-listing-block">
  <a href="<?php print get_the_permalink(); ?>" class="department-listing-block-image" style="background-image: url(<?php print $image_url; ?>);" title="<?php print get_the_title(); ?>">
    <div class="mh-height department-listing-block-bottom-overlay" style="height: 72px;">
         <span style="color: white" href="<?php print get_the_permalink(); ?>">
            <h3><?php print get_the_title(); ?></h3>
         </span>
    </div>
  </a>
</div>
