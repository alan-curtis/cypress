<?php
/**
 * Created by PhpStorm.
 * User: fwsu1
 * Date: 22/1/20
 * Time: 11:53 AM
 */

$main_navigation = get_field('global_sub_header_navigation','option');

if($main_navigation):
?>
    <div class="home__accordion-main-menu">
        <div class="container">
            <div class="row">
                <?php $menuItems = kwall_get_menu_items_group_by_parent($main_navigation); ?>
                <?php foreach ($menuItems as $menuItem):?>
                    <div class="col-12">
                        <div class="c-accordion__item js-accordion-item"
                             data-initially-open="false"
                             data-click-to-close="true"
                             data-auto-close="true"
                             data-scroll="false"
                             data-scroll-offset="0">
                            <h2 aria-controls="ac-<?php echo $menuItem->ID?>"
                                id="at-<?php echo $menuItem->ID?>"
                                class="c-accordion__title js-accordion-controller">
                                <?php echo $menuItem->post_title?>
                            </h2>
                            <div id="ac-<?php echo $menuItem->ID?>" class="c-accordion__content" style="display: none">
                                <ul>
                                    <?php foreach ($menuItem->child_items as $child_item):?>
                                        <li>
                                            <a title="<?php echo $child_item->title?>"
                                               href="<?php echo $child_item->url?>"><?php echo $child_item->post_title?></a>
                                        </li>
                                    <?php endforeach;?>
                                </ul>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif;?>
