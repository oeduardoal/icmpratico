<section id="noticias">
		<header>
			<h1>NOTÍCIAS E DESTAQUE</h1>
		</header>
		<main class="sub">
			<p>onec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis</p>
		</main>
		<button class="btn-nav btn-left">
			<i class="fa fa-angle-left" aria-hidden="true"></i>
		</button>
		<button class="btn-nav btn-right">
			<i class="fa fa-angle-right" aria-hidden="true"></i>
		</button>
		<section id="articles" class="slider-noticias  owl-carousel owl-theme">

			<?php $argsn = array('post_type' => 'post', 'post'); ?>
			<?php $noticias = new WP_Query($argsn); ?>
			<?php
				while($noticias->have_posts()):
				$noticias->the_post();
			?>
					<div class="article-item">
				<a href="<?php the_permalink(); ?>">
						<?php if(has_post_thumbnail()): ?>
						<div class="imageresize left" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);"></div>
						<?php else: ?>
						<div class="imageresize left" style="background-image: url(<?php echo thumbnail_default; ?>);"></div>
						<?php endif; ?>
							<header>
								<h2><?php the_title(); ?></h2>
							</header>
							<main>
								<p>
									<?php echo wp_trim_words(get_the_content(), 15); ?>
								</p>
							</main>
							<small>
								<span class="data"><?php the_date('d/m/Y'); ?></span>
								
							</small>
							<hr>
							<a href="<?php the_permalink(); ?>">
								<button class="button button-azul">
									LEIA MAIS
								</button>
							</a>
				</a>
					</div>
			<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
			
		</section>
		<footer>
			<a href="<?php bloginfo('siteurl') ?>/noticias-e-destaques/">
				<button class="button button-amarelo">
					VISUALIZAR TODOS
				</button>
			</a>
		</footer>
</section>