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
			<!-- <br> -->
			<!-- <h5>CRONOGRAMA DO CURSO</h5> -->
			<br>
			<div id="conteudo_programatico">
			<ul class="accordion" data-accordion data-allow-all-closed="true">
				<li class="accordion-item" data-accordion-item>
					<a href="#" class="accordion-title">CONTEÚDO PROGRAMÁTICO</a>
					<div class="accordion-content" data-tab-content>
						<?php echo get_field('conteudo_programatico'); ?>
					</div>
				</li>
			</ul>
			</div>
		<?php endif; ?>

		<?php if(get_field('professores')): ?>
			<br>
				<h5>FACILITADORES</h5>
				
				<br>
				<section id="slide-professores" class="owl-carousel owl-theme">
				
				<?php
					$professores = get_field("professores");
					foreach ($professores as $key => $value): ?>
							<div class="item">
								<picture>
								<?php if(has_post_thumbnail($value->ID)): ?>
									<img class="image-professor" src="<?php echo get_the_post_thumbnail_url($value->ID, "full"); ?>" alt="">
								<?php else: ?>
									<img  class="image-professor" src="<?php echo thumbnail_default; ?>" alt="<?php echo $value->post_title ?> - Professor">
								<?php endif; ?>
								</picture>
								<h5><?php echo $value->post_title; ?></h5>
								<p><?php echo $value->post_content; ?></p>
							</div>
					<?php endforeach; ?>
						</section>
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
		<?php if(get_field('primeiro_lote_data', get_the_ID())): ?>
		<section class="articles large-4 medium-4 small-12 float-left">
			<main>
				<h6>PRIMEIRO LOTE</h6>
				<small><?php the_field('primeiro_lote_data', get_the_ID()); ?></small>
				<h4>R$ <?php echo get_field('primeiro_lote_valor',  get_the_ID()); ?></h4>
				<a href="#inscrever" class="button primary">INSCREVA-SE</a>
			</main>
		</section>
		<?php endif; ?>
		<?php if(get_field('segundo_lote_data', get_the_ID())): ?>
		<section class="articles large-4 medium-4 small-12 float-left">
			<main>
				<h6>SEGUNDO LOTE</h6>
				<small><?php echo get_field('segundo_lote_data', get_the_ID()); ?></small>
				<h4>R$ <?php echo get_field('segundo_lote_valor', get_the_ID()); ?></h4>
				<a href="#inscrever" class="button primary">INSCREVA-SE</a>
			</main>
		</section>
		<?php endif; ?>
		<?php if(get_field('terceiro_lote_data', get_the_ID())): ?>
		<section class="articles large-4 medium-4  small-12  float-left">
			<main>
				<h6>TERCEIRO LOTE</h6>
				<small><?php echo get_field('terceiro_lote_data', get_the_ID()); ?></small>
				<h4>R$ <?php echo get_field('terceiro_lote_valor', get_the_ID()); ?></h4>
				<a href="#inscrever" class="button primary">INSCREVA-SE</a>
			</main>
		</section>
		<?php endif; ?>
	</div>
</section>
<?php #get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	