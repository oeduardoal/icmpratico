<section id="parceiros">
	<header>
		<h1>
			<b>PARCEIROS</b> ICMS PRÁTICO
		</h1>
	</header>
	<button class="btn-nav btn-left">
			<i class="fa fa-angle-left" aria-hidden="true"></i>
		</button>
		<button class="btn-nav btn-right">
			<i class="fa fa-angle-right" aria-hidden="true"></i>
		</button>
	<section class="parceiros slider-parceiros">
		<?php $argsc = array('post_type' => 'parceiro', 'posts_per_page' => 1000); ?>
			<?php $cursos = new WP_Query($argsc); ?>
			<?php
				while($cursos->have_posts()):
				$cursos->the_post();
			?>
			<article class="parceiro item">
				<div class="imageresize" style="background-image: url(<?php the_post_thumbnail_url('full') ?>);"></div>
			</article>
		<?php endwhile; ?>
	</section>
</section>