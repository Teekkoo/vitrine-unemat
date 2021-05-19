<?php 
    function customize_register($wp_custom){
      
         //cria o painel (section principal) onde todas as section de adicionar conteudo ficaram
         $wp_custom->add_panel( 'page_content', array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Conteudo do Site',
            'priority' => 10
         ));

        // cria section de adicionar o conteudo da section do header
         $wp_custom -> add_section('content_header', array(
            'title' =>__('Conteudo de Boas Vindas', 'Vitrine'),
            'description' => sprintf(__('Opções para inserir o conteudo da apresentação inicial', 'Vitrine')),
            'panel' => 'page_content',
            'priority' => 10
        ));

        // cria area de texto para adicionar o conteudo 
        $wp_custom -> add_setting('header_content_text', array(
            'default' => _x('Acesse nosso Portfólio de patentes, softwares e outros ativos e INOVE na sua empresa.','Vitrine'),
            'type' => 'theme_mod'
        ));
        $wp_custom -> add_control('header_content_text', array(
            'label' => __('Conteudo da seção','Vitrine'),
            'section' => 'content_header',
            'priority' => 2,
            'type' => 'textarea'
      
          // cria area de texto para adicionar o link do botão   
        ));
        $wp_custom -> add_setting('header_content_link', array(
            'default' => _x('','Vitrine'),
            'type' => 'theme_mod'
        ));
        $wp_custom -> add_control('header_content_link', array(
            'label' => __('link do botão','Vitrine'),
            'section' => 'content_header',
            'priority' => 3,

        ));


        // cria section de adicionar o conteudo da section Vitrine de Tecnologia
        $wp_custom -> add_section('content_vitrine', array(
            'title' =>__('Conteudo do Vitrine', 'Vitrine'),
            'description' => sprintf(__('Opções para inserir o conteudo na seção da vitrine de tecnologia', 'Vitrine')),
            'panel' => 'page_content',
            'priority' => 10
        ));

        // cria area de texto para adicionar o conteudo 
        $wp_custom -> add_setting('content_vitrine_text', array(
            'default' => _x('Acesse nosso PORTFÓLIO DE PATENTES, SOFTWARES E OUTROS ATIVOS e INOVE na sua empresa. A nossa equipe de parcerias estará disponível para atender e identificar parcerias e transferência de tecnologia que atendam suas necessidades.
            Entre em contato com a AGINOV através do e-mail aginov@unemat.br ou pelo telefone (65) 3221-0048','Vitrine'),
            'type' => 'theme_mod'
        ));
        $wp_custom -> add_control('content_vitrine_text', array(
            'label' => __('Conteudo da seção','Vitrine'),
            'section' => 'content_vitrine',
            'priority' => 2,
            'type' => 'textarea'
        ));  
     
            
        // cria section de adicionar o conteudo da section de cadastro
         $wp_custom -> add_section('content_cadastro', array(
            'title' =>__('Conteudo de Cadastrar-se', 'Vitrine'),
            'description' => sprintf(__('Opções para inserir o conteudo na seção de cadastrar-se', 'Vitrine')),
            'panel' => 'page_content',
            'priority' => 10
        ));

        // cria area de texto para adicionar o conteudo 
        $wp_custom -> add_setting('content_cadastro_text', array(
            'default' => _x('Sou da UNEMAT e quero cadastrar meu Produto ou Serviço para ser divulgado na Vitrine da UNEMAT.','Vitrine'),
            'type' => 'theme_mod'
        ));
        $wp_custom -> add_control('content_cadastro_text', array(
            'label' => __('Conteudo da seção','Vitrine'),
            'section' => 'content_cadastro',
            'priority' => 2,
            'type' => 'textarea'  
             
          // cria area de texto para adicionar o link do botão   
        ));
        $wp_custom -> add_setting('content_cadastro_link', array(
            'default' => _x('','Vitrine'),
            'type' => 'theme_mod'
        ));
        $wp_custom -> add_control('content_cadastro_link', array(
            'label' => __('link do botão','Vitrine'),
            'section' => 'content_cadastro',
            'priority' => 3,

        )); 

    }
    add_action('customize_register', 'customize_register');
?>


