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

	function filtro_conteudo_pago(){
		if(is_user_logged_in()):
			return get_the_content();
		else:
			$conteudo = get_the_content();
			return wp_trim_words($conteudo, 110);
		endif;
	}

