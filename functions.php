<?php 

function add_woocommerce_suppoort_manually(){
    add_theme_support( 'woocommerce');
}

add_action('after_setup_theme', 'add_woocommerce_suppoort_manually');


//registrar o arquivo style como css para as paginas
function add_css_style(){
    wp_register_style( 'style', get_template_directory_uri() . '/style.css', [], '1.0.0', false );
    wp_enqueue_style('style');
}

add_action('wp_enqueue_scripts', 'add_css_style');


function tiny_slider(){
    wp_enqueue_style('tiny_slider_css', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css');
    wp_enqueue_script('tiny_slider_js', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', array(), '2.9.2', array(
        'in_footer' => true,
        'strategy'  => 'async',
    ));
  
}
add_action('wp_enqueue_scripts', 'tiny_slider');

function tiny_slider_scripts(){
    wp_enqueue_script('js-file', get_template_directory_uri() . '/js/tiny-slider-custom.js');
}
add_action('wp_enqueue_scripts', 'tiny_slider_scripts');



//adiciona qualquer coisa antes da descrição do produto
function add_before_product(){
    echo "algo aqui";
}
add_action('woocommerce_before_single_product', 'add_before_product');


function custom_images(){
    add_image_size( 'slide', 1000, 800, ['center', 'top'] );
    update_option( 'medium_crop', 1);
}

add_action('after_setup_theme', 'custom_images');

// exibe 4 produtos no loop de produtos da home
function six_products() {
    return 4;
}
add_filter('loop_shop_per_page', 'six_products');


function remove_some_body_classes($classes){
    $woo_class = array_search('woocommerce', $classes);
    $woopage_class = array_search('woocommerce-page', $classes);
    $search = in_array('archive', $classes) || in_array('product-template-default', $classes);
    if($woo_class && $woopage_class && $search){
        unset($classes[$woo_class]);
        unset($classes[$woopage_class]);

    }
    return $classes;
}
// remove algumas classes do woocommerce das paginas de arquivo e pagina de produto
add_filter('body_class','remove_some_body_classes');

include(get_template_directory() . '/include/product-list.php');


 ?>


<?php 





?>


<?php

include(get_template_directory() . '/include/user-custom-menu.php');
include(get_template_directory() . '/include/checkout-customizado.php');


// function to add a custom field inside the order that corresponds to the billing present new input inside checkout 
// customizado 
function show_admin_custom_checkout_presente($order){
    $presente = get_post_meta($order->get_id(), '_billing_presente', true);
    echo 'Embalagem para presente: ' . $presente;
};
add_action('woocommerce_admin_order_data_after_shipping_address', 'show_admin_custom_checkout_presente');

// create an endpoint to certificados inside customer menu item
// add_action('init', 'add_endpoint');
// function add_endpoint() {
//     add_rewrite_endpoint( 'certificados', EP_PAGES );
// }

// add its content to the new endpoint
// add_action('woocommerce_account_certificados_endpoint', 'show_certificates' );
// function show_certificates(){
//     echo "<p>Esses são os seus certificados</p>";
// }



?>