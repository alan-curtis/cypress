<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TextBook
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<script>
		  (function() {
			var cx = '004846117102936190849:bl7xr4zhdte';
			var gcse = document.createElement('script');
			gcse.type = 'text/javascript';
			gcse.async = true;
			gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(gcse, s);
		  })();
		</script>
		<gcse:searchresults-only queryParameterName="s"></gcse:searchresults-only>

		</main><!-- .site-main -->
	</section><!-- .content-area -->
<?php
if ( have_posts() ) :
	get_sidebar();
endif;
get_footer();