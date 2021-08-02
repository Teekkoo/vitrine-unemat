<!-- banner category course page -->
<!-- <?php 
	// if( learn_press_is_course_tag() || is_archive() || learn_press_is_course_category()):
  //   $obj = get_queried_object();
  //   $cat_slug = $obj->slug;
    
  ?>
  <div class="banner-category-page">
      <?php 
        // $course_category = get_term_by('slug',$cat_slug,'course_category' );
        // echo '<div class="info-category-page"> <h1 class="title-category-page">'.$course_category->name.'</h1>';
        // echo '<p class="description-category-page">'.$course_category->description.'</p></div>';
      ?>
      <div class="background"></div>
      <img src="<?php //bloginfo("template_url"); ?>/img/banner-cateogry.svg" alt="Pesquisas" class= "categoria-banner"> 
  </div>
  <div class="crop-nine"><div class="skew-nine"></div></div>

<?php //endif ?> -->

<!-- banner single course -->
<!-- <?php 
	//if( learn_press_is_course() && is_single()):
    
   
  ?>
  <div class="banner-course-page">
      <?php 
        //echo '<div class="info-category-page"> <h1 class="title-course-page">'.$post->post_title.'</h1></div>';
      ?>
      <div class="background"></div>
      <img src="<?php //bloginfo("template_url"); ?>/img/banner-cateogry.svg" alt="Pesquisas" class= "categoria-banner"> 
  </div>
  <div class="crop-nine"><div class="skew-nine"></div></div>

  <?php// endif ?> -->

  <?php 
   include('menu.php');

 if ( class_exists( 'WooCommerce' ) || function_exists( 'is_shop' )):  
    $obj = get_queried_object();
    $cat_slug = $obj->slug;

    $shop = get_option( 'woocommerce_shop_page' );
    ?>
    <div class="banner-course-page">
        <?php 
         $course_category = get_term_by('slug',$cat_slug,'course_category' );
         if( $course_category){
          echo '<div class="info-category-page"> <h1 class="title-course-page">' . esc_html( get_the_title($shop) ) . '</h1>';
          echo '<p class="description-category-page">'.$course_category->description.'</p></div>';
          }else{
            echo '<div class="info-category-page"> <h1 class="title-course-page">' . esc_html( get_the_title($shop) ) . '</h1></div>';
          }
          
        ?>
        <img class="bg-header-wave-2 img-bg" src="<?php bloginfo('template_url'); ?>/img/background-header-end-line.svg" alt="">
    <div></div>
    </div>

    <?php endif ?>