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
							<h5 style="text-align:left;"><?php the_title(); ?></h5>
						</header>
						<main class="cnae_main">
							<!-- <p class="numero_cnae"><b>NÚMERO DA NCM:</b> <?php echo get_post_meta(get_the_ID(), 'numero_da_ncm')[0]?></p> -->
							<p class="conteudo_cnae">

									<section class="tree">
										<ul class="accordion hierarquia" data-accordion>
											<?php echo getHierarquiaTitulo(get_the_ID()); ?>
										</ul>
									</section>
								<h6>OBSERVAÇÃO:</h6>
								<?php $observacao_id = get_post_meta(get_the_ID(), 'observacao')[0] ?>
									<?php $observacao = get_post($observacao_id); ?>
									<?php echo wp_trim_words($observacao->post_content, 30); ?>
							</p>
						</main>
						<footer>
						<a href="<?php the_permalink(); ?>" class="button button-azul" style="margin-top: 1rem">CONSULTE A TRIBUTAÇÃO COMPLETA</a>
						</footer>
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