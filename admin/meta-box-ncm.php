<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/pt-BR.js"></script>

<select name="observacao" class="input-select" id="" multiple="multiple" style="width: 100%;">
<?php
	global $post;
	$selected  = (array) get_post_meta($post->ID, 'observacao', true );
	$all_obs = get_posts(array(
        'post_type' => 'observacao',
        'numberposts' => -1,
        'orderby' => 'post_title',
        'order' => 'ASC'
    ));

?>
<?php  $a = 0;  ?>
<?php foreach ( $all_obs as $al_obs ):?>
	<option value="<?php echo $al_obs->ID; ?>" <?php echo in_array($al_obs->ID, $selected) ? ' selected="selected"' : ''; ?>>  <?php echo $al_obs->post_title; ?></option>
	<?php $a++; ?>
<?php endforeach; ?>
</select>
<script>
	jQuery.fn.select2.defaults.set('language', 'it');
	jQuery('.input-select').select2({maximumSelectionLength: 1});
</script>

