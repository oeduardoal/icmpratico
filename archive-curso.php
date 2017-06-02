<?php get_header(); ?>
<?php get_template_part('templates/header') ?>


<section class="row expanded">
		<section id="content" class="large-12 float-left page page-id-<?php the_ID(); ?>">
			<?php get_template_part("templates/breadcrumbs"); ?>
		</section>
		<section class="large-12 columns">
			<section id="cursos_icms">
			<header>
				<h1><b>CURSOS</b> ICMS PRÁTICO</h1>
			</header>
				<div class="row" >
				<?php while (have_posts()): the_post(); ?>
					<a href="<?php the_permalink(); ?>">
					<article class="cursos_icms xlarge-3 large-4 medium-12 small-12 columns">
						<?php if(has_post_thumbnail()): ?>
							<div class="imageresize left" style="background-image: url(<?php echo thumbnail_default ?>);"></div>
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
							<label><i class="fa fa-clock-o"></i> Carga Horária: </label>
							<span><?php the_field('carga_horaria') ?></span>
						</span>					
					</article>
				</a>
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