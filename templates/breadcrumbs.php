<?php
	if ( function_exists('yoast_breadcrumb')) {
	  yoast_breadcrumb('<section class="large-12 small-12 medium-12 columns" id="breadcrumbs">','</section>');
	}
?>

<?php if(!is_archive() && !is_page('noticias-e-destaques')): ?>
<div class="row print">
	<button class="button button-print" type="button" onclick="window.print()">
		<i class="fa fa-print"></i>
	</button>
</div>
<?php endif; ?>
