<?php /*
Template Name: single-propriedade
Template Post Type: propriedade
*/ ?>

<?php
get_header();
include('menu.php');
?>

<?php $t="oi"; $c=""; $cat="";?>

<section class="section-info container d-flex">
    <?php if(have_posts()) : the_post(); ?>
    <?php
		$t = get_the_title();
		$c = get_the_content();
		$categories = get_the_category($pos->ID);
		foreach ( $categories as $category ) {
			$cat = $category->cat_name;
		}

	?>
    <?php endif;?>
    <div class="menu-info">
        <img class="desktop img-bn-portifolio" src="<?php bloginfo('template_url'); ?>/img/Image@2x.png" alt="">

        <?php
   $my_args = array(
		'post_type'=>'propriedade',
		'category_name' => $cat,
		'posts_per_page' => 3
  	);
	$my_query =new WP_Query($my_args);
?>
        <?php if( $my_query->have_posts()) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>
        <a href="<?php the_permalink();?>" class="item-menu-info">
            <strong class="text-legenda m-dados"><?php the_title();?></strong>
            <!-- <p class="text-legenda m-dados">Descrição do item</p> -->
        </a>
        <?php endwhile; endif;  wp_reset_query();?>
        <?php
            $my_args = array(
               'post_type' => 'page',
               'pagename' => 'propriedade-intelectual',
            );
            $my_query =new WP_Query($my_args);
            $pId;
         ?>
      <?php if($my_query->have_posts()):while( $my_query->have_posts()): $my_query->the_post();?>
      <?php $pId=get_the_ID();?>
      <?php  endwhile; endif; wp_reset_query();?>
      <div class="buttons-list">
      <a class="btn-menu" href="http://192.168.30.12/propriedade-intelectual/">Página 1</a>
         <?php
            $my_args = array(
               'post_type'  => 'page',
               'post_parent'=> $pId,
               'order' => 'ASC'
            );
            $my_query =new WP_Query($my_args);
            $cont=1;
         ?>
         <?php if($my_query->have_posts()):while( $my_query->have_posts()): $my_query->the_post();?>
         <?php $cont++;?>
         <a class="btn-menu" href="<?php the_permalink(); ?>">Página <?php echo $cont; ?></a>
         <?php endwhile; endif; wp_reset_query(); ?>
      </div>
    </div>
    </div>
    <div class="info-content">
        <h1 class="info-principal-title">Propriedade Intelectual</h1>
        <a>
            <h4 class="info-subtitle"><?php echo $t; ?></h4>
        </a>
        <div class="border-left">
            <div class="text-prin txt-justify"><?php echo $c;?></div>
        </div>
    </div>
</section>
<?php get_footer(); ?>