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
					<a href="<?php the_permalink(); ?>">
						<article class="result">
							<header>
								<h5 style="text-align: left;"><?php echo get_post_meta(get_the_ID(), 'numero')[0] . " - " . get_the_title(); ?></h5>
							</header>
							<main class="cnae_main">
								<p class="numero_cnae"><b>CNAE:</b> <?php echo get_post_meta(get_the_ID(), 'numero')[0]?></p>
								<p  class="fonte_legal"><b>FONTE LEGAL: </b><?php echo get_post_meta(get_the_ID(), 'base_legal')[0]?></p>
								<p class="conteudo_cnae"><?php echo get_the_content(); ?></p>
							</main>
						</article>
					</a>
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