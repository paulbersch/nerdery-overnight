<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TRCDO
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <div class="banner">
            <div class="row align-center align-middle">
                <div class="column small-12 large-9">
                    <?php
                    //Main Title
                    $header = get_field("program_header");
                        echo '<h1>' . $header . '</h1>';
                    ?>
                    <p>If your situation is an emergency, select the prompt(s) that apply to you. If your situation is not an emergency, scroll down for more information.</p>
                </div>
            </div>
        </div>

        <?php
        // Questions Module
        $num_questions = get_field("num_of_questions");
        if ($num_questions) {
            echo '<div class="row align-center align-middle">';
                echo '<ul class="columns small-12 large-9 accordion" data-accordion>';

                for ($x = 1; $x <= $num_questions; $x++) {
                    $question_field =  "accordion_question_" . $x;	
                    $answer_field =  "accordion_answer_" . $x;	
                    $loop_question = get_field($question_field);
                    $loop_answer = get_field($answer_field);
            ?>
                    <li class="accordion-item" data-accordion-item>
                        <a href="#" class="accordion-title accordion-primary">
                            <h1 class="accordion-header"><?php echo $loop_question ?></h1></a>
                        <div class="accordion-content" data-tab-content>
                            <?php echo $loop_answer ?>
                        </div>
                    </li>
                <?php }

                echo '</ul>';
            echo '</div>';
        }

        // Service Module
        $services = get_field("program_services");
        echo '<div class="row align-center align-middle">';
            echo '<div class="columns small-12 large-9">' . $services . '</div>';
        echo '</div>';

        // Resources Module
        $resources = get_field("program_resources");
        echo '<div class="row align-center align-middle">';
            echo '<div class="columns small-12 large-9">' . $resources . '</div>';
        echo '</div>';

		// Calls to Action
        $cta_selected = get_field("program_ctas");
            if( $cta_selected ):
            echo '<div class="section-cta">';
                echo '<div class="row align-center align-middle text-center">';
                    echo '<h3 class="small-12">Ways to help</h3>';
                    echo '<div class="row">';
                        foreach( $cta_selected as $cta ): 
                            echo '<li>' . $cta; '</li>';
                        endforeach; 
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            endif; 
        ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();