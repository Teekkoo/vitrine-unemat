<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vitrine
 */

get_header();
$pageid = get_the_ID();
$profile = absint( vitrine_get_setting('learn_press_profile_page_id') );
$col = ( $pageid == $profile ) ? 12 : 9;
?>
	<?php get_template_part( 'template_parts/title-page-course');?>
	<div id="primary" class="content-area">
        <div class="container">
            <div class="row">
                <main id="main" class="site-main col-md-<?php echo absint( $col ) ?>">

		            <?php
		            while ( have_posts() ) :
			            the_post();

			            the_content();


		            endwhile; // End of the loop.
		            ?>

                </main><!-- #main -->

            </div>
        </div>

	</div><!-- #primary -->

<?php

get_footer();
