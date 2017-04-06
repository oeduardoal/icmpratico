<?php get_header(); ?>
<?php get_template_part('templates/header') ?>

<section class="row expanded">
	<section id="content" class="large-12 float-left category category-id-<?php the_ID(); ?>">
		<?php get_template_part("templates/breadcrumbs" ); ?>
	</section>
		<?php while (have_posts()): the_post(); ?>

			<section id="articles">

				<div class="article-item large-4 medium-6 small-12 float-left">
					<div class="imageresize" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>); height: 10rem;"></div>
					<header>
						<h2><?php the_title(); ?></h2>
					</header>
					<main>
						<p>
							<?php echo wp_trim_words(get_the_content(), 10); ?>
						</p>
					</main>
					<small>
						<span class="data"><?php the_date('d/m/Y'); ?></span>
						<label for="categoria-name">
							Categoria:
							<span class="categoria-name">
								<?php the_category( ', ' ); ?>
							</span>
						</label>
					</small>
					<hr>
					<a href="<?php the_permalink(); ?>">
						<button class="button button-azul">
							LEIA MAIS
						</button>
					</a>
				</div>

			</section>

		<?php endwhile;?>

</section>


<?php get_template_part("templates/depoimentos"); ?>
<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	