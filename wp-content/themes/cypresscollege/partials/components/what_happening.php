<?php
/**
 *
 *
 *
 */

$title = get_sub_field('whats_happening_component_title');
$description = get_sub_field('whats_happening_component_description');
if( have_rows('whats_happening_component_items') ):
?>
<div class="container whats-happening">
  <div class="row whats-happening-row justify-content-center">
    <div class="col-sm-5 content">
      <h3 class="blue-title"><?php echo $title;?></h3>
      <hr class="yellow">
      <p><?php echo $description;?></p>

    </div>
    <div class="col-lg-4 col-sm-6 happening-cta">
      <div class="row cta-column flex-column">
        <?php
          while ( have_rows('whats_happening_component_items') ) : the_row();
            $item_link = get_sub_field('whats_happening_component_item_link');
            $link_url = $item_link['url'];
            $link_title = $item_link['title'];
            $link_target = $item_link['target'] ? $item_link['target'] : '_self';
        ?>
          <div class="cta">
            <a href="<?php echo $link_url?>" title="Links to Academic Calendar">
              <div class="image">
                <img src="<?php echo the_sub_field('whats_happening_component_item_icon')?>" alt="<?php echo $link_title?>">
              </div>
              <div class="content">
                <div class="text-uppercase heading-four"><?php echo $link_title?></div>
              </div>
            </a>
          </div>
          <?php endwhile; ?>

      </div>

    </div>
  </div>
  <hr class="dark-blue">
</div>
<?php endif; ?>