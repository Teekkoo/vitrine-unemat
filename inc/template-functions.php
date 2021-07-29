<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Vitrine
 */


function vitrine_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="search-form" action="' . esc_url( home_url( '/' ) ) . '" >
    <label for="s">
    	<input type="text" value="' . get_search_query() . '" placeholder="' . esc_attr__( 'Search &hellip;', 'vitrine' ) . '" name="s" id="s" />
    </label>
    <button type="submit" class="search-submit">
        <i class="fa fa-search"></i>
    </button>
    </form>';
	return $form;
}

add_action( 'tgmpa_register', 'vitrine_register_required_plugins' );
function vitrine_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => esc_html__('Elementor', 'vitrine'),
			'slug'      => 'elementor',
			'required'  => false,
		),

		array(
			'name'      => esc_html__('LearnPress - WordPress LMS Plugin', 'vitrine'),
			'slug'      => 'learnpress',
			'required'  => false,
		),

		array(
			'name'      => esc_html__('LearnPress - Course Review', 'vitrine'),
			'slug'      => 'learnpress-course-review',
			'required'  => false,
		),

		array(
			'name'      => esc_html__('One Click Demo Import', 'vitrine'),
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),


	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'vitrine',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


	);

	tgmpa( $plugins, $config );
}



function vitrine_course_category(){
	$categories = array( 'ALL');
	$course_cat = get_terms( array( 'taxonomy' => 'course_category', 'hide_empty' => false ) );
	if ( ! empty( $course_cat ) && ! is_wp_error( $course_cat ) ) {
		foreach ( $course_cat as $cat ) {
            
            $categories[ $cat->term_id ] = $cat->name;
           
		}
	}

	return $categories;
}

function vitrine_course_tag(){
	$tags = array( 'ALL');
	$course_tag = get_terms( array( 'taxonomy' => 'course_tag', 'hide_empty' => false ) );
	if ( ! empty( $course_tag ) && ! is_wp_error( $course_tag ) ) {
		foreach ( $course_tag as $tag ) {
            
            $tags[ $tag->term_id ] = $tag->name;
           
		}
	}

	return $tags;
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'vitrine_wc_header_add_to_cart_fragment' );
function vitrine_wc_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
    <a class="cart-contents" href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>" title="<?php esc_html_e('View your shopping cart', 'vitrine') ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-contents'] = ob_get_clean();
	return $fragments;
}


