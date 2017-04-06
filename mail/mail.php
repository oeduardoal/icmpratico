<?php
	function send_contact_form($nome, $email, $phone, $assunto,$mensagem, $para){

	 // 	require('mail/class.phpmailer.php');
	 //    require('mail/class.smtp.php');

	 // 	date_default_timezone_set('America/Sao_Paulo');
	 //    $mail = new PHPMailer();
	 //    $mail->IsSMTP();
	    
	 //    // Configuração
	 //    $mail->Host = 'servidor.wsfsolucoesweb.com.br';
	 //    $mail->SMTPAuth = true;
	 //    $mail->Username = 'smtp@wsfsolucoesweb.com.br';
	 //    $mail->Password = 'web@1qwer'; 
	 //    $mail->CharSet='UTF-8';

	 //    // Post
	 //    $mail->setFrom('contato@jangadatur.com.br', 'Jangada Tur');
	 //    $mail->addReplyTo($email, $nome);
	 //    $mail->Subject = " Jangada Tur | " . $assunto;
	 //    $content .= 'Olá, ';
	 //    $content .= $nome . ' fez um contato.' . "\r\n\r";
	 //    $content .= 'Mensagem: '. $mensagem . "\r\n";;
	 //    $content .= 'E-mail: ' . $email . "\r\n";
	 //    $content .= 'Telefone: ' . $phone . "\r\n";
	 //    $mail->Body = $content;

	 //    // Enviar Para
	 //    $mail->AddAddress($para);
	 

	 //    	if($mail->Send()):
	 //    		header("Location: " . get_site_url() ." ");
	 //    	endif;
			

		// $mail->ClearAllRecipients();


	}

	if(isset($_POST['enviar'])):
		// $nome = $_POST['nome'];
		// $email = $_POST['email'];
		// $phone = $_POST['phone'];
		// $assunto = $_POST['assunto'];
		// $mensagem = $_POST['mensagem'];
		// $para  = $_POST['para'];
		// if(!empty($nome) || !empty($email) || !empty($phone) || !empty($assunto) || !empty($mensagem)):
		// 	send_contact_form($nome, $email, $phone, $assunto,$mensagem, $para);
		// else:
		// 	header("Location: " . get_site_url() ." ");
		// endif;
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$assunto = $_POST['assunto'];
			$telefone = $_POST['phone'];
			$msg = $_POST['mensagem'];


			$mensagem .= "Olá! ${nome} entrou em contato. <br><br>";
			$mensagem .= "<strong>Nome: </strong> ${nome}<br>";
			$mensagem .= "<strong>Email: </strong> ${email}<br>";
			$mensagem .= "<strong>Telefone: </strong> ${telefone}<br>";
			$mensagem .= "<strong>Assunto: </strong> ${assunto}<br>";
			$mensagem .= "<strong>Mensagem: </strong> ${msg}<br>";

			$post = [
			'send'     => $_POST['para'],
			'Nome'     => get_bloginfo() . " - Contato",
			'Email'    => "${email}",
			'Assunto'  => get_bloginfo() . " | ${assunto}",
			'domain'   => $_SERVER['SERVER_NAME'],
			'mensagem' => $mensagem,
			'captcha'  => $_POST['captcha']
			];

			$ch = curl_init('wsfsolucoesweb.com.br/email/send_email_cdn.php');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

			// execute!
			$response = curl_exec($ch);

			// close the connection, release resources used
			curl_close($ch);

			// do anything you want with your response
			// echo($response);
			if($response){
				echo "<script>alert('Contato realizado com sucesso!'); location.href='" . get_site_url() . "'</script>";
			}
	endif;