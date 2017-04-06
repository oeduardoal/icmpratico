	</body>
	<footer>
	<section class="widgets">
		<section class="row">
		<?php for ($i=1; $i < 4; $i++): ?>
				<section class="large-4 columns">
					<?php 
						$location = 'menurodape'. $i;
						$menu_obj = get_menu_obj($location); 
						wp_nav_menu( array('theme_location' => $location, 'items_wrap'=> '<h3>'.esc_html($menu_obj->name).'</h3><ul id="%1$s" class="">%3$s</ul>') );
					 ?>
				</section>
		<?php endfor; ?>
		</section>
	</section>
	<section id="subfooter">
		<section class="row">
			<section class="large-12 columns">
				<span class="copyright">
					Copyright © <?php date("Y"); ?> ICMS Prático - Todos os direitos reservados.
				</span>
				<picture>
					<a href="//websitefortaleza.com.br" target="_blank">
						<img src="<?php echo assetsurl ?>/assets/img/logo-website.png" alt="Website Fortaleza - Criação de Sites">
					</a>
				</picture>
			</section>
		</section>
	</section>
	<!-- Scripts Footer -->
	<?php wp_footer(); ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
	</footer>
</html>
