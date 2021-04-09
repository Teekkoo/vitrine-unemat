<header>
    <div class="menu-icones">
        <div class="logo-vitrine">
            <img src="<?php bloginfo('template_url');?>/img/logo-vitrine-desk.svg" alt="" />
        </div>
        <?php      
      $options =  array(
            'items_wrap'        => '%3$s', 
            'menu_class'        => false, 
            'menu_id'           => false,
            'container'         => 'div',
            'container_class'   => 'navbar-principal',
            'container_id'      => false,
            'walker' => new WP_Bootstrap_Navwalker(),
        );
      $menu = wp_nav_menu($options);
      echo strip_tags($menu, '');
    ?>
        <div class="area-pesq">
            <div class="logo-unemat">
                <input type="text" class="d-none" value="<?php bloginfo('template_url');?>" id="trocaId">
                <img id="brasao" src="<?php bloginfo('template_url');?>/img/brasao-unemat.svg" alt=""
                    onmouseover="trocaImage()" />
            </div>
            <div>
                <div class="search-forms">
                    <div class="pesquisa-img">
                        <img class="search-button-img" src="<?php bloginfo('template_url');?>/img/lupa-branca.svg"
                            id="pesquisa-img" alt="" srcset="" />
                    </div>
                    <form class="pesquisa d-none" id="form-pesq" action="" method="post">
                        <div class="barra-pesquisa">
                            <input type="search" class="search-bar" />
                            <button class="search-button" type="submit" value="" id="pesquisa">
                                <img class="search-button-img" src="<?php bloginfo('template_url');?>/img/lupa-azul.svg"
                                    alt="" />
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <img class="bg-header-wave " src="<?php bloginfo('template_url');?>/img/background-header-2.svg" />
    <img class="bg-header-wave header-temp-1 zindex"
        src="<?php bloginfo('template_url');?>/img/background-header.svg" />
    <img class="bg-header-wave zindex " src="<?php bloginfo('template_url');?>/img/background-header.svg" />

    <!-- menu mobile -->
    <div class="menu-icones-mobile">
    <div id="open" class="dropdown open-dropdown" onclick=" menu() ">
      <img class="btn-drop" src="<?php bloginfo('template_url'); ?>/img/menu-dropdown-open.svg" alt="">
    </div>
    <div id="close" class=" dropdown d-none close-dropdown">
      <img class="btn-drop" src="<?php bloginfo('template_url'); ?>/img/menu-dropdown-close.svg" onclick=" menu()"
        alt="">
      <div class="menu-list">
        <?php
      $options =  array(
         'items_wrap'        => '%3$s',
         'menu_class'        => false,
         'menu_id'           => false,
         'container'         => 'div',
         'container_class'   => 'opcao-list',
         'container_id'      => false,
         'walker' => new WP_Bootstrap_Navwalker(),
     );
   $menu = wp_nav_menu($options);
   echo strip_tags($menu, '');
    ?>
      </div>
      <img class="bg-dropdown" src="<?php bloginfo('template_url'); ?>/img/background-footer.svg" alt="">
    </div>
    <nav class="nav-mobile navbar-principal">
      <div class="logo-Aginov">
        <img src="<?php bloginfo('template_url'); ?>/img/logo-aginov-mobi.svg" alt="" />
      </div>
    </nav>
  </div>
</header>