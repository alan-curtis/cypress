<?php


function cypress_main_menu_classes($classes, $item, $args) {
    $main_navigation = get_field('global_sub_header_navigation','option');
    $global_hamburger_menu = get_field('global_header_hamburger_menu','option');
    if($args->menu == $main_navigation) {
        $classes[] = 'dropdown';
    }

    // Hamburger Menu Classes updates
    if($args->menu == $global_hamburger_menu && $item->menu_item_parent == "0") {
        $classes[] = 'nav-item first'; // Top Level li
        $classes[] = 'menu-'.strtolower(trim(str_replace(' ',"-",$item->post_title)));
    }
    if($args->menu == $global_hamburger_menu && $item->menu_item_parent != "0") {
        $classes[] = 'nav-item';
        $classes[] = 'item-'.strtolower(trim(str_replace(' ',"-",$item->post_title)));
    }



    return $classes;
}
add_filter('nav_menu_css_class', 'cypress_main_menu_classes', 1, 3);


function kwall_get_menu_items_group_by_parent($id) {
    $navbar_items = wp_get_nav_menu_items($id);
    if(!$navbar_items){
        return false;
    }
    $child_items = [];

    // pull all child menu items into separate object
    foreach ($navbar_items as $key => $item) {
        if ($item->menu_item_parent) {
            array_push($child_items, $item);
            unset($navbar_items[$key]);
        }
    }

    // push child items into their parent item in the original object
    foreach ($navbar_items as $item) {
        foreach ($child_items as $key => $child) {
            if ($child->menu_item_parent == $item->ID) {
                if (!$item->child_items) {
                    $item->child_items = [];
                }

                array_push($item->child_items, $child);
                unset($child_items[$key]);
            }
        }
    }

    // return navbar object where child items are grouped with parents
    return $navbar_items;
}