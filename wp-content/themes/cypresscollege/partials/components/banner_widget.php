<?php
if(have_rows('banner_items')):
?>
<div class="container banner-widget">
  <div class="row banner-cta justify-content-between">
    <?php while(have_rows('banner_items')): the_row();
      $homepage_banner_widget_icon=get_sub_field('banner_item_icon');
      $homepage_banner_widget_title=get_sub_field('banner_item_title');
      $homepage_banner_widget_link = get_sub_field('banner_item_cta');
      $link_url = $homepage_banner_widget_link['url'];
      $link_title = $homepage_banner_widget_link['title'];
      $link_target = $homepage_banner_widget_link['target'] ? $homepage_banner_widget_link['target'] : '_self';
      $item_count = get_row_index();
      $item_bg_color = ($item_count % 2 == 0) ? 'dark-blue' : 'light-blue';
    ?>
    <div class="col-sm-4 block-cta <?php echo $item_bg_color; ?>">
      <a href="<?php echo $link_url; ?>" aria-label="Click here to apply to Cypress College. Free to apply.">
        <div class="row interior-cta justify-content-center">
          <div class="image">
            <img src="<?php echo esc_url($homepage_banner_widget_icon['url']); ?>" alt="<?php echo $homepage_banner_widget_title;?>">
          </div>
          <div class="content">
            <div class="heading-four"><?php echo $homepage_banner_widget_title; ?></div>
            <p><?php echo $link_title;?> &gt;</p>
          </div>
        </div>
      </a>
    </div>
    <?php endwhile;?>
  </div>
</div>
<?php endif;?>
