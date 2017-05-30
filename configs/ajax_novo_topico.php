<?php

function novo_topico() {
 
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $postdata = array(
        'post_title'    => $titulo,
        'post_content'    => $descricao,
        'post_status'   => 'publish',
        'post_type' => 'forum'
    );
 
    $post_id = wp_insert_post($postdata);

    if( !is_wp_error($post_id) ) {
        echo 1;
    } else {
        echo $post_id->get_error_message();
    }
  die();
 
}
 
add_action('wp_ajax_nopriv_novo_topico', 'novo_topico');
add_action('wp_ajax_novo_topico', 'novo_topico');