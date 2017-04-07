<section id="cursos-icms">
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
				<article class="columns item">
					<a href="<?php the_permalink(); ?>">

					<div class="left">
						<label class="periodo">Periodo</label>
						<label class="data"><?php the_field('periodo') ?> </label>
						<label for="carga" class="carga-horaria">Carga Horária</label>
						<span class="carga" id="carga"><?php the_field('carga_horaria') ?></span>
					</div>
					<div class="right">
						<header>
							<h4><?php the_title(); ?></h4>
						</header>
						<main>
							<p>
								<?php echo wp_trim_words(get_the_content(), 15); ?>
							</p>
						</main>
						<a href="<?php the_permalink(); ?>">
							<button class="button button-azul">MAIS INFORMAÇÕES</button>
						</a>
					</div>
				</a>
				</article>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

		</div>
		<a href="<?php bloginfo('siteurl') ?>/curso">
			<button class="button button-amarelo ver-todos">
				VISUALIZAR TODOS
			</button>
		</a>
</section>