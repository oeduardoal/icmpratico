<?php

function getHierarquiaNCM($postID)
{
    $ncms = array();

    $ncms[] = $post = get_post($postID);
    $ncmID = get_post_meta($post->ID, 'numero_da_ncm', true);

    $split = str_split($ncmID);

    for($i = 1; $i <= count($split); $i++)
    {
        $ncmID = implode('', array_slice($split, 0, count($split) - $i));

        if(strlen($ncmID) !== 3)
        {
            if(strlen($ncmID) < 2)
                break;

            $query = new WP_Query(array(
                'post_type'  => 'ncm',
                'posts_per_page' => 1,
                'meta_key'   => 'numero_da_ncm',
                'orderby'    => 'meta_value_num',
                'order'      => 'ASC',
                'meta_query' => array(
                    array(
                        'key'     => 'numero_da_ncm',
                        'value'   => $ncmID,
                    ),
                ),
            ));

            if($posts = $query->get_posts())
                $ncms[] = $posts[0];
        }
    }

    return $ncms;
}

function getHierarquiaTitulo($postID, $separator = ' <br/> ')
{
    $ncms = getHierarquiaNCM($postID);

    $titles = array();
    foreach($ncms as $ncm):
        $titles[] = array(
            'ncm_title' => $ncm->post_title,
            'guid'      => $ncm->guid
            );
    endforeach;

    $var = array_reverse($titles);
    $a=0;
    foreach ($var as $key) {
            echo "<li class='accordion-item item-ncm-" . $a . "' data-accordion-item>";
                echo "<span class='accordion-title'>" . $key['ncm_title'] . "</span>";
            echo "</li>";
        $a++;
    }
        
}
