<?php
	
	//Variáveis
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$mensagem = $_POST['msg'];
	$data_envio = date('d/m/Y');

	date_default_timezone_set('America/Sao_Paulo');
	$hora_envio = date('H:i:s', time());	

	// Compo E-mail

	$arquivo = "
		<style>
			table{
				width: 40%;
				border: 1px solid #999;
				border-radius: 10px;
			}

			td{
				text-align: center;
			}

			.bt{
				border-bottom: 1px solid #999;
			}

		</style>

		<html>
			<body align='center'>
				<table cellpadding='10' cellspacing='10' bgcolor='#fff'>
				
					<tr>
						<td class='bt'> <b>Nome:</b> $nome</td>
					</tr
					
					<tr>
						<td class='bt'> <b>E-mail:</b> $email</td>
					</tr

					<tr>
						<td class='bt'><b>Telefone:</b> $telefone</td>
					</tr

					<tr>
						<td class='bt'> <b>Mensagem:</b><br> $mensagem</td>
					</tr>
			
					<tr>
						<td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
					</tr>

				</table>
		  	</body>
	  	</html>
	";

	//enviar
	// emails para quem será enviado o formulário
	$emailenviar = "izaell.oficial@gmail.com";
	$destino = $emailenviar;
	$assunto = "QUESTIONÁRIO DO SITE <FKWant>";
	
	$headers = "MIME-Version: 2.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
	$headers .= "From: " . $email; // remetente
	$headers .= " De: " . $nome;

	//echo $arquivo;
	
	$enviaremail = mail($destino, $assunto, $arquivo, $headers);
	
	if($enviaremail){
		$mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
		echo " <meta http-equiv='refresh' content='2; URL=email-form.php'>" . $mgm;
		
		//$_SESSION['msg-email'] = "<div class='alert alert-warning'>Campos (*) obrigatórios!!</div>";
		//header('Location: index.php');
	} else {
		$mgm = "A mensagem não pode ser enviada";
		echo $mgm;
	}
?>