<?php get_header(); ?>
<?php get_template_part('templates/header') ?>


<section class="row expanded">
		<section id="content" class="large-12 float-left page page-id-<?php the_ID(); ?>">
			<?php get_template_part("templates/breadcrumbs"); ?>
		</section>
		<section class="large-12 columns">
			<section id="cursos-icms">
			<header>
				<h1><b>CURSOS</b> ICMS PRÁTICO</h1>
			</header>
				<div class="row" >
				<?php while (have_posts()): the_post(); ?>
					<article class="large-6 medium-6 small-12 float-left">
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
					</article>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			</div>
			</section>
		</section>
</section>

<?php get_template_part("templates/noticias"); ?>
<?php get_template_part("templates/depoimentos"); ?>
<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	