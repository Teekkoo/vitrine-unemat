<?php
    /*
    Template Name: card-noticias
    Template Post Type: events
    */ 
?>
<?php 
    get_header();
    include('menu.php');
 
    if(have_posts()): while(have_posts()): the_post();
?>
<section class="section-info container d-flex">
    <div class="info-content">
        <h1 class="info-principal-title txt-cent"><?php the_title() ?></h1>
        <div class="my-content text-prin txt-justify">
            <div class="thumb-noticias">
                <?php the_post_thumbnail()?>
            </div>
            <?php the_content()?>
        </div>
    </div>
</section>
<?php 
    endwhile; endif
?>

<?php 
    get_footer();
?>