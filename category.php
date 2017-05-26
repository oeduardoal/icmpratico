<?php get_header(); ?>
<?php get_template_part('templates/header') ?>

<section class="row">
	<section id="content" class="large-12 float-left category category-id-<?php the_ID(); ?>">
		<?php get_template_part("templates/breadcrumbs" ); ?>
	</section>

		<?php while (have_posts()): the_post(); ?>

			<div class="" >
				<?php while (have_posts()): the_post(); ?>
					<a href="<?php the_permalink(); ?>">
					<article class="cursos_icms large-4 medium-12 small-12 columns">
						<?php if(has_post_thumbnail()): ?>
							<div class="imageresize left" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);"></div>
						<?php else: ?>
							<div class="imageresize left" style="background-image: url(<?php echo thumbnail_default; ?>);"></div>
						<?php endif; ?>
						<h4><?php the_title(); ?></h4>
						<p>
							<?php echo wp_trim_words(get_the_content(), 10); ?>
						</p>
						<a class="button button-azul" href="<?php the_permalink(); ?>">LEIA MAIS</a>
					</article>
				</a>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			</div>

		<?php endwhile; ?>


</section>


<?php get_template_part("templates/depoimentos"); ?>
<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	