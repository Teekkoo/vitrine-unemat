<?php
/**
 * archive course page
 * @package Vitrine
 */
defined( 'ABSPATH' ) || exit();

get_header();
global $post;
?>
	<?php get_template_part( 'template_parts/title-page-course');?>
	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<main id="main" class="site-main col-md-<?php echo ($template !== 'fullwidth-template.php') ? 9 : 12 . ' no-sidebar' ; ?>">
					<?php
					get_template_part( 'template_parts/archive-select-areas');
					while ( have_posts() ) :
						the_post();

                        the_content();

					endwhile; // End of the loop.
					?>
				</main><!-- #main -->

			</div>
		</div>

	</div><!-- #primary -->

	<script>
		var containerEl = document.querySelector('.learn-press-courses');

		var mixer = mixitup(containerEl);
	</script>

<?php

get_footer();
