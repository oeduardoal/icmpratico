<header>
	<section id="subheader">
		<section class="row">
			<section class="large-6 medium-6 small-12 columns">
			<?php if(!is_user_logged_in()): ?>
				<span>
					Olá, Visitante - 		
					<b>
						<a href="#" class="modal-login">Entrar</a>
					</b>
					ou
					<b>
						<a href="#"  class="modal-create">Cadastrar</a>
					</b>
				</span>
			<?php else: ?>
				<span>
					Olá, <strong><a href="<?php bloginfo('siteurl'); ?>/wp-admin/profile.php"><?php $current_user = wp_get_current_user(); echo @$current_user->user_firstname . " " . @$current_user->user_lastname; ?> (Minha Conta)</a></strong>
					-
					<b>
						<a href=" <?php echo wp_logout_url( home_url() ); ?>">Sair</a>
					</b>
				</span>
			<?php endif; ?>
			</section>
			<section class="large-6 medium-6 small-12 columns">
				<nav class="submenu">
					  <?php wp_nav_menu(array('theme_location' => 'sub-menu', 'menu_class' => '', 'container' => 'menu')); ?>
				</nav>
			</section>
		</section>
	</section>
	<section id="header">
		<section class="row">
			<section id="logo-icms" class="large-2 columns">
				<picture>
					<a href="<?php bloginfo('siteurl') ?>">
						<img src="<?php echo assetsurl() ?>/assets/img/logo-icms.png" alt="Logo Icms Prático" class="logo-icms">
					</a>
				</picture>
			</section>
			<section id="header-main" class="large-10 columns">
				<nav class="menu">
					  <?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'menu-header', 'container' => 'menu', 'walker' => new my_walker_nav_menu)); ?>
				</nav>
			</section>
		</section>
	</section>
</header>
<?php if(!is_home() && !is_404()): ?>
	<?php get_template_part('templates/buscador-pratico'); ?>
<?php endif; ?>

