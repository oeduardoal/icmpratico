<?php
// Template Name: Notícias e destaques
?>
<?php get_header(); ?>
<?php get_template_part('templates/header') ?>

<section class="row expanded">
	<section id="content" class="large-12 float-left archive archive-id-<?php the_ID(); ?>">
		<?php get_template_part("templates/breadcrumbs" ); ?>
	</section>
		<header>
			<h1><?php the_title(); ?></h1>
		</header>
		
		<!-- <?php echo do_shortcode("[ajax_load_more repeater='archives' post_type='post']"); ?> -->


			<section id="articles">
				<?php $argsp = array('post_type' => 'post', 'posts_per_page' => 5); ?>
				<?php $posts = new WP_Query($argsp); ?>

				<?php $page_is = (get_query_var('paged')) ? get_query_var('paged') : 1 ; ?>
				<?php $total = $posts->max_num_pages;  ?>

				<?php if ($posts->max_num_pages > 1) { ?>
				<div class="callout primary text-center">
					Você em está <?php echo $page_is; ?> de <?php echo $total; ?> páginas <br/>
					<?php echo get_previous_posts_link( '<i class="fa fa-arrow-left" aria-hidden="true"></i> Anterior ' ); ?>
					<?php echo get_next_posts_link( 'Próximo <i class="fa fa-arrow-right" aria-hidden="true"></i> ', $posts->max_num_pages ); ?>
				</div>
				<?php } ?>

				<?php
					while($posts->have_posts()):
					$posts->the_post();
				?>

					<div class="article-item large-12 medium-12 small-12 columns">
						<?php if(has_post_thumbnail()): ?>
							<div class="large-4 columns imageresize left" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);"></div>
						<?php else: ?>
							<div class="large-4 columns imageresize left" style="background-image: url(<?php echo thumbnail_default; ?>);"></div>
						<?php endif; ?>
						<div class="large-8 columns">
						<header>
							<h2><?php the_title(); ?></h2>
						</header>
						<main>
							<p>
								<?php echo wp_trim_words(get_the_content(), 50); ?>
							</p>
						</main>
						
						<hr>
						<a href="<?php the_permalink(); ?>">
							<button class="button button-azul">
								LEIA MAIS
							</button>
						</a>
						</div>

						
				</div>
				<?php endwhile;wp_reset_postdata(); ?>
				<?php if ($posts->max_num_pages > 1) { ?>
				<div class="callout primary text-center">
					Você em está <?php echo $page_is; ?> de <?php echo $total; ?> páginas <br/>
					<?php echo get_previous_posts_link( '<i class="fa fa-arrow-left" aria-hidden="true"></i> Anterior ' ); ?>
					<?php echo get_next_posts_link( 'Próximo <i class="fa fa-arrow-right" aria-hidden="true"></i> ', $posts->max_num_pages ); ?>
				</div>
				<?php } ?>
		
			
			</section>




	<?php #get_sidebar(); ?>
</section>


<?php get_template_part("templates/depoimentos"); ?>
<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	