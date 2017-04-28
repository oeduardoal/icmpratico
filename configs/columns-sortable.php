<?php

add_filter( 'manage_posts_columns', 'columns_sortable', 10, 2 );
function columns_sortable( $columns, $post_type ) {
   if ( $post_type == 'ncm' )
      $columns[ 'numero_da_ncm_column' ] = 'Release Date';
   return $columns;
}