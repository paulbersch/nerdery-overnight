<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TRCDO
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Merriweather:700" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="off-canvas-wrapper">
<div class="off-canvas position-right" id="mobileNav" data-off-canvas>
	<!-- Your menu or Off-canvas content goes here -->
	<button class="close-button" aria-label="Close menu" type="button" data-close>
	  <span aria-hidden="true">&times;</span>
	</button>
	<nav class="nav-menu" data-topbar role="navigation" id="site-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'menu-4',
															'menu_id' => 'mobile-nav-menu'
															) ); ?>
	</nav>
</div>
<div class="off-canvas-content" data-off-canvas-content>
<button type="button" class="button hide" data-toggle="mobileNav">Open Menu</button>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'trcdo' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding top-bar">
				<a class="header-logo columns large-2" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="Back to the Home Page">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/TRCDO_light.svg" alt="Logo for Total Resource Community Development Organization">
				</a>
				<nav class="text-center show-for-large columns" data-topbar role="navigation" id="site-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'menu-1',
																		'menu_id' => 'primary-menu',
																		) ); ?>
				</nav>
				<!-- <div class="columns flex-container align-right">
					<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UFUB78XUR5BW4" class="button primary">Donate</a>
				</div> -->
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
