// the next code by mahdi sahib

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
function change_existing_currency_symbol( $currency_symbol, $currency ) {
  switch( $currency ) {
    case 'IQD': $currency_symbol = '&nbsp;دينار'; break;
  }
  return $currency_symbol;
} 


add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_phone']);	
    unset($fields['billing']['billing_email']);	
    return $fields;
}


function logged_in_redirect() {
    if (
        ! is_user_logged_in() && (is_cart() || is_checkout())
    ) {
        wp_redirect(home_url( '/my-account' ));
        exit;
    }
}
add_action('template_redirect', 'logged_in_redirect');




function custom_my_account_menu_items( $items ) {
    unset($items['downloads']);
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items' );
