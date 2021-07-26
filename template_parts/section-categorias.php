<div class="bg-section-mobile-max">
  <section class="section-categorias container">
      <div class="title-margin">
        <h1 class="titulo-secun">Categoria de Produtos</h1>
        <h2 class="subtitulo-secun font-size">Escolher a categoria que você deseja!</h2>
      </div>
      <div class="grupo-categorias">
     
      <?php     
  $args = array(
    'number'     => '',
    'orderby'    => 'title',
    'order'      => 'ASC',
    'hide_empty' => '',
    'include'    => ''
  );
  

  $courses_categories = get_terms( 'course_category', $args );

  $count = count($courses_categories);

  if ( $count > 0 ):
    foreach ( $courses_categories as $course_category ):    ?>
            <div class="categorias-item">
              <a href="<?php echo get_term_link($course_category);?>"> 
                <div class="categoria-thumb">
                  <img src="<?php bloginfo("template_url"); ?>/img/banner-cateogry.svg" alt="Pesquisas" class= "categoria-thumb">
                </div> 
                <div class="content-categoria">
                  <h3 class="title-categoria"><?php echo $course_category->name;?> </h3>
                  <p class="description-categoria"><?php echo $course_category->description; ?></p>
                </div>
              </a>
            </div>
      <?php     
      // echo $product_category->term_id;
      // $thumbnail_id = get_term_meta( $product_category->term_id, 'thumbnail_id', true );
      // echo wp_get_attachment_image($thumbnail_id); 
  
    endforeach;
    endif;
?>
</div>

      <div class="row-radio">
        <input class="radio-select" type="radio" name="lista" id="lista-1">
        <input class="radio-select" type="radio" name="lista" id="lista-2">
        <input class="radio-select" type="radio" name="lista" id="lista-3">
      </div>
    <img src="<?php bloginfo('template_url');?>/img/background-categorias.svg " class="bg-categoria temp2 desktop" alt="">
    <img src="<?php bloginfo('template_url');?>/img/background-categorias.svg " class="bg-categoria temp1 desktop" alt="">
  </section>
</div>