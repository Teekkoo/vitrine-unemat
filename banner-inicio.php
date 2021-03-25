
  <div class="baner-inicio">
      <?php include('menu.php')?>
    <section class="section-vitrine container">
      <div class="description-vitrine">
        <h1 class="titulo-prin">Vitrine</h1>
        <h2 class="subtitulo-secun">Digital</h2>
        <?php 
            // $args = array(
            //     'post_type' => 'conteudos'
            // );
            // $query = new WP_Query($args);
            // if($query->have_posts()): while($query->have_posts()): $query->the_post();
        ?>
        <div class="border-left">
          <p class="text-prin"><?php echo get_theme_mod('header_content_text'); ?> </p>
        </div>
        <a href="<?php echo get_theme_mod('header_content_link'); ?>"><button type="" class="btn-principal">Saber Mais</button></a>
        <?php //endwhile; endif; ?>
      </div>
      <img src="<?php bloginfo('template_url');?>/img/img-computer-vitrine.svg" class="img-vitrine desktop" alt="">
      <img src="<?php bloginfo('template_url');?>/img/square.svg" alt="" class="img-vitrine-square square1">
      <img src="<?php bloginfo('template_url');?>/img/circles-line.svg" alt="" class="img-vitrine-circles circle1">
    </section>
    
    <img class="bg-header-wave-2 img-bg temp6" src="<?php bloginfo('template_url');?>/img/background-header-end.svg" alt="">
    <img class="bg-header-wave-2 img-bg" src="<?php bloginfo('template_url');?>/img/background-header-end.svg" alt="">
    <img class="bg-header-wave-2 img-bg" src="<?php bloginfo('template_url');?>/img/background-header-end-line.svg" alt="">
  </div>
