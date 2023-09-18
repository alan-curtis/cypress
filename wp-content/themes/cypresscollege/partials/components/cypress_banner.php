<?php
$homepage_cypress_banner_background_image=get_sub_field('cypress_banner_bg_image');
$homepage_cypress_banner_title=get_sub_field('cypress_banner_title');
$homepage_cypress_description=get_sub_field('cypress_banner_subtitle');
?>
<div class="container-fluid cypress-banner p-0" title="About Cypress College" style="background-image: url(<?php echo esc_url($homepage_cypress_banner_background_image['url']); ?>)">
  <div class="row justify-content-center flex-column text-center text-white p-4">
    <?php if($homepage_cypress_banner_title!==''):?>
    <h2><?php echo $homepage_cypress_banner_title;?></h2>
    <?php endif;?>
    <hr class="yellow">
    <p><?php echo $homepage_cypress_description;?></p>
    <?php if(have_rows('cypress_banner_item')):?>
    <div class="row overview-blocks">
      <?php while(have_rows('cypress_banner_item')):the_row();
        $homepage_cypress_banner_icon=get_sub_field('cypress_banner_item_icon');
        $homepage_cypress_banner_link=get_sub_field('cypress_banner_item_link');
        $banner_link=$homepage_cypress_banner_link['url'];
        $banner_title = $homepage_cypress_banner_link['title'];
        $banner_target = $homepage_cypress_banner_link['target'] ? $homepage_cypress_banner_link['target'] : '_self';
      ?>
      <div class="col-lg-3 col-md-6 block">
        <a href="<?php echo $banner_link; ?>" title="<?php echo $banner_title;?>">
          <div class="image">
            <img src="<?php echo esc_url($homepage_cypress_banner_icon['url']); ?>" alt="Programs of Study">
          </div>
          <div class="content">
            <div class="text-white text-uppercase heading-four"><?php echo $banner_title;?></div>
          </div>
        </a>
      </div>
      <?php endwhile;?>
    </div>
    <?php endif; ?>
  </div>
</div>
