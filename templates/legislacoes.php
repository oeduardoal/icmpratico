<section id="legislacoes">
	<header>
		<h1>VEJA AS LEGISLAÇÕES</h1>
	</header>
	<?php $args_l = array(  'posts_per_page' => 6,'orderby' => 'date','order' => 'DESC', 'post_type' => 'legislacao'); ?>
	<?php $legislacoes = new WP_Query($args_l); ?>
	<?php
		while($legislacoes->have_posts()):
		$legislacoes->the_post();
	?>
		<a href="<?php the_permalink(); ?>">
			<article class="large-4 medium-4 small-12 float-left">
				<div class="right">
					<header>
						<h2><?php the_title(); ?></h2>
					</header>
					<main>
						<p><?php echo wp_trim_words(get_the_content(), 15); ?></p>
					</main>
					<footer>
						<a href="<?php the_permalink(); ?>">
							<button class="button">LEIA MAIS</button>
						</a>
					</footer>
				</div>
				
			</article>
		</a>
	<?php endwhile;?>
	<?php wp_reset_postdata(); ?>
	<footer>
		<a href="<?php bloginfo('siteurl') ?>/legislacao/">
			<button class="button button-amarelo">VISUALIZAR TODOS</button>
		</a>
	</footer>
</section>