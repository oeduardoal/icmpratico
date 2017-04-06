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
			<?php $observacao_id = get_post_meta(get_the_ID(), 'observacao')[0] ?>
			<?php $content = get_post($observacao_id); ?>
			<?php echo $content->post_content; ?>
		</main>
	</section>
	<?php get_sidebar(); ?>
</section>
<?php endwhile;?>

<?php #get_template_part("templates/noticias"); ?>
<?php #get_template_part("templates/depoimentos"); ?>
<?php #get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	