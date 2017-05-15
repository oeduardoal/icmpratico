<?php
// Template Name: Fale Conosco
?>

<?php get_header(); ?>
<?php get_template_part('templates/header') ?>


<?php while (have_posts()): the_post(); ?>
<section class="row expanded">
	<section id="content" class="large-8 medium-12 small-12 large-centered columns page page-id-<?php the_ID(); ?>">
		<header>
			<h3><?php the_title() ?></h3>
		</header>
		<main>
			<?php echo do_shortcode('[contact-form-7 id="261117" title="Contato | ICMS Prático"]'); ?>
		</main>
	</section>
	<?php #get_sidebar('curso'); ?>
</section>
<?php endwhile;?>

<?php get_template_part("templates/noticias"); ?>
<?php get_template_part("templates/depoimentos"); ?>
<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	