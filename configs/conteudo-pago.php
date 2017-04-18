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
		if(is_singular('curso')):
				return get_the_content();
			else:

			if(is_user_logged_in()):
				return get_the_content();
			else:
				$conteudo  = "";
				$conteudo .= wp_trim_words($content, 110);
				return $conteudo . '
					<div class="login-continuar">
					Empolgado com a leitura? Ainda não criou a sua conta?! <br> Faça <a href="' . get_the_permalink() . '" class="modal-login">login</a> ou <a href="' . get_the_permalink() . '" class="modal-create">crie uma</a> para continuar...
					</div>
				';
			endif;

		endif;
	}

