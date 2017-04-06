<?php

	function add_meta_ncm() {
	    add_meta_box( 'numero_da_ncm','Dados NCM', 'AddNcmN', 'ncm', 'side','high');
	}
	add_action( 'add_meta_boxes', 'add_meta_ncm' );

	function AddNcmN( $post ) {

	    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );

	    $post = get_post_meta($post->ID);

    ?>
<table>
		<tr>
			<td style="width: 50%;">
	        	<label for="numero_da_ncm">Número da NCM</label>
			</td>
			<td  style="width: 50%;">
       			<input type="text" name="numero_da_ncm" id="numero_da_ncm" value="<?php if ( isset ( $post['numero_da_ncm'] ) ) echo $post['numero_da_ncm'][0]; ?>" />
			</td>
		</tr>
		<tr>
			<td style="width: 50%;">
	        	<label for="descricao_da_ncm">Descrição da NCM</label>
			</td>
			<td  style="width: 50%;">
       			<input type="text" name="descricao_da_ncm" id="descricao_da_ncm" value="<?php if ( isset ( $post['descricao_da_ncm'] ) ) echo $post['descricao_da_ncm'][0]; ?>" />
			</td>
		</tr>
	</table>

    <?php }


	function prfx_meta_save( $post_id ) {
	    $is_autosave = wp_is_post_autosave( $post_id );
	    $is_revision = wp_is_post_revision( $post_id );
	    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	    if ( $is_autosave || $is_revision || !$is_valid_nonce )
	        return;
	    if( isset( $_POST[ 'numero_da_ncm' ] ) )
	        update_post_meta( $post_id, 'numero_da_ncm', sanitize_text_field( $_POST[ 'numero_da_ncm' ] ) );
	    
	     if( isset( $_POST[ 'descricao_da_ncm' ] ) )
	        update_post_meta( $post_id, 'descricao_da_ncm', sanitize_text_field( $_POST[ 'descricao_da_ncm' ] ) );
	 
	}
	add_action( 'save_post', 'prfx_meta_save' );

?>

<?php

	abstract class Meta_Box_Default
	{
	    public function __construct()
	    {
	        add_action('add_meta_boxes', array($this, 'add_meta_box'));
	        add_action('save_post', array($this, 'save'));
	    }
	}

	class Meta_Box_NCM_OBS extends Meta_Box_Default{
		public function add_meta_box(){
			add_meta_box(
                strtolower(__CLASS__)
                ,'Essa NCM Está vinculada a observação'
                ,array($this, 'render')
                ,'ncm'
				,'normal'
                ,'default'
            );
		}

		public function render($post)
		{
			get_template_part("admin/meta-box","ncm");
		}
		
		public function save($post_id)
	    {
			$data = (object) $_POST['observacao'];

			global $wpdb;
			$wpdb->update(
				'icms_posts',
				array('post_parent' => $_POST['observacao']),
				array( 'ID' => $post_id)
			);
			foreach ($data as $value) {
				update_post_meta($post_id, 'observacao', $value);
			}
	    }
	}

		class Meta_Box_OBS_NCM extends Meta_Box_Default{
		public function add_meta_box(){
			add_meta_box(
                strtolower(__CLASS__)
                ,'NCMs Com Esta Observação'
                ,array($this, 'render')
                ,'observacao'
				,'normal'
                ,'default'
            );
		}

		public function render($post)
		{
			get_template_part("admin/meta-box","obs");
		}
		
		public function save($post_id)
		{

			$data = (object) $_POST['ncm'];

			global $wpdb;

			if($data == new stdClass()):
				$wpdb->update(
					'icms_posts',
					array('post_parent' => 0),
					array('post_parent' => $post_id)
				);
				$wpdb->update(
					'icms_postmeta',
					array('meta_value' => 0),
					array('meta_value' => $post_id)
				);
			else:
				$wpdb->update(
					'icms_posts',
					array('post_parent' => 0),
					array('post_parent' => $post_id)
				);
				foreach($data as $value):
					$wpdb->update(
						'icms_posts',
						array('post_parent' => $post_id),
						array( 'ID' => $value)
					);
					update_post_meta($value, 'observacao', $post_id);
				endforeach;
			endif;
			update_post_meta($post_id, 'ncm', $data);
	    }
	}

	function call_meta_boxes()
	{
	    $classes = array(
	        'Meta_Box_NCM_OBS',
	         'Meta_Box_OBS_NCM',
	    );

	    foreach($classes as $class)
	        new $class;
	}
	
    add_action('load-post.php', 'call_meta_boxes');
    add_action('load-post-new.php', 'call_meta_boxes');
?>
