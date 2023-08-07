<?php 

function ajax_form_scripts() {
	$translation_array = array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    );
    wp_localize_script( 'main', 'cpm_object', $translation_array );
}
add_action( 'wp_enqueue_scripts', 'ajax_form_scripts' );

// THE AJAX ADD ACTIONS
add_action( 'wp_ajax_set_form', 'set_form' );    //execute when wp logged in
add_action( 'wp_ajax_nopriv_set_form', 'set_form'); //execute when logged out

?>