(function($){
	$(window).load(function(){
		$('.loader-page').fadeOut(1000);
	})
	$(document).ready(function() {
			$(document).foundation();
			console.log("Desenvolvido por Eduardo Almeida :D");
			$('.slider-noticias').owlCarousel({
				items:3,
				pagination: false,
				slideSpeed: 500,
				autoPlay: 2500,
			});
			$('.slider-depoimentos').owlCarousel({
				items:2,
				pagination: false,
				slideSpeed: 500,
				autoPlay: 3000,
			});
			$('.slider-parceiros').owlCarousel({
				items:5,
				pagination: false,
				slideSpeed: 500,
				autoPlay: 2500,
			});
			$('#slider-cursos').owlCarousel({
				items:2,
				pagination: false,
				slideSpeed: 500,
				autoPlay: 2500,
			});

			var owl = $('.slider-noticias');
			$('.btn-left').click(function() {
			    owl.trigger('owl.prev');
			})
			$('.btn-right').click(function() {
			    owl.trigger('owl.next');
			})

			var owlp = $('.slider-parceiros');
			$('#parceiros .btn-left').click(function() {
			    owlp.trigger('owl.prev');
			})
			$('#parceiros .btn-right').click(function() {
			    owlp.trigger('owl.next');
			})

			var owld = $('.slider-depoimentos');
			$('#depoimentos .btn-left').click(function() {
			    owld.trigger('owl.prev');
			})
			$('#depoimentos .btn-right').click(function() {
			    owld.trigger('owl.next');
			})

			var owlc = $('#slider-cursos');
			$('#cursos .btn-left').click(function() {
			    owlc.trigger('owl.prev');
			})
			$('#cursos .btn-right').click(function() {
			    owlc.trigger('owl.next');
			})
			
			// $("html").niceScroll();


			$('button.button-toggle').click(function(){
				$('#content').toggleClass('large-10');
				$('#widgets').toggleClass('large-4').toggleClass('large-2');
			})


			$('.modal-login').click(function(e){
 				e.preventDefault();
 				 $('#modal-create').foundation('close');
 				 $('#modal-login').foundation('open');
			})
			$('.modal-create').click(function(e){
 				e.preventDefault();
 				 $('#modal-login').foundation('close');
 				 $('#modal-create').foundation('open');
 				 $(".callout.message").hide();
			})

			$('a, button, .btn-search, .content, .widget, .owl-item').not('.logo, #scrollToTop, .esqueceu-senha , .modal-create , #modal-login , #create-account-button, #logo-icms a , #depoimentos a,#depoimentos button, .button-toggle, [href*="/curso/"]').click(function(e){
		        if(!AUTHED )
		        {
		            e.preventDefault();

		            var redirect_to = '';

		            if( $(this).is('a') )
		                redirect_to = $(this).attr('href');

		            if( $(this).is('button') )
		                redirect_to = $(this).parents('form').attr('action');

		            if( ! redirect_to )
		                redirect_to = window.location.href;

		            $('[name=redirect_to]').val(redirect_to);

		           $('#modal-create').foundation('close');
		           $('#modal-login').foundation('open');
		        }
		    });
			
			if(!AUTHED){
				$('#modal-login').foundation('open');
			}

			$('#user_login').attr('placeholder', 'Login').attr('autofocus', '<true></true>');
    		$('#user_pass').attr('placeholder', 'Senha');
    		$('#wp-submit').addClass('expanded').addClass('large');



			$('#create-account').on('valid submit',function(e){
				e.preventDefault();

				var button_ = $('#create-account-button');
				var loading = button_.attr('data-loading-text');
				var data = new Object();

    			data.action = 'register_user';
				data.nonce = $('#vb_new_user_nonce').val();
				data.reg_user  = $('input[name=reg_user]').val();
				data.reg_mail  = $('input[name=reg_mail]').val();
				data.reg_pass  = $('input[name=reg_pass]').val();
				data.reg_pass_ver  = $('input[name=reg_pass_ver]').val();
				data.reg_estado  = $('select[name=reg_estado]').val();
				data.reg_cidade  = $('input[name=reg_cidade]').val();
				
				$.post({
					type: "POST",
					url: AJAXURL,
					data: data,
					success: function(response){
				        if(response > 0 ) {
				        	$('.callout.message p').addClass('success')
			        		$('.callout.message p').html("Usuário criado com sucesso. Entre com sua nova conta.");
							$(".callout.message").fadeIn("300");
							setTimeout(function(){
								$(".callout.message").fadeOut("300");
							},4000)
							$('#modal-create').foundation('close');
		           			$('#modal-login').foundation('open');
				        } else {
							button_.html("Tentar de novo");
			      			 $('.callout.message p').html(response);
							$(".callout.message").fadeIn("300");
							setTimeout(function(){
								$(".callout.message").fadeOut("300");
							},2000)
				        }
					}
				})
			})
	})
})(jQuery);


