<?php
/*
Template name: How To Help
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="row align-center align-middle">
				<div class="columns small-11">
					<h1 class="page-headline">
					</h1>
				</div>
			</section>
			<section class="row align-center align-middle">
				<div class="columns small-10">
					<p class="page-content">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile; // End of the loop.
					?>

					</p>
				</div>
			</section>
			<section class="row align-center align-middle">
				<div class="columns small-2">
						<?php
						// Calls to Action
						$cta_selected = get_field("howtohelp_ctas");
							if( $cta_selected ): 
								echo '<button class="button primary">';
									foreach( $cta_selected as $cta ): 
										echo $cta ;
									endforeach; 
								echo '</button>';
							endif; 
						?>
					
				</div>
			</section>
			<section class="row align-center align-middle">
				<div class="columns small-10">
					<p class="page-content">
					<?php
					// HowToHelp Lower
					$lower_content = get_field("howtohelp_lower");
						echo '<div>' . $lower_content . '</div>';
					?>
					</p>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
