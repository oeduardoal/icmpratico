<?php
##### PAGES #######
add_filter( 'manage_pages_columns', 'pages_columns', 2, 2);
function pages_columns($columns){
	$columns[ 'post_modified_column' ] = 'Atualizado Em';
	return $columns;

}
add_action( 'manage_pages_custom_column', 'page_column', 10, 2 );
function page_column( $sortable_columns ){
	switch( $column_name ) {
		default:
			echo '<div id="post_modified-' . $post_id . '">' . get_the_modified_date("d/m/Y g:i") . '</div>';
			break;
			
	}
}
add_filter( 'manage_edit-page_sortable_columns', 'pages_sortables_columns' );
function pages_sortables_columns( $sortable_columns ) {
	$sortable_columns[ 'post_modified_column' ] = 'post_modified';
	return $sortable_columns;
}

###################################33
add_filter( 'manage_posts_columns', 'manage_wp_posts_be_qe_manage_posts_columns', 10, 2 );
function manage_wp_posts_be_qe_manage_posts_columns( $columns, $post_type ) {

	switch ( $post_type ) {
	
		default:
		
			$new_columns = array();
			
			foreach( $columns as $key => $value ) {
			
				$new_columns[ $key ] = $value;
				if ( $key == 'title' ) {
					// $new_columns[ 'observacao_column' ] = 'Número da NCM';
					$new_columns[ 'post_modified_column' ] = 'Atualizado Em';
				}
					
			}
			
			return $new_columns;
			
	}
	
	return $columns;
	
}

add_filter( 'manage_edit-ncm_sortable_columns', 'manage_wp_posts_be_qe_manage_sortable_columns' );
function manage_wp_posts_be_qe_manage_sortable_columns( $sortable_columns ) {

	// $sortable_columns[ 'observacao_column' ] = 'observacao';
	
	$sortable_columns[ 'post_modified_column' ] = 'post_modified';

	return $sortable_columns;
	
}
add_filter( 'manage_edit-observacao_sortable_columns', 'manage_observacao_sortable' );
function manage_observacao_sortable( $sortable_columns ) {

	// $sortable_columns[ 'observacao_column' ] = 'observacao';
	
	$sortable_columns[ 'post_modified_column' ] = 'post_modified';

	return $sortable_columns;
	
}


add_action( 'manage_posts_custom_column', 'manage_wp_posts_be_qe_manage_posts_custom_column', 10, 2 );
function manage_wp_posts_be_qe_manage_posts_custom_column( $column_name, $post_id ) {

	switch( $column_name ) {
	
		case 'observacao_column':
			
			if(get_the_title(get_post_meta( $post_id, 'observacao', true ))):
				echo '<div id="observacao-' . $post_id . '">' . get_the_title(get_post_meta( $post_id, 'observacao', true )) . '</div>';
			endif;

			
			break;
			
		case 'post_modified_column':
		
			echo '<div id="post_modified-' . $post_id . '">' . get_the_modified_date("d/m/Y g:i") . '</div>';
			break;
			
	}
	
}

add_action( 'pre_get_posts', 'manage_wp_posts_be_qe_pre_get_posts', 1 );
function manage_wp_posts_be_qe_pre_get_posts( $query ) {
	if ( $query->is_main_query() && ( $orderby = $query->get( 'orderby' ) ) ) {
		switch( $orderby ) {
			case 'post_modified':
				// $query->set( 'meta_key', 'modified' );
				$query->set( 'orderby', 'modified' );
				break;
		}
	}
	
}

?>