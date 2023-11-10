
<?php 
 // Template name: Home
get_header(); 



$products_slide = wc_get_products([
    'limit' => 3,
    'tag' => ['slide'],
    // in case you dont want to show the product when theres no stock
    // 'stock_status' => 'instock'
]);


$products_new = wc_get_products([
    'limit' => 6,
    'orderby' => 'date',
    'order' => 'DESC',
]);

$products_sales = wc_get_products([
    'limit' => 6,
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
]);

$data = [];


$data['slide'] = format_products($products_slide, 'slide');
$data['lancamentos'] = format_products($products_new, 'medium');
$data['vendas'] = format_products($products_sales, 'medium');

get_page_by_path('home')->ID; // pega o id da página tbm
$home_id = get_the_ID();  // id da página
$categoria_esquerda = get_post_meta($home_id, 'categoria_esquerda', true);
$categoria_direita = get_post_meta($home_id, 'categoria_direita', true);
$categoria_meio = get_post_meta($home_id, 'categoria_meio', true);
$categoria_fish_camping = get_post_meta($home_id, 'fish-camping', true);
$categoria_pb_bancada = get_post_meta($home_id, 'pb-bancada', true);
$categoria_pb_alvenaria = get_post_meta($home_id, 'pb-alvenaria', true);



function get_product_category_data($category){
    $categoria = get_term_by('slug', $category, 'product_cat');  // WP Term Object
    $categoria_id = $categoria->term_id;
    $img_id = get_term_meta($categoria_id, 'thumbnail_id', true);
    $img_categoria = wp_get_attachment_image_src($img_id, 'slide')[0];
    return [
        'name' => $categoria->name,
        'id' => $categoria_id,
        'link' => get_term_link($categoria_id, 'product_cat'),
        'img' => wp_get_attachment_image_src($img_id, 'slide')[0],
        'description' => $categoria->description,
    ];
}

$data['categorias']['fish-camping'] = get_product_category_data($categoria_fish_camping);
$data['categorias']['categoria_meio'] = get_product_category_data($categoria_meio);
$data['categorias']['categoria_esquerda'] = get_product_category_data($categoria_esquerda);
$data['categorias']['categoria_direita'] = get_product_category_data($categoria_direita);
$data['categorias']['pb-bancada'] = get_product_category_data($categoria_pb_bancada);
$data['categorias']['pb-alvenaria'] = get_product_category_data($categoria_pb_alvenaria);







?>



<?php if(have_posts()) { while(have_posts()) { the_post(); ?>




<!-- <section class='slide-wrapper'>
    <ul class='slide'>
      
    </ul>

</section> -->
<section id='hero' style="background: black">
    <?php 

  
    $img_url = get_stylesheet_directory_uri() . '/img'; 
    ?>
    <div class='my-slider'>
         <div><img  style='width: 100%' src="<?= $img_url; ?>/teste-maior.webp" alt="Parrillas Beraldo"/></div>
        <div><img   style='width: 100%' src="<?= $img_url; ?>/cliente-7.webp" alt="Parrillas Beraldo"/></div> 
         <div> <img style='width: 100%' src="<?= $img_url; ?>/hero-mobile-1.webp" alt="Parrillas Beraldo"/></div>
    </div>
    

    <div class='my-slider-desktop'>
        <div> <img style='width: 100%' src="<?= $img_url; ?>/hero-bg.webp" alt="Parrillas Beraldo"/></div>
        <div>  <img style='width: 100%' src="<?= $img_url; ?>/bg-parrillas-2.webp" alt="Parrillas Beraldo"/> </div>
    </div>
    <div id='customize-controls'>
         <li><img  src="<?= $img_url; ?>/icons/arrow-2.svg" alt=""></li>
           <li><img  src="<?= $img_url; ?>/icons/arrow-2.svg" alt=""></li>
    </div>
</section>



<ul class='vantagens'>
    <li> Até 12x no cartão </li>
    <li> Produto personalizado </li>
    <li> Envio para o Brasil todo </li>
</ul>


<section class='container'>
    <h1 class='subtitulo'> Lançamentos</h1>

        <div class='slider-produtos'>
            <?php foreach($data['lancamentos'] as $product){ ?>
                <li class='product-item'>
                    <a href="<?= $product['link'];?>">
                        <div class='product-info'>
                            <img src='<?= $product['img'];?>' alt='<?= $product['name'];?>' />
                            <h2><?= $product['name'];?>  </h2>
                            <span>R$ <?= $product['price'];?>,00</span>
                            <h4 class='description-product' ><?= $product['description'];?></h4>
                        </div>
                        <div class='product-overlay'>
                            <span class='btn-link'>Ver Mais </span>
                        </div>
                    </a>
                
                </li>
            <?php } ?>
        </div>

</section>

<section class='container'>
    <h1 class='subtitulo'> Mais vendidos</h1>
    <?php homepage_product_list($data['vendas']); ?>
</section>



<section class='wrapperr' style="background: #1D1D1D">

    <div class='image'>
        <?php $img_url = get_stylesheet_directory_uri() . '/img'; ?>
        <a href="/"><img style='' src="<?= $img_url; ?>/parrilla-artesanal.webp" alt="Parrillas Beraldo"></a>
    </div>

    <div class='text-artesanal'>
        <div>
            <h4>Modelo Artesanal</h4>
            <h2>Sua Parrilla com a sua cara</h2>
        </div>
        <p>Envie um desenho, brasão ou nome e nós personalizamos sua parrilla. Todas as Parillas Beraldo são feitas sob medida pra você.</p>
        <a href='/loja'>Escolher meu modelo</a>
    </div>
</section>


<div class='container'>
    <h1 class='subtitulo'>Conheça nossos modelos</h1>
</div>
<section class='categorias-home'>

    <div class="slider-categorias">
        <?php foreach($data['categorias'] as $categoria) { ?>
            <div>
                <a class='a-cat' href="<?= $categoria['link']?>">
                    <img src="<?= $categoria['img'] ?>" alt="<?= $categoria['name'] ?>">
                    <span class='btn-link btn-cat'><?= $categoria['name'] ?></span>
                    <span class='cat-description'> <?= $categoria['description'] ?> </span>
                </a>
            </div>
        <?php } ?>   
     </div>
     <div id='customize-controls-categorias'>
        <li><img  src="<?= $img_url; ?>/icons/arrow-black.svg" alt=""></li>
        <li><img  src="<?= $img_url; ?>/icons/arrow-black.svg" alt=""></li>
     </div>

</section>


<section class='wrapperr-clientes' style="background: #FFFFF">

  
   <div class='wrpp'>
    <?php $img_url = get_stylesheet_directory_uri() . '/img'; ?>
            <div class='wrpp-slide'>
                <div class='slider-clientess'>
                
                    <div> <img src="<?= $img_url; ?>/cliente-1.webp" alt=""></div>
                    <div>  <img src="<?= $img_url; ?>/cliente-2.webp" alt=""></div>
                    <div>   <img src="<?= $img_url; ?>/cliente-3.webp" alt=""></div>
                    <div>  <img src="<?= $img_url; ?>/cliente-4.webp" alt=""></div>
                    <div>  <img src="<?= $img_url; ?>/cliente-5.webp" alt=""></div>
                    <div> <img src="<?= $img_url; ?>/cliente-6.webp" alt=""></div>
                    <div> <img src="<?= $img_url; ?>/cliente-7.webp" alt=""></div>


                </div>
                <div id='customize-controls-clientes'>
                    <li></li>
                    <li></li>
                </div>

         
             </div>
        
        <div class='text'>
            <div>
                <h2>REGISTROS DOS NOSSOS CLIENTES</h2>
            </div>
            <p>Aqui o teste real é feito à fogo, lenha e muita carne! As Parrillas Beraldo são extremamente resistentes e tem modelo ideal para todas as ocasiões: na praia, na cachoeira, no campo, no quintal de casa ou até na sua bancada.</p>
            <a href='/loja'>Escolher meu modelo</a>
        </div>

    </div>
</section>


<section class='cupom-wrapper'>
        <img src="<?= $img_url ?>/cupom-section-bg.webp" alt="">
        <div class='cupom-text'>
            <h2>GANHE 30% DE DESCONTO <br><span>NA SUA PRIMEIRA COMPRA NO SITE</span> </h2>
            <span></span>
            <h3>USE O COM O CUPOM #QUEROUMAPB </h3>
            <a href='/loja'>ESCOLHER MEU MODELO</a>
        </div>

</section>
   



    

<?php } } else { ?>
    <div class='container'>

    <h2>A página solicitada não existe :(</h2>

    </div>
    <?php } ?>

<?php get_footer(); ?>