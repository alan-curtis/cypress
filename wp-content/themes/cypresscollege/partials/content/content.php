<?php $image_url = get_field('banner_image', get_the_ID());
if(empty($image_url)) :
?>
<h1><?php the_title();?></h1>
<?php endif; ?>
  <?php if ( is_single() && !is_singular( 'program' )): ?>
  <p class="post-byline">by <?php the_author(); ?> on <?php the_date(); ?></p>
  <?php endif; ?>
  <?php the_content();?>

