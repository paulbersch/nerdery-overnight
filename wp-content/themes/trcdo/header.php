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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'trcdo' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding top-bar align-center">
				<img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" alt="TRCDO Logo" class="columns">
				<nav class="text-center show-for-medium columns large-7" data-topbar role="navigation" id="site-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'menu-1',
																		'menu_id' => 'primary-menu') ); ?>
				</nav>
				<ul class="columns">
					<li class="show-for-medium">Support</li>
					<li>Donate</li>
				</ul>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
