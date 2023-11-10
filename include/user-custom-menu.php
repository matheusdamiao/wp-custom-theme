<?php 

// menu do usuário customizado
add_filter ( 'woocommerce_account_menu_items', 'rename_editaddress' );
function rename_editaddress($menu_links){
	$menu_links['edit-address'] = 'Endereços';
    $menu_links['customer-logout'] = 'Sair';

    // Remove um item do menu
    unset($menu_links['downloads']);

    // Caso precise adicionar algum item no menu
    // $menu_links = array_slice($menu_links, 0, 5, true ) 
    // + ['certificados' => 'Certificados']
    // + array_slice($menu_links, 5, NULL, true);

	return $menu_links;
}

?>