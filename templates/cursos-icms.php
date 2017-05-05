<section id="cursos-icms" class="hide-for-small-only">
	<header>
		<h1><b>CURSOS</b> ICMS PRÁTICO</h1>
	</header>
		<div class="row owl-carousel owl-theme" id="slider-cursos">
			<?php $argsc = array('post_type' => 'curso', 'posts_per_page' => 4); ?>
			<?php $cursos = new WP_Query($argsc); ?>
			<?php
				while($cursos->have_posts()):
				$cursos->the_post();
			?>
					<article class="cursos_icms item large-12 medium-12 small-12 columns">
			<a href="<?php the_permalink(); ?>">
						<?php if(has_post_thumbnail()): ?>
							<div class="imageresize left" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);"></div>
						<?php else: ?>
							<div class="imageresize left" style="background-image: url(<?php echo thumbnail_default; ?>);"></div>
						<?php endif; ?>
						<h4><?php the_title(); ?></h4>
						<p>
							<?php echo wp_trim_words(get_the_content(), 15); ?>
						</p>
						<hr>
						<span>
							<label><i class="fa fa-calendar"></i> Periodo: </label>
							<label><?php the_field('periodo') ?> </label>
							<label><i class="fa fa-clock-o"></i> Carga Horária: <?php the_field('carga_horaria') ?> </label>
						</span>					
				</a>
					</article>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

		</div>
		<footer>
			<a href="<?php bloginfo('siteurl') ?>/curso">
				<button class="button button-amarelo ver-todos">
					VISUALIZAR TODOS
				</button>
			</a>
		</footer>
	
</section>