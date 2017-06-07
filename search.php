<?php get_header(); ?>
<?php get_template_part('templates/header') ?>

<section class="row">
	<section id="content" class="large-12 columns search-page">
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
			<h3 style="text-align: center;">
			Você pesquisou por:
				<span class="azul"> <?php the_search_query(); ?></span>
				<span class="resultados"> em <?php echo $tipo; ?></span>
			</h3>
			
		</header>
			<?php
				$filtro = $_GET['filtro'];
				if($filtro == "post"){
					$filtro = "post,page,artigo";
				}
			?>
			<!-- Paginação -->
				<?php global $wp_query; $page_is = (get_query_var('paged')) ? get_query_var('paged') : 1 ; ?>
				<?php $total = $wp_query->max_num_pages; ?>
	
	<section class="search-resultados large-12 columns">
			


			<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<!-- CASE NCM -->
				<?php switch (@$_GET['filtro']): case 'ncm': ?>
				
				<a href="<?php the_permalink(); ?>">
					<article class="result">
						<header>
							<h5><?php the_title(); ?></h5>
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
				<?php
						break;
						case 'post':
								
				?>
				<article class="result">
					<header>
						<h5><?php the_title(); ?></h5>
					</header>
					<main>
						<p><?php echo wp_trim_words(get_the_content(), 30); ?></p>
						<p><?php echo wp_get_post_revision(); ?></p>
					</main>
					<footer>
						<a href="<?php the_permalink(); ?>" class="button button-azul">VER MAIS</a>
					</footer>
				</article>
				<?php
					break;
					case 'cnae':
				?>
				<a href="<?php the_permalink(); ?>">
					<article class="result">
						<header>
							<h5><?php echo get_post_meta(get_the_ID(), 'numero')[0] . " - " . get_the_title(); ?></h5>
						</header>
						<main class="cnae_main">
							<p class="numero_cnae"><b>CNAE:</b> <?php echo get_post_meta(get_the_ID(), 'numero')[0]?></p>
							<p  class="fonte_legal"><b>FONTE LEGAL: </b><?php echo get_post_meta(get_the_ID(), 'base_legal')[0]?></p>
							<p class="conteudo_cnae"><?php echo get_the_content(); ?></p>
						</main>
					</article>
				</a>
					<?php
						break;
						endswitch;
					?>
			<?php endwhile;else: ?>
			<style>
				h5{text-align: center;}
			</style>
				<?php switch ($filtro) {
					case 'ncm':
						echo "<h5 style='text-align: center'>NCM NÃO CONSTA EM NOSSA BASE DE DADOS</h5>";
						break;
					case 'cnae':
						echo "<h5 style='text-align: center'>CNAE CONSULTADA NÃO CONSTA EM NOSSA BASE DE DADOS COM TRATAMENTO DIFERENCIADO OU SUJEITA AO ICMS-ST.</h5>";
						break;
					default:
						# code...
						break;
				} ?>
			<?php endif; ?>

	</section>

			<!-- Paginação -->
				<?php if ($wp_query->max_num_pages > 1): ?>
					<div class="callout primary text-center">
						Você em está <?php echo $page_is; ?> de <?php echo $total; ?> páginas <br/>
						<?php echo get_previous_posts_link( '<i class="fa fa-arrow-left" aria-hidden="true"></i> Anterior ' ); ?>
						<?php echo get_next_posts_link( 'Próximo <i class="fa fa-arrow-right" aria-hidden="true"></i> '); ?>
					</div>
				<?php endif; ?>
			<!-- Paginação -->

	</section>
	<?php #get_sidebar(); ?>
</section>

<?php #get_template_part("templates/noticias"); ?>
<?php #get_template_part("templates/depoimentos"); ?>
<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	