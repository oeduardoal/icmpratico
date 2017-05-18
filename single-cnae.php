<?php get_header(); ?>
<?php get_template_part('templates/header') ?>


<?php while (have_posts()): the_post(); ?>
<section class="row expanded">
	<section id="content" class="large-8 float-left single single-id-<?php the_ID(); ?>">
		<?php get_template_part("templates/breadcrumbs" ); ?>
		<header>
			<h5 class="numero_cnae"><b>CNAE:</b> <?php echo get_post_meta(get_the_ID(), 'numero')[0]?></h3>
			<h5 class="fonte_legal"><b>FONTE LEGAL: </b><?php echo get_post_meta(get_the_ID(), 'base_legal')[0]?></h3>
			<h4><?php the_title() ?></h4>
		</header>
		<br>
		<main class="cnae_main">
			<p class="conteudo_cnae"><?php echo get_the_content(); ?></p>
		</main>
	</section>
	<?php get_sidebar(); ?>
</section>
<?php endwhile;?>

<?php #get_template_part("templates/noticias"); ?>
<?php #get_template_part("templates/depoimentos"); ?>
<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	