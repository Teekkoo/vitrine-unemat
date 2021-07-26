<?php
/**
 * Template for displaying course content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-course.php
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$postid   = get_the_ID();
$author   = get_post_meta( $postid, '_lp_course_author' );
$ratings  = vitrine_course_rate_total();
$course_author = !empty($author) ? $author[0] : 1;

$default_column_desktop = 4;
$default_column_tablet = 6;

/* Get course tags */
$tags = get_the_terms( $postid, 'course_tag' );
$on_draught = '';
if ( $tags && ! is_wp_error( $tags ) ) {
	$draught_links = array();

	foreach ( $tags as $tag ) {
		$draught_links[] = $tag->slug;
	}

	$on_draught = join( " ", $draught_links );
}

?>

<!-- <pre>
<?php
print_r ($on_draught);
?>
</pre> -->

<li id="post-<?php the_ID(); ?>" class="mix col-lg-<?php echo $default_column_desktop ?> col-sm-<?php echo $default_column_tablet; ?> <?php echo $on_draught ?>" >
    <div class="course-item">
        <div class="course-thumbnail">
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'vitrine-course-carousel' ) ?></a>
		</div>
        <div class="course-content">
            <div class="course-author">
				<?php echo get_avatar( $course_author, 64 ); ?>
                <div class="author-contain">
                    <div class="value"><?php echo esc_html( get_the_author_meta( 'display_name', $course_author ) ) ?></div>
                </div>
            </div>
            <div class="divisor"></div>
            <h2 class="course-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <?php ?>
            <div class="course-meta">
                <div class="pull-left">
                    <div class="value"><i class="fa fa-group"></i> <?php vitrine_course_students(); ?></div>
                    <div class="value"><i class="fa fa-comment"></i><?php echo esc_attr( $ratings ); ?></div>
                </div>
                <div class="course-price pull-right">
					<?php vitrine_course_ratings() ?>
                </div>
	            <?php ?>
            </div>

        </div>
    </div>
</li>