<?php
function woo_remove_hook(){
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

}
add_action( 'woocommerce_before_shop_loop', 'woo_remove_hook', 1 );