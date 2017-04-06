<?php

// Chamadas PHP

	/*
		
		usar sempre o WP_Query .. <3
		usar sempre o WP_Query .. <3
		usar sempre o WP_Query .. <3
		usar sempre o WP_Query .. <3

		##########################################################

		<?php get_header(); ?>
		<?php get_footer(); ?>
	
		##########################################################
		
		// Para criar templates
	
		##########################################################
		
		// Chamar um arquivo que faz parte do template: file-url-tpl.php
		get_template_part('file-url', 'tpl');
		
		##########################################################
		
		// Loop Basico
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_title(); ?>
			<?php the_content(); ?>
			<?php the_excerpt(); ?>
			<?php echo excerpt(40); ?>
			<?php the_permalink(); ?>
			<?php the_post_thumbnail_url(); ?>
		<?php endwhile; else: ?>
		<?php endif; ?>

		##########################################################
		
		// ACF
		<?php if( have_rows('blocos', 56) ): while ( have_rows('blocos', 56) ) : the_row(); ?>
			<?php the_sub_field('image-bloco',56);?>
		<?php endwhile; else : endif; ?>
		################################
		<?php the_field('image-bloco',56); ?>

		##########################################################

		
		$o_senhor_argumento = array(
			'author' => ID, // Posts por autor - ID
			'author_name' => 'NOME DO AUTHOR', // Post Por autor - NAME
			'cat' => ID, // Posts por Categorias - ID, // Em uma single mostrar apenas os posts com a mesma categoria, IDEIA
			'p' => ID, // Post ID
			'name' => 'POST-SLUG', // Post Específico name
			'post_type' => 'NAME POST TYPE', // Pode também ser um array
			'post_status' => array(
					            'publish',
					            'pending',
					            'draft',
					            'auto-draft',
					            'future',
					            'private',
					            'inherit',
					            'trash'
	            			),
			'posts_per_page' => 10,
			'order' => 'DESC',
			'orderby' => 'date',
			'year' => 2012,
			'monthnum' => 3,
			'w' =>  25,
			'day' => 17,
			'hour' => 13,
			'minute' => 19,
			'second' => 30

		);
		
		$a_senhora_query = new $WP_Query($o_senhor_argumento);

		##########################################################
		// Pegar page por ID
		<?php $args = array('page_id' => 10);?>
		<?php $page = new WP_Query('page_id' => 10); if($page->have_posts()): while($page->have_posts()): ?>

					the_title();
					the_content();
					the_permalink();
					the_post_thumbnail_url();

		<?php endwhile; wp_reset_postdata(); endif; ?>


	*/



?>