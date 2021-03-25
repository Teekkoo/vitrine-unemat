<div class="bg-section-mobile-max">
  <section class="section-categorias container">
      <div class="title-margin">
        <h1 class="titulo-secun">Categoria de Produtos</h1>
        <h2 class="subtitulo-secun font-size">Escolher a categoria que você deseja!</h2>
      </div>
      <div class="grupo-categorias">
          <?php 
            $args = array(
                'post_type' => 'categorias',
            );
            $query = new WP_Query($args);
            if($query->have_posts()): while($query->have_posts()): $query->the_post();
          ?>
        <div class="item-categoria">
          <p class="text-categoria"><?php the_title() ?></p>
        </div>
        <?php endwhile; endif; wp_reset_query(); ?>
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