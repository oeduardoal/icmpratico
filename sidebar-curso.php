<section id="widgets" class="large-4 float-right" style="position: relative;">
	<?php if(is_single()): ?>
	<a href="<?php echo get_field('url_ead') ?>" target="_blank" id="inscrever" class="large-12 columns no-padding inscrever">CLIQUE AQUI E SE INSCREVA</a>
	<?php endif; ?>
	<?php if(get_field('publico_alvo')): ?>
	<section class="large-12 columns widget widget-cursos no-padding" >
		<main>
			<ul>
				<li class="no-bg">
					<h6>PÚBLICO ALVO</h6>
					<p><?php the_field('publico_alvo'); ?></p>
				</li>

			</ul>
		</main>
	</section>
	<?php endif; ?>
	<?php if(get_field('local_do_curso')): ?>
	<section class="large-12 columns widget widget-cursos no-padding" >
		<main>
			<ul>
				<li class="no-bg">
					<h6>LOCAL DO CURSO</h6>
					<p><?php the_field('local_do_curso'); ?> </p>
					<a href="#">Ver mapa</a>
				</li>
				
			</ul>
		</main>
	</section>
	<?php endif; ?>
	<?php if(get_field('coordenacao')): ?>
	<section class="large-12 columns widget widget-cursos no-padding" >
		<main>
			<ul>
				<li class="no-bg">
					<h6>COORDENAÇÃO E CONTATO</h6>
					<p><?php the_field('coordenacao'); ?></p>
					<br>
					<?php if(get_field('contatos')): ?>
					<p><strong>Telefones: </strong> <br/> <?php the_field('contatos'); ?></p>
					<?php endif; ?>
					<br>
					<?php if(get_field('email')): ?>
						<p><strong>Email: </strong> <br> <a href="mailto:<?php the_field('email') ?>"><?php the_field('email') ?></a></p>
					<?php endif; ?>
				</li>
				
			</ul>
		</main>
	</section>
	<?php endif; ?>
	<section class="large-12 columns widget widget-cursos" >
				<header >
					<h6 class="text-left">Cursos com Inscrições Abertas</h6>
				</header>
				<main>
					<ul>
					<?php $argsc = array('post_type' => 'curso',); ?>
					<?php $cursos = new WP_Query($argsc); ?>
					<?php
						while($cursos->have_posts()):
						$cursos->the_post();
					?>
						<li>
							<h6><?php the_title(); ?></h6>
							<p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
							<a href="<?php the_permalink(); ?>">Mais Informações</a>
						</li>
					<?php endwhile; ?>
					</ul>
				</main>
			</section>
</section>
	
