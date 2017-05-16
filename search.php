<?php get_header(); ?>
<?php get_template_part('templates/header') ?>

<section class="row expanded">
	<section id="content" class="large-8 float-left search-page">
		<?php #get_template_part("templates/breadcrumbs" ); ?>
		<header>
		<?php
			$tipo = $_GET['filtro'];
			if($tipo == "ncm"):
				$tipo = "NCMs comentadas";
			elseif($tipo == "posts"):
				$tipo = "em todo o site";
			elseif($tipo == "artigos"):
				$tipo = "Artigos";
			endif;
		?>
			<h3>
			Você pesquisou por: <span class="azul"> <?php the_search_query(); ?></span><span class="resultados"> em <?php echo $tipo; ?>
			</span>
			</h3>
			
		</header>
			<?php
				$filtro = $_GET['filtro'];
				if($filtro == "post"){
					$filtro = "post,page,artigo";
				}
			?>
			<?php while(have_posts()): the_post(); ?>
				<ul class="accordion" data-accordion data-allow-all-closed="true">
					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title"><?php the_title(); ?></a>
						<div class="accordion-content" data-tab-content>
							<p>
								<?php $observacao_id = get_post_meta(get_the_ID(), 'observacao')[0] ?>
								<?php $observacao = get_post($observacao_id); ?>
								<?php echo wp_trim_words($observacao->post_content, 30); ?>
							</p>
							<p>
								<a class="button button-azul" href="<?php the_permalink(); ?>" >VER MAIS</a>
							</p>
						</div>
					</li>
				</ul>
			<?php endwhile; ?>

	</section>
	<?php #get_sidebar(); ?>
</section>

<?php #get_template_part("templates/noticias"); ?>
<?php #get_template_part("templates/depoimentos"); ?>
<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	