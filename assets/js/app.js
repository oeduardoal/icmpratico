(function($){
	$(window).load(function(){
		$('.loader-page').fadeOut(1000);
	})
	$(document).ready(function() {
			$(document).foundation();
			console.log("Desenvolvido por Eduardo Almeida :D");
			var slider_noticias = $('.slider-noticias').owlCarousel({
				loop:true,
			    nav:false,
			    dots:false,
				autoplayTimeout:2500,
				autoplay:true,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:2
			        },
			        800:{
			            items:3
			        },
			        1000:{
			            items:3
			        }
			    }
			});
			var slider_depoimentos = $('.slider-depoimentos').owlCarousel({
				loop:false,
			    nav:false,
			    dots:false,
				autoplayTimeout:2500,
				autoplay:true,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:2
			        },
			        800:{
			            items:2
			        },
			        1000:{
			            items:2
			        }
			    }
			});
			var slider_parceiros = $('.slider-parceiros').owlCarousel({
				loop:true,
			    nav:false,
			    dots:false,
				autoplayTimeout:2500,
				autoplay:true,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:2
			        },
			        800:{
			            items:3
			        },
			        1000:{
			            items:5
			        }
			    }
			});
			var slider_cursos = $('#slider-cursos').owlCarousel({
				loop:true,
			    nav:false,
			    dots:false,
			    autoplayTimeout:2500,
			    autoplay:true,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:1
			        },
			        800:{
			            items:1
			        },
			        1000:{
			            items:2
			        }
			    }
			});

			$('#noticias .btn-left').click(function() {
				slider_noticias.trigger('prev.owl.carousel');
			})
			$('#noticias .btn-right').click(function() {
				slider_noticias.trigger('next.owl.carousel');
			})

			$('#depoimentos .btn-left').click(function() {
				slider_depoimentos.trigger('prev.owl.carousel');
			})
			$('#depoimentos .btn-right').click(function() {
				slider_depoimentos.trigger('next.owl.carousel');
			})

			$('#parceiros .btn-left').click(function() {
				slider_parceiros.trigger('prev.owl.carousel');
			})
			$('#parceiros .btn-right').click(function() {
				slider_parceiros.trigger('next.owl.carousel');
			})
			
			// $("html").niceScroll();


			$('button.button-toggle').click(function(){
				$('#content').toggleClass('large-10');
				$('#widgets').toggleClass('large-4').toggleClass('large-2');
			})

			$('#toggle-search').click(function(){
				var p = $('#toggle-search').attr("data-toggle")
				$('#' + p).toggleClass('toggle-show');
				console.log(p);
			})

			$('.link-close').click(function(e){
				e.preventDefault();
				$('#modal-create').foundation('close');
				$('#modal-login').foundation('close');
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

			// $('a, button, .btn-search, .content, .owl-item, #responsive-menu-container').not('.logo, #scrollToTop, .esqueceu-senha , .modal-create , #modal-login , #create-account-button, #logo-icms a , #responsive-menu-button ,#depoimentos a, #inscrever ,#depoimentos button, .widget ,.link-close , .button-toggle, [href*="/curso/"]').click(function(e){
		 //        if(!AUTHED )
		 //        {
		 //            e.preventDefault();

		 //            var redirect_to = '';

		 //            if( $(this).is('a') )
		 //                redirect_to = $(this).attr('href');

		 //            if( $(this).is('button') )
		 //                redirect_to =	 $(this).parents('form').attr('action');

		 //            if( ! redirect_to )
		 //                redirect_to = window.location.href;

		 //            $('[name=redirect_to]').val(redirect_to);


		 //           $('#modal-create').foundation('close');
		 //           $('#modal-login').foundation('close');
		 //        }
		 //    });
			
			// if(!AUTHED){
			// 	$('#modal-login').foundation('open');
			// }

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


