<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TextBook
 */

?>

	</div>

	<?php // Get Footer Sidebar
		get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="site-footer-wrap">

			<?php get_template_part( 'components/navigation/navigation', 'bottom' ); ?>

			

		</div><!-- .site-footer-wrap -->

		
<div align="center"><a href="http://www.cypresscollege.edu/campus-map-directions/" target="_newwin" alt="links to official Cypress College maps and directions"><?php echo "Maps"; ?></a><?php echo " | "; ?> <a href="http://web.cypresscollege.edu/directory/" target="_newwin" alt="links to a Cypress College directory"><?php echo "Directory"; ?></a> <?php echo " | "; ?> <a href="http://www.cypresscollege.edu/contact-us/" target="_newwin" alt="opens an email to Cypress College"><?php echo "Contact Us"; ?></a>

<br />

<a href="https://www.nocccd.edu/unlawful-discrimination-harassment-and-sexual-assault-misconduct-162" target="_newwin" alt="opens a link to the Unlawful Discrimination, Harassment, and Sexual Assault/ Misconduct page in a new window"><?php echo "Unlawful Discrimination, Harassment, and Sexual Assault/ Misconduct"; ?></a></div>

<br />

<div align="center"><?php echo "© 2019 Cypress College. 9200 Valley View Street, Cypress, CA 90630. (714) 484-7000."; ?></div>

<div align="center"> </div>

<div align="center"><?php echo "Cypress College is part of the "; ?><a href="http://www.nocccd.edu" target="_newwin" alt="links to the official site of the North Orange County Community College District"><?php echo "North Orange County Community College District"; ?></a> <?php echo " and is accredited by the Accrediting Commission for Community and Junior Colleges."; ?></div>

&nbsp;

		
	</footer><!-- .site-footer -->

</div>
<?php wp_footer(); ?>

</body>
</html>
