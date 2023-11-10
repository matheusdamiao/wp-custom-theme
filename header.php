<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo(); ?> <?php wp_title('|');?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php   


$img_url = get_stylesheet_directory_uri() . '/img'; 
$cart_count = WC()->cart->get_cart_contents_count();
?>

<!-- <span id='cupom'> 30% OFF - USE O CUPOM <span> #QUEROUMAPB </span> </span> -->

<header class='header'>
    <a id='logo-deskt' href="/"><img src="<?= $img_url; ?>/icons/logo-novo-bigg.png" alt="Parrillas Beraldo"></a>
    <div class='busca'>
        <form action="<?php bloginfo('url')?>/loja/" method='get'>
            <input type="text" name='s' id='s' placeholder='Buscar' value='<?php the_search_query();?>' />
            <input type="text" name='post_type' value='product' class='hidden'>
            <input type="submit" id='searchButton' value="Buscar">
        </form>
    </div>
    <nav class='conta'>
        <div class='conta-div'>
           <a id='account' href="/minha-conta"> <img src="<?= $img_url;?>/icons/user.svg"></a>
            <a href="/minha-conta" class='minha-conta'> Minha conta</a>
        </div>
        
         <a id='logo-mobilee' href="/"><img src="<?= $img_url; ?>/logo-parrillas.svg" alt="Parrillas Beraldo"></a>
        
        <div class='carrinho-div'>
           <a id='mobile-cart' href="/carrinho"> 
                <img src="<?= $img_url;?>/icons/cart.svg"> 
                 <?php if($cart_count) { ?>
                    <span class='carrinho-count'><?= $cart_count; ?></span>
                    <?php } ?>
            </a>

            <a href="/carrinho" class='carrinho'> 
                    <img src="<?= $img_url;?>/icons/cart.svg"> 
                    <p>Carrinho</p>
                    <?php if($cart_count) { ?>
                    <span class='carrinho-count'><?= $cart_count; ?></span>
                    <?php } ?>
            </a>
         </div>

    </nav>
</header>


<?php 
wp_nav_menu( ([
    'menu' => 'categorias',
    'container' => 'nav',
    'container_class' => 'menu-categorias'
]) )

?>