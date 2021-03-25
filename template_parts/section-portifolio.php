<section class="section-portifolio container">
    <h1 class="titulo-secun">Conheça nosso Portfólio!</h1>
    <div class="group-portifolio">
        <?php 
            $args = array(
                'post_type' => 'produtos'
            );
            $query = new WP_Query($args);
            if($query->have_posts()): while($query->have_posts()): $query->the_post();
        ?>
      <div class="item-portifolio">
        <div class="img-portifolio">
          <?php the_post_thumbnail() ?>
          <div class="legenda-portifolio">
            <strong class="text-legenda"><?php the_title(); ?></strong>
            <p class="text-legenda"><?php echo get_post_meta($post->ID, 'subtitle', true);  ?></p>
          </div>
          <div class="categorias">
            <p class="text-legenda">Eventos</p>
          </div>
        </div>
        <div class="portifolio-info">
          <strong class="info-text"><?php the_content(); ?></strong>
          <a href="<?php the_permalink() ?>"></a><button type="" class="btn-principal">Saber Mais</button>
        </div>
      </div>
      <?php endwhile; endif; wp_reset_query() ;?>
    </div>
    <div class="row-radio">
      <input class="radio-select" type="radio" name="lista" id="lista-1">
      <input class="radio-select" type="radio" name="lista" id="lista-2">
      <input class="radio-select" type="radio" name="lista" id="lista-3">
    </div>
  </section>