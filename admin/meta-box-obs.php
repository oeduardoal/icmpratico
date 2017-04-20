<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/pt-BR.js"></script>

<!-- <select name="ncm[]" class="input-select" id="s" multiple="multiple" style="width: 100%;">
</select> -->
<?php
			global $post;
			$selected  = get_post_meta($post->ID, 'ncm', true );
			$all_ncms = get_posts(array(
		        'post_type' => 'ncm',
                'posts_per_page' => 100
		    ));

?>


<select name="ncm[]" class="input-select" id="" multiple="multiple" style="width: 100%;">
<?php #foreach ( $all_ncms as $al_obs ): ?>
	<option value="<?php #echo $al_obs->ID; ?>"<?php #echo $al_obs->post_parent == $post->ID ? 'selected' : ''; ?>>  <?php #echo $al_obs->post_title; ?> </option>
<?php #endforeach; ?>
</select>



<script>
	jQuery.fn.select2.defaults.set('language', 'it');
	jQuery('.input-select').select2({
		ajax: {
		    url: "http://192.168.2.250/icms/wp-json/wp/v2/ncm",
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
	        },
	         cache: true
	     }
	});

</script>

