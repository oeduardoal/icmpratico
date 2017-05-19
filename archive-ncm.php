<?php get_header(); ?>
<?php get_template_part('templates/header') ?>

<section class="row expanded">
	<section id="content" class="large-12 float-left archive archive-id-<?php the_ID(); ?>">
		<?php get_template_part("templates/breadcrumbs" ); ?>
	</section>
		<header>
			<h1><?php post_type_archive_title(); ?></h1>
		</header>
				<?php global $wp_query; $page_is = (get_query_var('paged')) ? get_query_var('paged') : 1 ; ?>
				<?php $total = $wp_query->max_num_pages;  ?>

			<section id="articles">


				<?php while (have_posts()): the_post(); ?>
					<ul class="accordion" data-accordion data-allow-all-closed="true">
					<li class="accordion-item" data-accordion-item>
						<a href="<?php the_permalink(); ?>" class="accordion-title"><?php the_title(); ?></a>
					</li>
				</ul>
			<?php endwhile;?>

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


<?php #get_template_part("templates/noticias"); ?>
<?php #get_template_part("templates/depoimentos"); ?>
<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	