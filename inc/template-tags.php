<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Vitrine
 */

if ( ! function_exists( 'vitrine_comment_number' ) ) :
    function vitrine_comment_number(){
	    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		    echo '<span class="comments-link">';
		    echo '<i class="fa fa-comments-o"></i> ';
		    printf( esc_html(_n( '%d Comment', '%d Comments', get_comments_number(), 'vitrine' ) ), number_format_i18n( get_comments_number() ) );
		    echo '</span>';
	    }
    }
endif;


if ( ! function_exists( 'vitrine_comments' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @return void
	 */
	function vitrine_comments( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
				?>
                <li class="pingback">
                <p><?php esc_html_e( 'Pingback:', 'vitrine' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'vitrine' ), ' ' ); ?></p>
				<?php
				break;
			default :
				?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                    <div class="comment-author fn vcard">
						<?php echo get_avatar( $comment, 60 ); ?>
						<?php //printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>
                    </div><!-- .comment-author .vcard -->

                    <div class="comment-wrapper">
						<?php if ( $comment->comment_approved == '0' ) : ?>
                            <em><?php esc_html_e( 'Your comment is awaiting moderation.', 'vitrine' ); ?></em>
						<?php endif; ?>

                        <div class="comment-meta comment-metadata">
                            <strong><?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?></strong>
                            <span class="says"><?php esc_html_e( 'says:', 'vitrine' ) ?></span><br>
                            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
									<?php
									/* translators: 1: date, 2: time */
									printf( esc_html__( '%1$s at %2$s', 'vitrine' ), get_comment_date(), get_comment_time() ); ?>
                                </time></a>
                        </div><!-- .comment-meta .commentmetadata -->
                        <div class="comment-content"><?php comment_text(); ?></div>
                        <div class="comment-actions">
							<?php comment_reply_link( array_merge( array( 'after' => '<i class="fa fa-reply"></i>' ), array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                        </div><!-- .reply -->
                    </div> <!-- .comment-wrapper -->

                </article><!-- #comment-## -->

				<?php
				break;
		endswitch;
	}
endif;



function vitrine_breadcrumb(){
	if ( function_exists('bcn_display') )
	{
		echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/"><div class="container"> ';
		bcn_display();
		echo '</div></div>';
	}
}

/**
 * Display course ratings
 */
if ( ! function_exists( 'vitrine_course_ratings' ) ) {
	function vitrine_course_ratings() {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( ! is_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) ) {
			return;
		}

		$course_id   = get_the_ID();
		$course_rate = learn_press_get_course_rate( $course_id );
		$ratings  = vitrine_course_rate_total();
		?>
        <div class="course-review">
            <?php if ( is_singular('lp_course') ) { printf(  '<label>%1$s '. esc_html__('Visualizações', 'vitrine') .'</label>', $ratings ); } ?>
            <div class="value">
				<?php vitrine_print_rating( $course_rate );  ?>
            </div>
        </div>
		<?php
	}
}

if ( ! function_exists( 'vitrine_print_rating' ) ) {
	function vitrine_print_rating( $rate ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( ! is_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) ) {
			return;
		}

		?>
        <div class="review-stars-rated">
            <ul class="review-stars">
                <li><span class="fa fa-star-o"></span></li>
                <li><span class="fa fa-star-o"></span></li>
                <li><span class="fa fa-star-o"></span></li>
                <li><span class="fa fa-star-o"></span></li>
                <li><span class="fa fa-star-o"></span></li>
            </ul>
            <ul class="review-stars filled" style="<?php echo esc_attr( 'width: calc(' . ( $rate * 20 ) . '% - 2px)' ) ?>">
                <li><span class="fa fa-star"></span></li>
                <li><span class="fa fa-star"></span></li>
                <li><span class="fa fa-star"></span></li>
                <li><span class="fa fa-star"></span></li>
                <li><span class="fa fa-star"></span></li>
            </ul>
        </div>
		<?php

	}
}


if ( ! function_exists( 'vitrine_course_rate_total' ) ) {
	function vitrine_course_rate_total() {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( ! is_plugin_active( 'learnpress/learnpress.php' ) ) {
			return '';
		}

		$course_id   = get_the_ID();
		$course_rate = learn_press_get_course_rate_total( $course_id );

		return $course_rate;
	}
}

if ( ! function_exists( 'vitrine_course_price' ) ) {
	function vitrine_course_price() {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( ! is_plugin_active( 'learnpress/learnpress.php' ) ) {
			return;
		}

		$course = LP_Global::course();
        $price = $course->get_price_html();
        
		?>
            <div class="course-price">
            
                <?php if ( $course->has_sale_price() ) { ?>

                    <span class="origin-price"> <?php echo $course->get_origin_price_html(); ?></span>

                <?php } ?>

                <span class="price"><?php echo (!$price ) ? 'Free' : $price; ?></span>
           
            </div>
        <?php
        
	}
}

if ( ! function_exists( 'vitrine_course_students' ) ) {
	function vitrine_course_students() {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( ! is_plugin_active( 'learnpress/learnpress.php' ) ) {
			return;
		}

		$course = learn_press_get_course();

		if ( $course ) {
			echo esc_attr( $course->count_students() );
		}
	}
}

if ( ! function_exists( 'vitrine_get_setting' ) ) {
	function vitrine_get_setting( $setting_name ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		if ( ! is_plugin_active( 'learnpress/learnpress.php' ) ) {
			return '';
		}

		$setting =  LP()->settings->get( $setting_name ) ;

		return $setting;

	}
}

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'WooCommerce' ) ) { return true; } else { return false; }
	}
}

if ( ! function_exists( 'vitrine_is_wc_shop' ) ) {
	function vitrine_is_wc_shop(){
		if ( class_exists( 'WooCommerce' ) || function_exists( 'is_shop' ) ) {
		    if ( is_shop() )
			return true;
		}
		return false;
	}
}
if ( ! function_exists( 'vitrine_is_wc_archive' ) ) {
	function vitrine_is_wc_archive(){
		if ( function_exists( 'is_product_category' ) || function_exists('is_product_tag') ) {
			if ( is_product_category() || is_product_tag() ) {
				return true;
			}
		}
		return false;
	}
}
