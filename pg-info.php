<?php /*template name: info */?>
<?php get_header();?>

<?php include('menu.php');  ?>

<section class="section-info container">
    <div class="menu-info">
        <img class="img-menu" src="<?php bloginfo('template_url') ?>/img/Image@2x.png" alt="">
        <div class="item-menu-info">
            <strong class="text-legenda m-dados">Situação</strong>
            <p class="text-legenda m-dados">Registo Concedido</p>
        </div>
        <div class="item-menu-info">
            <strong class="text-legenda m-dados">Número do Pedido no INPI</strong>
            <p class="text-legenda m-dados">BR 51 2017 000491-9</p>
        </div>
        <div class="item-menu-info">
            <strong class="text-legenda m-dados">Data do Registro</strong>
            <p class="text-legenda m-dados">15/05/2017</p>
        </div>
        <div class="item-menu-info">
            <strong class="text-legenda m-dados">Data da Concessão</strong>
            <p class="text-legenda m-dados">25/05/2017</p>
        </div>
        <div class="item-menu-info">
            <strong class="text-legenda m-dados">Cotitularidade:</strong>
            <p class="text-legenda m-dados">Não</p>
        </div>
        <div class="buttons-list">
            <a class="btn-menu " href="">Baixe o resumo execultivo</a>
            <a class="btn-menu-video" href=""> Veja o vídeo explicativo </a>
            <a class="btn-menu" href="">Entre em contato</a>
        </div>
        <div class="buttons-list">
            <a href="<?php echo home_url(); ?>" class="a-none"><img
                    src="<?php bloginfo('template_url') ?>/img/btn-volta.svg" alt=""></a>
            <div class="comp-midias">
                <div class="icon-midias">
                    <img src="<?php bloginfo('template_url');?>/img/compartilha-info.svg" alt="">
                </div>
                <div class="icon-midias">
                    <img src="<?php bloginfo('template_url');?>/img/internet-info.svg" alt="">
                    <img src="<?php bloginfo('template_url');?>/img/twitter-info.svg" alt="">
                    <img src="<?php bloginfo('template_url');?>/img/facebook-info.svg" alt="">
                    <img src="<?php bloginfo('template_url');?>/img/instagram-2016.svg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="info-content">
        <h1 class="info-principal-title">O QUE É?</h1>
        <h2 class="info-subtitle">Descrição</h2>
        <div class="border-left">
            <p class="text-prin txt-justify">
               Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta blanditiis quas esse aliquam quam magnam 
               error vero fuga molestiae dignissimos reiciendis doloribus, magni cupiditate. Neque delectus id tempora. 
               Ea debitis nemo magni consequuntur laudantium impedit recusandae eligendi adipisci hic totam laboriosam 
               ab fuga neque nobis ipsa, possimus tempore ipsam doloremque assumenda accusantium repudiandae ipsum a 
               saepe doloribus? Libero quibusdam id commodi esse eius dolorem sint, dolorum itaque nesciunt, quidem autem 
               aliquam molestiae similique fuga dolores? Veritatis suscipit debitis totam, assumenda excepturi non quasi 
               deleniti accusamus voluptas reiciendis! Perspiciatis unde non distinctio nisi ipsum animi, placeat autem 
               aperiam corporis nam dolorum at reiciendis aliquid hic. Expedita, amet quidem. Illo aut quasi possimus quas 
               in quod, aliquam excepturi unde ipsum, vitae repudiandae sit veritatis consequatur omnis quos beatae, 
               ratione laboriosam quia asperiores error laborum. Odio quo nisi magnam aut hic, voluptates quod beatae 
               perspiciatis deserunt repudiandae itaque corporis. Ipsum facilis mollitia at expedita quas quibusdam, cumque 
               veritatis omnis unde accusamus quaerat voluptate, accusantium reiciendis nulla? Ad explicabo laborum doloribus
               cere minima modi libero sunt at totam iste debitis deserunt quis magnam, minus aliquid veritatis? Odit corrupti
                voluptas quam animi delectus accusantium, eveniet commodi eaque aliquid velit quo sequi, quae nesciunt ut vitae.
            </p>
        </div>
        <h2 class="info-subtitle">Criadores</h2>
        <div class="border-left">
            <p class="text-prin txt-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat veniam odio, consectetur tenetur sunt
                fuga quibusdam rerum eius, corrupti blanditiis facilis sint id iure in earum? At officia molestiae quod?
            </p>
        </div>
    </div>
</section>

<?php get_footer()?>