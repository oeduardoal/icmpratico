<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/pt-BR.js"></script>

<?php
	global $post;
	$selected  = (array) get_post_meta($post->ID, 'observacao', true );
	if($selected[0] == 0){

	}else{
		foreach ($selected as $key => $value) {
			$a[] = array('id' => $value, 'text' => html_entity_decode(get_the_title($value)));
		}
	}
?>

<script>
	selections = <?php echo json_encode($a); ?>;
</script>

<select name="observacao" class="input-select" id="" multiple="multiple" style="width: 100%;"></select>

<script>
	jQuery.fn.select2.defaults.set('language', 'it');
	var domain = "<?php echo get_site_url(); ?>";
	var $lista = jQuery('.input-select').select2({
		maximumSelectionLength:1,
		ajax: {
		    url: domain + "/wp-json/wp/v2/observacao",
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

