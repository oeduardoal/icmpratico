<div class="" style="margin-top: 1rem;">
<header style="text-align: left;">
	<h6 style="color: #01619e">
		<b>PARCEIROS</b> ICMS PRÁTICO
	</h6>
</header>
	<section class="slider-parceiros-propaganda  owl-carousel owl-theme">
		<?php $argsc = array('post_type' => 'parceiro', 'posts_per_page' => 10); ?>
			<?php $cursos = new WP_Query($argsc); ?>
			<?php
				while($cursos->have_posts()):
				$cursos->the_post();
			?>
				<div class="imageresize" style="background-image: url(<?php the_post_thumbnail_url('full') ?>);height: 10rem"></div>
		<?php endwhile; ?>
	</section>

</div>