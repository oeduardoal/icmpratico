<?php get_header(); ?>
<?php get_template_part('templates/header') ?>

<section class="row">
	<section id="content" class="large-12 float-left archive archive-id-<?php the_ID(); ?>">
		<?php get_template_part("templates/breadcrumbs" ); ?>
	</section>
		<header>
			<h1><?php post_type_archive_title(); ?></h1>
		</header>
				<?php global $wp_query; $page_is = (get_query_var('paged')) ? get_query_var('paged') : 1 ; ?>
				<?php $total = $wp_query->max_num_pages;  ?>
			
			<div class="" >
				<?php while (have_posts()): the_post(); ?>
					<a href="<?php the_permalink(); ?>">
					<article class="cursos_icms large-4 medium-12 small-12 columns">
						<?php if(has_post_thumbnail()): ?>
							<div class="imageresize left" style="background-image: url(<?php echo thumbnail_default; ?>);"></div>
						<?php else: ?>
							<div class="imageresize left" style="background-image: url(<?php echo thumbnail_default; ?>);"></div>
						<?php endif; ?>
						<h4><?php the_title(); ?></h4>
						<p>
							<?php echo wp_trim_words(get_the_content(),10); ?>
						</p>
							<a class="button button-azul" href="<?php the_permalink(); ?>">LEIA MAIS</a>
					</article>
				</a>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			</div>

			<?php if ($wp_query->max_num_pages > 1) { ?>
			<div class="callout primary text-center">
				Você em está <?php echo $page_is; ?> de <?php echo $total; ?> páginas <br/>
				<?php echo get_previous_posts_link( '<i class="fa fa-arrow-left" aria-hidden="true"></i> Anterior ' ); ?>
				<?php echo get_next_posts_link( 'Próximo <i class="fa fa-arrow-right" aria-hidden="true"></i> '); ?>
			</div>
			<?php } ?>
			</section>

		

	<?php #get_sidebar(); ?>
</section>


<?php get_template_part("templates/noticias"); ?>
<?php get_template_part("templates/depoimentos"); ?>
<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	