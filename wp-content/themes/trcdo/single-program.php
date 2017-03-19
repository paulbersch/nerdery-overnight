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
        
        <?php
        
        //Main Title
        $header = get_field("program_header");
            echo '<h1>' . $header . '</h1>';
        
        // Questions Module
        $num_questions = get_field("num_of_questions");
        if ($num_questions) {
            
            for ($x = 1; $x <= $num_questions; $x++) {
                $question_field =  "accordion_question_" . $x;	
                $answer_field =  "accordion_answer_" . $x;	
                $loop_question = get_field($question_field);
                $loop_answer = get_field($answer_field);
                
                echo '<h2>' . $loop_question . '</h2>';
                echo '<div>' . $loop_answer . '</div>';
                
                } 
        }
        // Service Module
        $services = get_field("program_services");
            echo '<div>' . $services . '</div>';
        
        // Resources Module
        $resources = get_field("program_resources");
            echo '<div>' . $resources . '</div>';

		// Calls to Action
        $cta_selected = get_field("program_ctas");
            if( $cta_selected ): 
                echo '<ul>';
                     foreach( $cta_selected as $cta ): 
                        echo '<li>' . $cta; '</li>';
                    endforeach; 
                echo '</ul>';
            endif; 
        ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();