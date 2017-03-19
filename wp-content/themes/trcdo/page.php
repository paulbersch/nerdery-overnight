<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TRCDO
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="hero">
				<div class="row small-up-1">
					<div class="columns shrink">
						<h1 class="hero-headline">
							I am a header.
						</h1>
					</div>
					<div class="columns shrink">
						<button class="button hero-cta">
							Button
						</button>
					</div>
				</div>
			</section>
			<section class="banner">
				<div class="row align-center align-middle">
					<div class="columns small-12 large-3">
						<h1>85858595</h1>
					people served
					</div>
					<div class="columns small-12 large-3">
						<h1>85858595</h1>
						people served
					</div>
					<div class="columns small-12 large-3">
						<h1>85858595</h1>
						people served
					</div>
				</div>
			</section>
		</main>
	</div>

<?php
get_sidebar();
get_footer();
