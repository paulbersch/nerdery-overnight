<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TRCDO
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

			<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'container_class' => 'footer-nav-container' ) ); ?>

			<?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'container_class' => 'footer-nav-container' ) ); ?>

			<div class="copyright">
				TRDCO &copy; <?php echo date("Y"); ?>
			</div>
	
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
