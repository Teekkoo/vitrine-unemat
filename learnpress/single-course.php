<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Vitrine
 */

get_header();

$post_layout = esc_attr( get_theme_mod('post_layout', 'right-sidebar') );
$col = ( $post_layout == 'no-sidebar' ) ? 12 : 9;


$postid     = get_the_ID();
$post_types = get_post_types( null, 'objects' );
$curd       = new LP_Course_CURD();

if ( $stats_objects = $curd->count_items( $postid , 'edit' ) ) {
    $count_items = array();
    foreach ( $stats_objects as $type => $count ) {
        if ( ! $count || ! isset( $post_types[ $type ] ) ) {
            continue;
        }
    
        $count_items[] = $count;
        
    }
}
$total_lessons = isset( $count_items[0] ) ? $count_items[0] : 0;
$total_quizzes = isset( $count_items[1] ) ? $count_items[1] : 0;


$author   = get_post_meta( $postid, '_lp_course_author' );
$course_author = !empty($author) ? $author[0] : 1;
$_lp_duration = get_post_meta($postid, '_lp_duration' ) ;



/* Get course categories */
$categories = get_the_terms( $postid, 'course_category' );
$on_draught = '';
if ( $categories && ! is_wp_error( $categories ) ) {
	$draught_links = array();

	foreach ( $categories as $category ) {
		$draught_links[] = $category->name;
	}

	$on_draught = join( ", ", $draught_links );
}


/* Get course tags */
if ($terms = wp_get_object_terms( $post->ID, 'course_tag' )) {
    foreach ( $terms as $term ) {
        $tags[] = $term->name;
    }
}

?>
<?php get_template_part( 'template_parts/title-page-course');?>

<div class="container-fluid description-course-bar">
    <div class="container">
        <div class="row description-course-bar-sub">
            <div class="col-lg-12 pull-right flex description-course-bar-button">  
                <?php 
                // $link_membership = get_post_meta($post->ID, 'url_buymembership', true);
                // echo '<div class="lp-course-buttons">
                // <div id="learn-press-pmpro-notice" class="learn-press-pmpro-buy-membership purchase-course">
                // <a class="button purchase-button" href="'.$link_membership.'">Matricular</a></div></div>';  ?>
                <?php learn_press_course_purchase_button(); ?>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="crop-second"><div class="skew-second"></div></div>
	<div id="primary" class="content-area single-course-page">
		<div class="container">
			<div class="row">

				<?php
				if ( $post_layout != 'no-sidebar' && $post_layout == 'left-sidebar' ) {
					get_sidebar();
				}
				?>

				<main id="main" class="site-main col-md-<?php echo intval($col) ?>">

					<div class="blog-content">

                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="course-meta-title">Sobre o curso</h1>
                                <div class="course-meta-single">

                                    <div class="course-author course-meta-single-div">
                                        <?php echo get_avatar( $course_author, 1200 ); ?>                                        
                                        <div class="author-contain">
                                            <label><?php echo esc_html( get_the_author_meta( 'display_name', $course_author ) ) ?></label>
                                        </div>
                                    </div>
                                    <div class="course-details course-meta-single-div">
                                        <div class="course-title">
                                            <h1>Detalhes</h1>
                                        </div>
                                        <div class="course-contain">
                                            <?php if(get_post_meta($post->ID, 'carga-horaria', true)): ?>
                                            <span>
                                                <label class="label-title">Carga Horária:</label>
                                                <label class="label-info">
                                                    <?php echo get_post_meta($post->ID, 'carga-horaria', true); ?>
                                                </label>
                                            </span>
                                            <?php endif ?>
                                            <?php if(get_post_meta($post->ID, '_lp_duration', true)): ?>
                                            <span>
                                                <label class="label-title">Duração:</label>
                                                <label class="label-info">
                                                    <?php echo get_post_meta($post->ID, '_lp_duration', true); ?>
                                                </label>
                                            </span>
                                            <?php endif ?>
                                            <?php if(get_post_meta($post->ID, 'inicio_curso', true)): ?>
                                            <span>
                                                <label class="label-title">Inicio do Curso:</label>
                                                <label class="label-info">
                                                    <?php echo get_post_meta($post->ID, 'inicio_curso', true); ?>
                                                </label>
                                            </span>
                                            <?php endif ?>
                                            <?php if(get_post_meta($post->ID, 'encontros-presenciais', true)): ?>
                                            <span>
                                                <label class="label-title">Dia e Horários:</label>
                                                <label class="label-info">
                                                    <?php echo get_post_meta($post->ID, 'encontros-presenciais', true); ?>
                                                </label>
                                            </span>
                                            <?php endif ?>
                                            <?php if ($tags != null): ?>
                                                <span>
                                                    <label class="label-title">Modalidade:</label>
                                                    <label class="label-info">
                                                        <?php echo $tags[0] ?>
                                                    </label>
                                                </span>
                                            <?php endif ?>
                                            <?php if ($on_draught != null): ?>
                                                <span>
                                                    <label class="label-title">Categoria(s):</label>
                                                    <label class="label-info">
                                                        <?php echo $on_draught ?>
                                                    </label>
                                                </span>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="course-details-info course-meta-single-div">
                                        <div class="course-title">
                                            <?php the_title('<h1>', '</h1>') ?>
                                        </div>                        
                                        <div class="course-contain">
                                            <label class="descricao">
                                                <?php
                                                    $len_excerpt=40;
                                                    echo $course->get_content( 'raw', $len_excerpt, __( '...', 'learnpress' ) );
                                                ?>
                                            </label>
                                            <label class="investimento">Investimento:</label>
                                            <?php if(get_post_meta($post->ID, 'info-parcelamento', true)): ?>
                                                <?php echo '<div class="course-price"><span class="price"> R$ ' . get_post_meta($post->ID, 'info-parcelamento', true) . '</span></div>';?>
                                            <?php else: ?>
                                                <?php if ( $course->get_origin_price() != $course->get_price() ): ?>
                                                    <?php echo '<div class="course-price"><span class="price"> De R$ '. $course->get_origin_price().' Por R$ '. $course->get_price(). '</span></div>';?>
                                                <?php else: ?>
                                                    <?php echo '<div class="course-price"><span class="price">Matrícula: R$ ' .$course->get_price(). '</span></div>';?>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                        <?php 
                                                // $link_membership = get_post_meta($post->ID, 'url_buymembership', true);
                                                // echo '<div class="lp-course-buttons">
                                                // <div id="learn-press-pmpro-notice" class="learn-press-pmpro-buy-membership purchase-course">
                                                // <a class="button purchase-button" href="'.$link_membership.'">Matricular</a></div></div>'; ?>
                                                <?php learn_press_course_purchase_button(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
						
					</div>

				</main><!-- #main -->

			</div>
		</div>
    </div><!-- #primary -->

    <div class="crop-four">
        <div class="skew-four"></div>
    </div>
    
    <div id="primary" class="content-area single-course-page">
		<div class="container">
			<div class="row">
                <main id="main" class="site-main col-md-<?php echo intval($col) ?>">
                    <div class="blog-content">
                        <?php
						while ( have_posts() ) :
							the_post();

							the_content();

						endwhile; // End of the loop.
                        ?>
                    </div>

                </main><!-- #main -->

            </div>
        </div>
    </div><!-- #primary -->

<?php

// get_template_part( 'template_parts/single-course-newsletter'); 

get_footer();