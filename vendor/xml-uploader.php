<?php

require_once '../../../../wp-load.php';

require_once '../../../../wp-admin/includes/media.php';
require_once '../../../../wp-admin/includes/file.php';
require_once '../../../../wp-admin/includes/image.php';

add_filter('upload_mimes', function ($existing_mimes=array())
{
    $existing_mimes['xml'] = 'application/xml';
    return $existing_mimes;
});

$arquivo = $_FILES['arquivo'];

if(! empty($arquivo))
{
    $pathinfo = pathinfo($arquivo['name']);

    if($pathinfo['extension'] !== 'xml')
        wp_die('Arquivo a ser carregado deve ser do tipo <b>.XML</b>');

    $moved = wp_handle_upload( $arquivo, array('test_form' => FALSE) );
    $movedPathinfo = pathinfo($moved['file']);

    if( $moved && empty($moved['error']) )
    {
        $xml = simplexml_load_file($moved['file']);

        if(! (!empty($xml->NFe->infNFe->det) && count($dets = $xml->NFe->infNFe->det)))
            wp_die('<b>.XML</b> não segue formato necessário para leitura.');

        $ncms = array();
        foreach($dets as $det)
            $ncms[$det->prod->NCM->__toString()][] = array( 'cProd' => $det->prod->cProd->__toString(), 'xProd' => $det->prod->xProd->__toString() ) ;

        if(! $ncms)
            wp_die('<b>.XML</b> vazia.');

        $inserted_id = wp_insert_post(array(
            'post_title' => $movedPathinfo['basename'],
            'post_type' => 'xml',
            'post_status' => 'publish',
        ));

        update_post_meta($inserted_id, 'nfe', $ncms);

        wp_redirect( site_url('xml?arquivo='. $movedPathinfo['basename']) ); exit;
    }
    else
    {
        wp_die("<b>Error:</b> {$movefile['error']}");
    }
}

