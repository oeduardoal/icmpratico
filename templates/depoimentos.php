<section id="depoimentos">
	<header>
		<h1>
			<b>DEPOIMENTOS</b> DOS ALUNOS
		</h1>
	</header>
		<button class="btn-nav btn-left">
			<i class="fa fa-angle-left" aria-hidden="true"></i>
		</button>
		<button class="btn-nav btn-right">
			<i class="fa fa-angle-right" aria-hidden="true"></i>
		</button>

	<section class="articles slider-depoimentos">
	<?php $args = array('post_type' => 'wpm-testimonial','posts_per_page' => 10 ); $comentarios = new WP_Query( $args ); while ( $comentarios->have_posts() ) : $comentarios->the_post(); ?>
			<article class="item">
			<div class="aspas"></div>
				<main>
					<p>
						<?php echo wp_trim_words(get_the_excerpt()); ?>
					</p>
				</main>
				<footer>
					<picture>
						<img src="<?php echo assetsurl ?>/assets/img/perfil.jpg" alt="">
					</picture>
					<label><?php the_author(); ?></label>
				<span ><?php the_date('d/m/Y'); ?></span>
				</footer>
			</article>
	<?php endwhile; ?>
	</section>
	<footer>
			<button class="button button-outline btncoment" data-open="exampleModal1">
				Clique aqui e mande o seu depoimento também.
			</button>
	</footer>
	<div class="reveal" id="exampleModal1" data-reveal>
		<?php echo do_shortcode('[testimonial_view id=1]'); ?>
	</div>
</section>