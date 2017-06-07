<?php get_header(); ?>
<?php get_template_part('templates/header') ?>


<?php while (have_posts()): the_post(); ?>
<section class="row expanded">
	<section id="content" class="large-8 float-left single single-id-<?php the_ID(); ?>">
		<?php get_template_part("templates/breadcrumbs" ); ?>
		<header>
			<h3><?php the_title() ?></h3>
		</header>
		<main>
			<?php the_content(); ?>
		</main>

		<?php if(get_field('conteudo_programatico')): ?>
			<div id="conteudo_programatico">
				<?php echo get_field('conteudo_programatico'); ?>
			</div>
		<?php endif; ?>

	</section>
	<?php get_sidebar('curso'); ?>
</section>
<?php endwhile;?>

<section id="lotes" class="text-center">
	<header>
		<h1>
			<b>VALORES DO CURSO</b>
		</h1>
	</header>
	<div class="row">
		<section class="articles large-4 medium-4 small-12 float-left">
			<main>
				<h6>PRIMEIRO LOTE</h6>
				<small><?php the_field('primeiro_lote_data', get_the_ID()); ?></small>
				<h4>R$ <?php echo get_field('primeiro_lote_valor',  get_the_ID()); ?></h4>
				<a href="#inscrever" class="button primary">INSCREVA-SE</a>
			</main>
		</section>
		<section class="articles large-4 medium-4 small-12 float-left">
			<main>
				<h6>SEGUNDO LOTE</h6>
				<small><?php echo get_field('primeiro_lote_data', get_the_ID()); ?></small>
				<h4>R$ <?php echo get_field('segundo_lote_valor', get_the_ID()); ?></h4>
				<a href="#inscrever" class="button primary">INSCREVA-SE</a>
			</main>
		</section>
		<section class="articles large-4 medium-4  small-12  float-left">
			<main>
				<h6>TERCEIRO LOTE</h6>
				<small><?php echo get_field('terceiro_lote_data', get_the_ID()); ?></small>
				<h4>R$ <?php echo get_field('terceiro_lote_valor', get_the_ID()); ?></h4>
				<a href="#inscrever" class="button primary">INSCREVA-SE</a>
			</main>
		</section>
		
	</div>
</section>
<?php #get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	