
<?php 
 // Template name: Contato
get_header(); ?>

<?php if(have_posts()) { while(have_posts()) { the_post(); ?>

<h1 class='titulo'> <?= the_title() ?></h1>
<main class='container container-index'> <?= the_content() ?>

    <h2>Endereço: ...</h2>
</main>

<?php } } else { ?>
    <div class='container'>

    <h2>A página solicitada não existe :(</h2>
    
    </div>
    <?php } ?>

<?php get_footer(); ?>

