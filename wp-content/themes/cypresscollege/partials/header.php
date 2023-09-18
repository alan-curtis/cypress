<?php
$current_blog_id = get_current_blog_id();
switch_to_blog($current_blog_id);

// Admin->Settings->Header Settings
$contact= (get_field('phone') != '')
    ? get_field('phone')
    : get_field('phone','option');

restore_current_blog();

$main_blog_id = get_main_site_id();
switch_to_blog($main_blog_id);

//
$logo = (get_field('global_header_logo') != '')
  ? get_field('global_header_logo')
  : get_field('global_header_logo','option');

$top_navigation=get_field('global_super_header_navigation','option');

$global_hamburger_menu = get_field('global_header_hamburger_menu','option');
?>
<header class="site-header">
  <?php if($top_navigation): ?>
  <div class="upper-navigation">
    <div class="container">
      <div class="row top-nav-row justify-content-between">
        <div class="phone">
          <a href="tel:<?php echo $contact?>" class="phone-link">
            <span class="phone-icon"></span>
            <?php echo $contact;?>
          </a>
        </div>
        <nav class="top-navigation">
          <?php
          wp_nav_menu(array(
            'menu' => $top_navigation,
            'menu_class' => 'nav justify-content-end mobile-hidden',
            'walker' => new wp_bootstrap_navwalker()
          ));
          ?>
          <!-- Collapse buttons -->
          <div class="hammy">
            <span class="fa fa-user"></span><span class="hammy-label"><?php echo __("Menu")?></span>
          </div>

          <?php if($global_hamburger_menu != ''):?>
          <button aria-label="Top Navigation Button" class="navbar-toggler third-button"
                  type="button"
                  data-toggle="collapse"
                  data-target="#navbarSupportedContent22"
                  aria-controls="navbarSupportedContent22" aria-expanded="false">
            <div class="animated-icon3">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </button>
          <?php endif;?>
        </nav>
      </div>
    </div>
  </div>
  <?php endif;?>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent22">

      <?php
        wp_nav_menu(array(
          'menu' => $top_navigation,
          'menu_id' => 'mobile-top-navigation',
          'menu_class' => 'nav hamburger-top-menu',
          'container_id' => 'mobile-top-navigation-container'
        ));
      ?>

      <?php
        if($global_hamburger_menu != ''){
          wp_nav_menu(array(
            'menu' => $global_hamburger_menu,
            'menu_class' => 'navbar-nav mr-auto hamburger-menu'
          ));
        }
      ?>

  </div>
  <!-- Collapsible content -->

  <div class="container header--wrapper">
    <div class="site--logo">
      <?php if($logo):?>
      <a href="<?php echo esc_url(home_url( '/' ) );?>"><img src="<?php echo $logo;?>" alt="Cypress College"></a>
      <?php endif;?>
    </div>
    <!-- Sub Header  -->
    <?php if('global_sub_header_navigation'):
      $main_navigation = get_field('global_sub_header_navigation','option');
    ?>
    <nav class="main-navigation">
      <div class="menu-main-navigation-container">
        <ul id="menu-main-navigation" class="nav justify-content-end desktop-nav">
          <?php
          wp_nav_menu(array(
            'menu' => $main_navigation,
            // 'menu_class' => 'nav justify-content-end desktop-nav',
            'menu_class' => false,
            'container' => false,
            'items_wrap' => '%3$s',
            'walker' => new wp_bootstrap_navwalker()
          ));
          ?>
          <!-- Search Button -->
          <li>
            <a href="#" aria-label="Click to open the search modal" class="search-btn"><span class="fa fa-search"></span></a>
            <div class="search-box search-elem">
              <button aria-label="Close Search Popup" class="close"><span class="fa fa-close"></span></button>
              <div class="inner row">
                <div class="small-12 columns">
                  <form action="/">
                    <label class="placeholder" for="search-field">Search Site...</label>
                    <input type="text" id="search-field" name="s">
                    <button aria-label="Submit to Search Site" tabindex="0" class="submit" type="submit"><span class="fa fa-search"></span></button>
                  </form>
                </div>
              </div>
            </div>
          </li>

        </ul>
      </div>
    </nav>
    <?php endif;?>
    <!-- Mobile Nav -->
    <nav class="mobile-navigation">
        <?php
        wp_nav_menu(array(
            'menu' => $main_navigation,
            'menu_class' => 'nav mobile-nav',
            'walker' => new wp_bootstrap_navwalker()
        ));
        ?>
    </nav>
  </div>
</header>
<?php restore_current_blog(); ?>