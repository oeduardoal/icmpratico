<!DOCTYPE html>
<html>
<head <?php language_attributes(); ?>>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<![endif]-->
	
	<!-- Charset -->
  	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!-- <link rel="icon" href="http://oeduardoal.github.io/eduardoalmeida.ico"> -->
	<link rel="icon" href="<?php echo assetsurl ?>/assets/img/favicon.ico">

	<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,700,100,300,500,900" rel="stylesheet">
	  	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,100,300,500,900' rel='stylesheet' type='text/css'>
	  	<!-- Icons -->
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  	<!-- Fim Fonts -->
  	
  	<!-- Modernizr -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	<?php wp_head(); ?>

	<!-- SCRIPTS -->
	<script>
	    SITEURL = '<?php echo site_url(); ?>/';
	   	AJAXURL = '<?php echo admin_url('admin-ajax.php'); ?>';
	    AUTHED = <?php echo is_user_logged_in() ? 'true' : 'false'; ?>;
	</script>
</head>
<body <?php body_class(); ?>>


<!-- Modal  Login-->
<div class="reveal modal" id="modal-login" data-reveal data-close-on-click="true"  data-animation-in="fade-in">
	<header>
		 <h2>Área restrita, identifique-se para acessar.</h2>
	</header>
	<main>
		<?php wp_login_form( array('redirect' => 'http://192.168.2.250:3000/icms/','label_username' => __( 'Usuário' ),
	'label_password' => __( 'Senha' ),'redirect' => ! empty( $_GET['redirect_to'] ) ? $_GET['redirect_to'] : site_url() ) ); ?>
	</main>
	<footer>
		<a class="modal-create" href="#">+ Crie já sua conta!</a> 
	</footer>

</div>


<!-- Alert -->
<div class="callout message alert">
	<p></p>
</div>

<!-- Modal Criar Conta -->
<div class="reveal modal" id="modal-create" data-reveal  data-animation-in="fade-in">
	
	<header>
		<h2>Informe seus dados para criação da sua conta.</h2>
	</header>
		<main>
		   <form id="create-account" data-abide="ajax">
				<div data-abide-error class="alert callout" style="display: none;">
					<p><i class="fa fa-alert"></i>Existem erros no formulário</p>
				</div>
				
		  		<?php wp_nonce_field('vb_new_user','vb_new_user_nonce', true, true ); ?>
		  		<label>
		  			<input type="text" name="reg_user" placeholder="Login" autocomplete="off" aria-describedby="exampleHelpText" id="vb_username" required>
		  			<span class="form-error">Esse campo é requerido</span>
		  		</label>
		  		
		  		<label>
		        	<input type="email" name="reg_mail" placeholder="E-mail" autocomplete="off" required id="vb_email" value="">
		  			<span class="form-error">Esse campo é requerido</span>
		  		</label>

		  		<label>
		        	<input type="password" name="reg_pass" placeholder="Senha" required id="reg_pass" data-abide-ignore>
		  			<span class="form-error">Esse campo é requerido</span>
		  		</label>
		  		<label>
		  			 <input type="password" name="reg_pass_ver" data-equalto="reg_pass" placeholder="Confirmar Senha" required id="reg_pass_ver">
		  			 <span class="form-error">Confirme sua senha	</span>
		  		</label>
		       
				<label for="">
					<select name="reg_estado" id="vb_estado" required="required">
						<option value="">Selecione seu estado</option>
						<?php foreach(estados() as $uf => $nome): ?>
						<option value="<?php echo $uf; ?>"><?php echo $nome; ?></option>
						<?php endforeach; ?>
					</select>
					<span class="form-error">Esse campo é requerido</span>
				</label>
				
				<label for="">
					<input type="text" name="reg_cidade" placeholder="Cidade" autocomplete="off" required id="cidade">
					<span class="form-error">Esse campo é requerido</span>
				</label>
		       
			        <button type="submit" class="button expanded" id="create-account-button" data-loading-text="Processando..." value="Criar conta">Criar conta</button>
		    </form>
		<main>
    <br/>
    <footer>
    	<a class="modal-login" href="#"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
    </footer>
</div>

