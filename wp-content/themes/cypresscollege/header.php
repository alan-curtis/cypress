<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <?php
  // display metadata
  get_template_part('partials/header','meta');
  // default wordpress header content


  wp_head();
  // display custom tracking code
//  echo ( get_field('tracking_code','option') ) ? get_field('tracking_code', 'option'): '';
  // display custom styling
//  echo ( get_field('custom_css','option') ) ? get_field('custom_css', 'option'): '';
  ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101338104-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-101338104-1', {
        cookie_flags: 'SameSite=None; Secure'
        });
</script>
  <link rel="stylesheet" href="//use.typekit.net/ixr7qoz.css">
  <link href="//fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body id="page-top" <?php body_class(); ?>>
  <?php echo get_field('tracking_body', 'option');?>
<div class="wrapper-container">
  <?php get_template_part('partials/header'); ?>
  <div id="main-content">
