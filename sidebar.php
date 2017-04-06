<?php #wp_nav_menu( array( 'theme_location' => 'sidebar-menu', 'menu_class' => 'sidebar-menu')); ?>

	<section id="widgets" class="large-4 float-right" style="position: relative;">
		
		<div > 
			<?php if(is_singular(array('post')) || is_page()): ?>
				<section class="large-12 columns widget">
						<button class="button button-toggle" style="position: absolute;right: 0;top: 0;">
							<i class="fa fa-angle-right"></i>
						</button>
						
						<main>
							<?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'menu-widgets', 'container' => 'menu')); ?>
						</main>
				</section>
			<?php endif; ?>
			<section class="large-12 columns widget widget-cursos" >
				<header>
					<h6>Cursos com Inscrições Abertas</h6>
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
		</div>
	</section>
	
