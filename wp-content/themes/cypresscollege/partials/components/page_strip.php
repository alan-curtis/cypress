<?php
if (has_sub_field('page_strip')):
  $page_strip = get_field('page_strip');
  ?>
  <div class="page-strip">
    <div id="" class="add_icon_bottom_border add_icon_bottom">
      <div class="icon_head_bottom">
        <div class="skew_icon_diamond"></div>
      </div>
      <div class="container-fluid apply_now_box mh-height-2 "
           style="background-image: url('<?php print $page_strip['bg_image'] ?>');">
        <div class="overlay-box mh-height-2">
          <div class="container overlay-container">
            <div class="col-sm-12 col-xs-12 mh-height text-center">
              <p><?php print $page_strip['pretitle']; ?></p>
              <h2
                class="inner_page-apply_now_box"><?php print $page_strip['title']; ?></h2>
              <small><?php print $page_strip['description']; ?></small>
            </div>
            <?php if (isset($page_strip['link']) && isset($page_strip['link']['url'])): ?>
              <div class="col-sm-12 col-xs-12" style="padding-top: 30px;">
                <div class="btn-container-overlay"><a
                    href="<?php print $page_strip['link']['url']; ?>"
                    title=" APPLY NOW " target="<?php print $page_strip['link']['target'] ?>"
                    rel="noopener noreferrer">
                    <?php print $page_strip['link']['title'] ?></a></div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
endif;