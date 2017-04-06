<?php

	##########################################################

	add_action( 'rest_api_init', function () {
	  register_rest_field( 'ncm', 'NCM',
	    array(
	      'get_callback'    => 'return_ncm',
	      'update_callback' => null,
	      'schema'          => null
	    )
	  );
	});

	function return_ncm( $object, $field_name, $request ) {
		return array(
				'numero_da_ncm' => get_post_meta(get_the_ID(), 'numero_da_ncm')[0],
				'descricao_da_ncm' => get_post_meta(get_the_ID(), 'descricao_da_ncm')[0],
				'observacao_id' => get_post_meta(get_the_ID(), 'observacao')[0],
			);
	}
	##########################################################

	add_action( 'rest_api_init', function () {
	  register_rest_field( 'observacao', 'NCMS',
	    array(
	      'get_callback'    => 'return_obs',
	      'update_callback' => null,
	      'schema'          => null
	    )
	  );
	});

	function return_obs( $object, $field_name, $request ) {
		return array(
				'ncms_cadastradas' => get_post_meta(get_the_ID(), 'ncm')[0],
			);
	}

	##########################################################

	add_action( 'rest_api_init', function () {
	  register_rest_field( 'ncm', 'text',
	    array(
	      'get_callback'    => 'return_text',
	      'update_callback' => null,
	      'schema'          => null
	    )
	  );
	});

	function return_text( $object, $field_name, $request ) {
		return html_entity_decode(get_the_title());
	}