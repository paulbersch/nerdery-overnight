<?php
/*
Template name: Scorecard Sidebar
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="row align-center align-middle">
				<div class="columns small-11">
					<h2 class="page-headline">
					</h2>
				</div>
			</section>
			<section class="row align-center align-top">
				<div class="columns small-10 large-7">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile; // End of the loop.
					?>
				</div>
                                <div class="scorecards-sidebar small-10 large-3">
                                        <h2>Yearly Scorecards</h2>
<p>If you want to know more about our organization and how we are performing toward our goal, please view our yearly scorecards below. Each page contains a list of the year's highlights and accomplishment. There is also a detailed chart showing the total number of people served through each department during the year.</p>
<?php echo wp_list_pages([
    "child_of"=>26,
    "sort_column"=>"menu_order",
    "title_li"=>null,
    "link_before"=>null,
    "link_after"=>null
]);?>

                                </div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
