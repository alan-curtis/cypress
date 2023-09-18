<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TextBook
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101338104-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-101338104-1');
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'textbook' ); ?></a>
	<div class="external-navigation">	
	<a href="http://www.cypresscollege.edu/index.php/academics/divisions-special-programs/librarylrc/library/" target="_newwin" alt="links to Cypress College library and library databases"><?php echo "Library"; ?></a> <?php echo " | "; ?> <a href="http://cypresscollege.instructure.com/" target="_newwin" alt="links to Cypress College Canvas online education site"><?php echo "Canvas"; ?></a> <?php echo " | "; ?> <a href="https://mg.nocccd.edu/cp/home/displaylogin" target="_newwin" alt="links to Cypress College myGateway online portal site"><?php echo "myGateway"; ?></a> <?php echo " | "; ?> <a href="http://www.cypresscollege.edu/index.php/admissions/apply-now/" target="_newwin" alt="links to the official Cypress College free online admissions application"><?php echo "Apply Now"; ?></a>
	<a href="https://web.cypresscollege.edu/searchable-schedule.html" target="_newwin" alt="links to Searchable classes of Schedule"><?php echo "| Class Schedule"; ?></a>
			
			<a href="http://www.cypresscollege.edu/services/campus-safety/parking-2/" target="_newwin" alt="links to Parking information, permit"><?php echo "| Parking"; ?></a>
	</div>
	<header id="masthead" class="site-header" role="banner">

		<?php get_template_part( 'components/header/site', 'branding' ); ?>

		<?php get_template_part( 'components/navigation/navigation', 'top' ); ?>

	</header><!-- .site-header -->

	<?php // Only show featured content or testimonials on home page
		if ( is_home() ) {

			// Add the Featured Content template
			get_template_part( 'components/features/featured-content/display', 'featured' );

			// Add the Testinomials template
			get_template_part( 'components/features/testimonials/display', 'testimonials' );
		} ?>

	<div id="content" class="site-content">