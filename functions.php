<?php
// cria menu principal do header no wordpress
    register_nav_menus(array(
    // Nome da Chamada | Nome no Wordpress | Nome do Tema
    'principal' => __('Menu Principal', 'Vitrine')
    )); 
    
    function register_navwalker(){
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
      }
      add_action( 'after_setup_theme', 'register_navwalker' );

    function create_post_type() {
        // Creating Post Type categorias 
        register_post_type( 'categorias',
            array(
                'labels' => array(
                    'name' => __( 'Categorias de Produtos' ),
                    'singular_name' => __( 'Categoria do Produto' )
                ),
                'public' => true,
                'has_archive' => true,
                'show_in_rest' => true,
                'supports' => array('title'),
            )
        );
         // Creating Post Type Produtos
         register_post_type( 'produtos',
         array(
            'taxonomies'  => array( 'category' ),
             'labels' => array(
                 'name' => __( 'Produtos' ),
                 'singular_name' => __( 'Produto' )
             ),
             'public' => true,
             'has_archive' => true,
             'show_in_rest' => true,
             'supports' => array('editor','custom-fields','thumbnail'),
         )
     );

    //  cria post's para alimentar textos do header e index
        register_post_type( 'conteudos',
        array(
            'taxonomies'  => array( 'category' ),
            'labels' => array(
                'name' => __( 'conteudos do site' ),
                'singular_name' => __( 'conteudos do site' )
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'supports' => array('editor'),
         )
        );
          //    cria post's personalizados para pagina secundaria 
          register_post_type( 'propriedade',
            array(
                'taxonomies'  => array( 'category' ),
                'labels' => array(
                    'name' => __( 'Propriedades' ),
                    'singular_name' => __( 'Propriedades' )
                ),
                'public' => true,
                'has_archive' => true,
                'show_in_rest' => true,
                'supports' => array('title', 'editor',''),
            )
        );
 }
      add_action( 'init', 'create_post_type' );

      add_theme_support( 'post-thumbnails');    
       set_post_thumbnail_size(300, 250, true);

       require get_template_directory().'/inc/custom.php';
       


  
?>