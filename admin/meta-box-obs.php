<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/pt-BR.js"></script>

<?php
	global $post;
	// $selected  = get_post_meta($post->ID, 'ncm', true );

	$args = array(
		'post_parent' => $post->ID,
		'post_type'   => 'ncm', 
		'numberposts' => -1
	);
	$selected = get_children( $args );
		function get_name($value){
			return wp_trim_words(get_the_title($value), 5);
		}
		foreach ($selected as $key) {
			$a[] = array('id' => $key->ID, 'text' => html_entity_decode(get_name($key->ID)));
		}

?>
<script>
	selections = <?php echo json_encode($a); ?>;
</script>

<select name="ncm[]" multiple="multiple"  class="input-select" style="width: 100%;" id=""></select>

<script>
	jQuery.fn.select2.defaults.set('language', 'it');
	var domain = "<?php echo get_site_url(); ?>";
	var $lista = jQuery('.input-select').select2({
		ajax: {
		    url: domain + "/wp-json/wp/v2/ncm",
	          dataType: 'json',
	          delay: 300,
	          data: function (params) {
	            return {
	            	search: params.term,
	            };
	         },
			processResults: function (data) {
	            return {
	                results: data
	            }
	        }
	     }
	});
	for (var d = 0; d < selections.length; d++) {
		var item = selections[d];
		var option = new Option(item.text, item.id, true, true);
		$lista.append(option);
	}

</script>