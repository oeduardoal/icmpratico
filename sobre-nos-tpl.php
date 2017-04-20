<?php
// Template Name: Sobre Nós
?>

<?php get_header(); ?>
<?php get_template_part('templates/header') ?>


<?php while (have_posts()): the_post(); ?>
<section class="row expanded">
	<section id="content" class="large-10 large-centered columns page page-id-<?php the_ID(); ?>">
		<?php get_template_part("templates/breadcrumbs" ); ?>
		<header>
			<h3><?php the_title() ?></h3>
		</header>
		<main>
			<?php the_content(); ?>
		</main>
	</section>
</section>
<?php endwhile;?>

<?php #get_template_part("templates/noticias"); ?>
<?php #get_template_part("templates/depoimentos"); ?>
<?php #get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	