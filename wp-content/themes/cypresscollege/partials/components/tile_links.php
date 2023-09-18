<?php
if(have_rows('tile_links')): ?>
<div class="tile-links-wrapper">
  <?php while(have_rows('tile_links')): the_row(); ?>
    <?php $link = get_sub_field('link'); ?>
    <a href="<?php print $link['url']; ?>" title="<?php print $link['title']; ?>" target="<?php print $link['target']; ?>"><?php print $link['title']; ?></a>
  <?php endwhile; ?>
</div>
<?php endif; ?>
