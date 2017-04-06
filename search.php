<?php get_header(); ?>
<?php get_template_part('templates/header') ?>

<section class="row expanded">
	<section id="content" class="large-12 float-left search-page">
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
				if($filtro == "posts"){
					$filtro = "post,page,artigo";
				}
			?>
			<?php echo do_shortcode('[ajax_load_more post_type="' . $filtro . '" button_label="Carregar Mais" button_loading_label="Carregando"]'); ?>
		
	</section>
	<?php #get_sidebar(); ?>
</section>

<?php get_template_part("templates/noticias"); ?>
<?php get_template_part("templates/depoimentos"); ?>
<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	