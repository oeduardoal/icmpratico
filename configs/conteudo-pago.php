<?php

	function conteudo($conteudo){
		if(is_user_logged_in()):
			echo $conteudo;
		else:
			echo wp_trim_words($conteudo, 110);
				echo "<br/>";
			get_template_part("pagar-conteudo");
		endif;
	}

	add_filter('the_content', 'filtro_conteudo_pago' ); 

	function filtro_conteudo_pago($content){
		if(is_singular('curso') || is_page('sobre-nos') || is_singular('wpm-testimonial')):
				return get_the_content();
			else:

			if(is_user_logged_in()):
				return get_the_content();
			else:
				$conteudo  = "";
				$conteudo .= wp_trim_words($content, 110);
				return $conteudo . '
					<div class="login-continuar">
	Para continuar a leitura, faça <a href="' . get_the_permalink() .'" class="modal-login">login</a> ou <a href="' . get_the_permalink() .'" class="modal-create">crie uma conta</a>, e tenha acesso ao conteúdo completo!
</div>
				';
			endif;

		endif;
	}

