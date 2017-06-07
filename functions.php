<?php
	
	ini_set('memory_limit', '2048M');


	// No FTP
	define('FS_METHOD', 'direct');

	# Require
	####################################################
	// Mail
	require_once "mail/mail.php";
	// Configs
	foreach(glob(get_template_directory() . "/configs/*.php") as $filename)
    require_once $filename;

    require_once get_template_directory() . "/vendor/PHPExcel.php";

	####################################################
	
	// CONSTANTES
	DEFINE('assetsurl', get_template_directory_uri());
	DEFINE('thumbnail_default', get_template_directory_uri() . "/assets/img/padrao-thumbnail.jpg");
	function assetsurl(){ return get_template_directory_uri(); }

	####################################################
	
	function load_assets() {
		//  Foundation
		wp_enqueue_style( 'style_foundation', assetsurl() . '/lib/foundation/css/foundation.min.css');
		wp_enqueue_script( 'script_foundation',  'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.js', array('jquery'));

		// wp_enqueue_script( 'script_foundation_core',  'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.core.min.js', array('script_foundation'));

		wp_enqueue_script( 'script_foundation_sticky',  'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.sticky.min.js', array('jquery', 'script_foundation'));

		wp_enqueue_script( 'script_foundation_util_trigger',  'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.triggers.js', array('jquery', 'script_foundation', 'script_foundation_core'));

		// wp_enqueue_script( 'script_foundation_util_media',  'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.mediaQuery.min.js', array('jquery', 'script_foundation', 'script_foundation_core'));

		wp_enqueue_script( 'script_foundation_abide',  'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.abide.min.js', array('jquery', 'script_foundation'));

		

		// wp_enqueue_style( 'owl_css_2', assetsurl() . '/lib/owl/owl.theme.css');
		// wp_enqueue_style( 'owl_css_2', assetsurl() . '/lib/owl/owl.transition.css');
		// wp_enqueue_style( 'owl_css_1', assetsurl() . '/lib/owl/owl.carousel.css');
		// wp_enqueue_script( 'owl_js',  assetsurl() . '/lib/owl/owl.carousel.js', array('jquery'), '', true);

		// wp_deregister_script('jquery');
		// wp_register_script('jquery', assetsurl() . '/lib/owl-beta/vendors/jquery.min.js' ,'','', true);
		// wp_enqueue_script('jquery', assetsurl() . '/lib/owl-beta/vendors/jquery.min.js' ,'','', true);

		wp_enqueue_style( 'owl_css_1', assetsurl() . '/lib/owl-beta/assets/owl.carousel.css');
		wp_enqueue_style( 'owl_css_2', assetsurl() . '/lib/owl-beta/assets/owl.theme.default.min.css');
		wp_enqueue_script( 'owl_js',  assetsurl() . '/lib/owl-beta/owl.carousel.js', array('jquery'), '',true);


			
		
		// Lightbox
		// wp_enqueue_style( 'style_lightbox', assetsurl() . '/lib/lightbox/css/lightbox.min.css');
		// wp_enqueue_script( 'script_lightbox',  assetsurl() . '/lib/lightbox/js/lightbox.min.js', array('jquery'), '',true);

		// Pace
		wp_enqueue_style('style_loader', assetsurl() . '/lib/pace/pace.min.css' );
		wp_enqueue_script( 'script_loader', assetsurl() . '/lib/pace/pace.min.js' );
		
		// 
		wp_enqueue_script( 'script_nice', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js',array('jquery'));

		// Angular CDN
		wp_enqueue_script('angular', "https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js");
		wp_enqueue_script('angular_route', "https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.4.2/angular-ui-router.js");

		// My LIB
		wp_enqueue_script( 'my_jq',  assetsurl() . '/assets/js/m/jq.min.js');
		wp_enqueue_script( 'my_ng',  assetsurl() . '/assets/js/m/ng.min.js');
		wp_enqueue_style( 'my_css', assetsurl() . '/assets/css/main.min.css');

		// Block
		if(!current_user_can('administrator')):
			wp_enqueue_script( 'block_script',  assetsurl() . '/assets/js/m/block.js',array('jquery'));
		endif;


		// // Angular
		// wp_enqueue_script( 'my_main', assetsurl() . '/assets/js/main.js',array('angular', 'angular_route'));
		// wp_enqueue_script( 'configs', assetsurl() . '/assets/js/configs.js',array('my_main'));
		// wp_enqueue_script( 'services', assetsurl() . '/assets/js/services.js',array('my_main'));
		// wp_enqueue_script( 'controllers', assetsurl() . '/assets/js/controllers.js',array('my_main'));

		wp_localize_script(
		'my_main',
		'myLocalized',
			array(
				'partials' => trailingslashit( get_template_directory_uri() ) . 'view/'
				)
		);

		
	}
	add_action( 'wp_enqueue_scripts', 'load_assets' );

	####################################################

	function register_my_menus() {
		register_nav_menus(
			array(
			  'sub-menu' => __( 'Sub Menu' )
			)
		);
		register_nav_menus(
			array(
			  'header-menu' => __( 'Header Menu' )
			)
		);
		register_nav_menus(
			array(
			  'sidebar-menu' => __( 'Sidebar Menu' )
			)
		);
		register_nav_menus(
			array(
			  'menurodape1' => __( 'Menu Rodapé 1' )
			)
		);
		register_nav_menus(
			array(
			  'menurodape2' => __( 'Menu Rodapé 2' )
			)
		);
		register_nav_menus(
			array(
			  'menurodape3' => __( 'Menu Rodapé 3' )
			)
		);
		
	}
	add_action( 'init', 'register_my_menus' );

	####################################################
	
	// Registro das suas widgets
	if ( function_exists('register_sidebar') ){
	    register_sidebar(array(
	        'name' => __( 'Widget 1'),
	        'id' => 'widget-1',
	        'description' => __( ''),
	        'before_title' => '<h1>',
	        'after_title' => '</h1>',
	    ) );
	}

	####################################################
	function get_menu_obj( $location ) {
	    if( empty($location) ) return false;

	    $locations = get_nav_menu_locations();
	    if( ! isset( $locations[$location] ) ) return false;

	    $menu_obj = get_term( $locations[$location], 'nav_menu' );

	    return $menu_obj;
	}
	####################################################
	
	// Tamanho da largura das imagens.
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 480, 350, true );
		
	}

	// CORS
	add_filter('allowed_http_origins', 'add_allowed_origins');
	function add_allowed_origins($origins) {
	    $origins[] = '*';
	    return $origins;
	}
	
	function my_allow_meta_query( $valid_vars ) {
		$valid_vars = array_merge( $valid_vars, array( 'meta_key', 'meta_value' ) );
		return $valid_vars;
		}
	add_filter( 'rest_query_vars', 'my_allow_meta_query' );



function search_filter($query) {
    if ($query->is_search) {
    	
	    
	    add_filter( 'posts_where', function ( $where, \WP_Query $q )  {
		    if( ! is_admin() && $q->is_main_query() && $q->is_search()) {

		    	$filtro = @$_GET['filtro'];

				$s = @$_GET['s'];
				$var2 = urldecode($s);
				$var = preg_replace('/\./', '', $var2);

				if(is_numeric($var)):

					if($filtro == "ncm"){
						
						// Resolve o problema porque o numero está no título...

						$where = " AND post_title LIKE '$var%'";

						// OBS
						// $where .= " AND post_parent <> 0";


					}elseif($filtro == "cnae"){

						
						add_filter( 'posts_join', function($join){
							$join .= 'INNER JOIN icms_postmeta ON icms_posts.ID = icms_postmeta.post_id';
							return $join;
						});

						$where = " AND icms_postmeta.meta_key = 'numero'";
						$where .= " AND icms_postmeta.meta_value LIKE '$var%'";
						$where .= " AND icms_posts.post_type = 'cnae'";
						
					};
					
					if($filtro == "ncm"):
						// $where .= " AND post_parent <> 0";
						$where .= " AND post_type = 'ncm'";
					elseif($filtro == 'cnae'):
						$where .= " AND post_type = 'cnae'";
					elseif($filtro == 'post'):
						$where .= "AND icms_posts.post_type IN ('post', 'page','observacao', 'artigo', 'cnae', 'forum', 'professor', 'legislacao')";
					endif;

				else:

					// Para letras ...
					$where = " AND post_title LIKE '%$var%' ";

					// E ainda, para mostrar apenas as ncms com o post_parent, ou seja vinculadas...
					if(@$_GET['filtro'] == 'ncm'):
						// $where .= " AND post_parent <> 0";
						$where .= " AND post_type = 'ncm'";
					elseif($filtro == 'cnae'):
						$where .= " AND post_type = 'cnae'";
					elseif($filtro == 'post'):
						$where .= "AND icms_posts.post_type IN ('post', 'page','observacao', 'artigo', 'cnae', 'forum', 'professor', 'legislacao')";
					endif;

				endif;

		    }

		    return $where;
		}, 10, 2 );

		
					$query->set('orderby', "post_title");
					$query->set('order', "asc");
	    
		// add_filter( 'posts_request', function($request){
		// 	echo $request;
		// });
    }
}
add_action('pre_get_posts','search_filter');
