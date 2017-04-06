<?php

function vb_reg_new_user() {
 
    $username = $_POST['reg_user'];
    $password = $_POST['reg_pass'];
    $email    = $_POST['reg_mail'];
    $name     = $_POST['reg_user'];
    $nick     = $_POST['reg_user'];

    $estado     = $_POST['reg_estado'];
    $cidade     = $_POST['reg_cidade'];
 
    $userdata = array(
        'user_login' => $username,
        'user_pass'  => $password,
        'user_email' => $email,
        'first_name' => $name,
        'nickname'   => $nick,
    );
 
    $user_id = wp_insert_user( $userdata ) ;

    add_user_meta($user_id, "estado", $estado);
    add_user_meta($user_id, "cidade", $cidade);
 
    // Return
    if( !is_wp_error($user_id) ) {
        echo 1;
    } else {
        echo $user_id->get_error_message();
    }
  die();
 
}
 
add_action('wp_ajax_register_user', 'vb_reg_new_user');
add_action('wp_ajax_nopriv_register_user', 'vb_reg_new_user');