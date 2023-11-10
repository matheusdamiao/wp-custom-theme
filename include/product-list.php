<?php

function format_products($products, $img_size){
    $products_final = [];
    foreach($products as $product){
        $products_final[] = [
            'name' => $product->get_name(),
            'price' => $product->get_price(),
            'link' => $product->get_permalink(),
            'description' => $product->get_short_description(),
            'img' => wp_get_attachment_image_src($product->get_image_id(), $img_size )[0],
        ];
    }
    return $products_final;
};



function homepage_product_list($products){ ?>
    <ul class='products-list'>
    
            <?php foreach($products as $product){ ?>
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
       
    </ul>
   

<?php } ?>