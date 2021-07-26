<?php
/**
 * The template for displaying the WooCommerce page.
 * @package Vitrine
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<main id="main" class="site-main col-md-12">

					<?php woocommerce_content(); ?>

				</main><!-- #main -->

			</div>
		</div>

	</div><!-- #primary -->

<?php

get_footer();
