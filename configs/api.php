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

	add_action( 'rest_api_init', function () {
	  register_rest_field( 'observacao', 'text',
	    array(
	      'get_callback'    => 'return_text_o',
	      'update_callback' => null,
	      'schema'          => null
	    )
	  );
	});

	function return_text_o( $object, $field_name, $request ) {
		return html_entity_decode(get_the_title());
	}

	##########################################################

	add_action( 'rest_api_init', function () {
		register_rest_route( 'search_ncm', '/(?P<filtro>[a-zA-Z0-9-]+)/s=(?P<s>[^*]+)', array(
		'methods' => 'GET',
		'callback' => 'my_awesome_func',
		));
	});

	function my_awesome_func($request) {
			
			global $wpdb;
			$var = html_entity_decode(($request['s']));
			$var1 = utf8_decode($var);

			// $var = html_entity_decode($var);
			// $var = utf8_decode($request['s']);

			$filtro = $request['filtro'];
			$postss = $wpdb->get_results("SELECT ID,guid,post_title FROM $wpdb->posts WHERE post_title LIKE '$var%' AND post_type = '$filtro'" );

			function nm($val){
				return html_entity_decode($val);
			}

			if($postss != null){
				foreach ($postss as $key) {
				$return[] = array(
					'id' => $key->ID,
					'url' => get_the_permalink($key->ID),
					'title' =>nm($key->post_title)
					);
				};
			}else{
				$return = [];
			}
			

			return $var1;
	}