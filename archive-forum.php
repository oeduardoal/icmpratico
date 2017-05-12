<?php get_header(); ?>
<?php get_template_part('templates/header') ?>

<section class="row expanded">
	<section id="content" class="large-12 float-left archive archive-id-<?php the_ID(); ?>">
		<?php get_template_part("templates/breadcrumbs" ); ?>
	</section>
		<header>
			<h1><?php post_type_archive_title(); ?></h1>
		</header>

				<!-- Paginação -->
				<?php global $wp_query; $page_is = (get_query_var('paged')) ? get_query_var('paged') : 1 ; ?>
				<?php $total = $posts->max_num_pages;  ?>

			<section class="large-8 medium-8 small-12 columns">
				

				<!-- Paginação -->
					<?php if ($wp_query->max_num_pages > 1): ?>
						<div class="callout primary text-center">
							Você em está <?php echo $page_is; ?> de <?php echo $total; ?> páginas <br/>
							<?php echo get_previous_posts_link( '<i class="fa fa-arrow-left" aria-hidden="true"></i> Anterior ' ); ?>
							<?php echo get_next_posts_link( 'Próximo <i class="fa fa-arrow-right" aria-hidden="true"></i> '); ?>
						</div>
					<?php endif; ?>
				<!-- Paginação -->

				<?php while (have_posts()): the_post(); ?>
						<section class="large-12 columns topicos" id="topico">
							<a href="<?php the_permalink(); ?>">
								<header>
									<h4><?php the_title(); ?></h4>
								</header>
							</a>

							<main>
								 <p>
                                    <?php

                                    $num_comments = get_comments_number();

                                    if ( $num_comments == 0 ) {
                                        $comments = __('Sem comentário');
                                    } elseif ( $num_comments > 1 ) {
                                        $comments = $num_comments . __(' Comentários');
                                    } else {
                                        $comments = __('1 Comentário');
                                    }

                                    echo $comments;
                                    ?>
                                </p>
                                 <p>Publicado por <b><?php the_author(); ?></b> em <b><?php echo get_the_date(); ?></b></p>
							</main>
							<hr>
						</section>
				<?php endwhile;?>

			<!-- Paginação -->
				<?php if ($wp_query->max_num_pages > 1): ?>
					<div class="callout primary text-center">
						Você em está <?php echo $page_is; ?> de <?php echo $total; ?> páginas <br/>
						<?php echo get_previous_posts_link( '<i class="fa fa-arrow-left" aria-hidden="true"></i> Anterior ' ); ?>
						<?php echo get_next_posts_link( 'Próximo <i class="fa fa-arrow-right" aria-hidden="true"></i> '); ?>
					</div>
				<?php endif; ?>
			<!-- Paginação -->
			</section>
			
			<section class="large-4 medium-4 small-12 columns" id="leave-comment">
				<div class="callout success" style="display: none;">
					<p></p>
				</div>
				<form id="deixarcomentario" data-abide="ajax">
				  <div class="row"> 
					<div data-abide-error class="alert callout" style="display: none;">
						<p><i class="fa fa-alert"></i>Existem erros no formulário</p>
					</div>
					<h5>Deixar um comentário</h5>
				    <div class="medium-12 columns">
		  			<?php wp_nonce_field('vb_novo_topico','vb_novo_topico_nonce', true, true ); ?>
				      <label>Titulo
				        <input type="text" name="titulo" id="titulo" required>
				        <span class="form-error">Esse campo é requerido</span>
				      </label>
				    </div>
				    <div class="medium-12 columns">
				      <label>Descrição
				        <textarea rows="6" name="descricao" id="descricao" ></textarea>
				      </label>
				    </div>
				     <div class="medium-12 columns">
				     <button type="submit" class="button button-azul" id="criar-topico" data-loading-text="Criando Tópico...">Criar um tópico</button>
				     </div>
				  </div>
				</form>
			</section>
		

	<?php #get_sidebar(); ?>
</section>


<?php get_template_part("templates/noticias"); ?>
<?php get_template_part("templates/depoimentos"); ?>
<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>	