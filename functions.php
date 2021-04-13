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
          //    cria post's personalizados para pagina secundaria 
          register_post_type( 'propriedade',
            array(
                'taxonomies'  => array( 'category' ),
                'labels' => array(
                    'name' => __( 'pagina Propriedades' ),
                    'singular_name' => __( 'Propriedades' )
                ),
                'public' => true,
                'has_archive' => true,
                'show_in_rest' => true,
                'supports' => array('title', 'editor'),
            )
        );
        // cria post's personalzados para paginas de noticias 
        register_post_type('events',
        array(
            'labels' => array(
                'name' => __('eventos'),
                'singular_name' => __('eventos')
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'editor','thumbnail'),
        ));
 }
      add_action( 'init', 'create_post_type' );


       require get_template_directory().'/inc/custom.php';
       


  
?>