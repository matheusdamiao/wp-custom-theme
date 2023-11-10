
<?php get_header(); ?>

<?php if(have_posts()) { while(have_posts()) { the_post(); ?>

<h1 class='titulo'> <?= the_title() ?></h1>
<main class='container container-index'> <?= the_content() ?></main>

<?php } } else { ?>
    <div class='container'>

    <h2>A página solicitada não existe :(</h2>
    
    </div>
    <?php } ?>

<?php get_footer(); ?>


    



