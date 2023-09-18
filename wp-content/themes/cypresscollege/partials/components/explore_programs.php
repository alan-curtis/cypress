<?php
$programTitle = get_sub_field('programs_title');
if(have_rows('program')):
?>
<div class="container explore-programs">
  <h3 class="blue-title mb-5"><?php echo $programTitle;?></h3>
  <div class="row explore-programs-wrapper">
  <?php while(have_rows('program')): the_row();
    $homepage_explore_programs_image=get_sub_field('program_image');
    $homepage_explore_programs_link = get_sub_field('program_link');
    $link_url = $homepage_explore_programs_link['url'];
    $link_title = $homepage_explore_programs_link['title'];
    $link_target = $homepage_explore_programs_link['target'] ? $homepage_explore_programs_link['target'] : '_self';
    $homepage_explore_programs_background_color= get_sub_field('program_bg_color');
    $program_count = get_row_index();
    $div_classes = (get_row_index() > 4) ? 'col-lg-2 col-md-4 col-sm-6 span-5 department-listing-block' : 'col-lg-3 col-md-4 col-sm-6 department-listing-block';
//    echo $homepage_explore_programs_background_color;
  ?>
    <div class="<?php echo $div_classes?>">
      <a href="<?php echo $link_url?>" class="department-listing-block-link">
        <img src="<?php echo esc_url($homepage_explore_programs_image['url']); ?>" alt="<?php echo $link_title;?>">
        <div class="mh-height department-listing-block-bottom-overlay <?php echo $homepage_explore_programs_background_color;?>">
          <div class="white heading-three"><?php echo $link_title;?></div>
        </div>
      </a>
    </div>
  <?php endwhile;?>

  </div>
</div>
<?php endif; ?>