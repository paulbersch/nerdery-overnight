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

		<div class="row">

			<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'container_class' => 'footer-nav-container small-12 large-6 columns' ) ); ?>

			<?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'container_class' => 'footer-nav-container smaller-nav small-12 large-6 columns' ) ); ?>

			<div class="copyright small-12 large-6 large-offset-6 columns">
				<span>TRDCO &copy; <?php echo date("Y"); ?></span>
			</div>

		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</div></div>
</body>
</html>
