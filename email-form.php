<?php
	session_start();
?>

<!doctype html>
<html lang="pt-br">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>

		<title>Enviando email com PHP</title>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		
		<style>
			.container .form-signin .group{
				max-width: 90%;
				padding: 20px;
				margin: auto;
				margin-bottom: 40px;
				border: 1px solid #999;
				border-radius: 10px;
			}
		</style>
		
	</head>
	
	<body>	
	
		<div class="container">
			<div class="form-signin">
				<h1 class="h3 text-center mt-5">Preencha o formulário</h1>
				<h2 class="small text-center mb-5">Os campos com (*) são obrigatórios!!</h2>
				
				<?php
					if ( isset( $_SESSION['msg-email'] ) ) {
						echo $_SESSION['msg-email'];
						unset( $_SESSION['msg-email'] );
					}
				?>
				
				<div class="group">
					<form method="POST" action="enviar.php">
						<div class="form-group">
							<label for="formGroupName">
								Nome:
							</label>
							<input
								type="text"
								name="nome"
								class="form-control"
								id="formGroupName"
								placeholder="Insira seu nome"
								value="Antônio marquês da silva";
							>
						</div>
						
						<div class="form-group">
							<label for="formGroupEmail">
								Email:
							</label>
							<input
								type="email"
								name="email"
								class="form-control"
								id="formGroupEmail"
								placeholder="Insira seu email"
								value="antonio@antonio.com.br";
							>
						</div>
						
						<div class="form-group">
							<label for="formGroupTelephone">
								Telefone:
							</label>
							<input
								type="text"
								name="telefone"
								class="form-control"
								id="formGroupTelephone"
								placeholder="Insira seu telefone"
								value="+55 11 957358010";
							>
						</div>
						
						<div class="form-group">
							<label for="formGroupMsg">
								Mensagem:
							</label>
							<textarea
								name="msg"
								class="form-control"
								id="FormGroupMsg"
								rows="3">Izael alves da silva pereira de alencar bezerra carvalho de sousa ferreira burkhardt lima argolo franco sherazadi lobato mineiro cordeiro alves toledo.
							</textarea>
						</div>
						
						<div class="row">
							<div class="col">
								<input type="reset" class="campo_submit" value="Limpar" />
								<input type="submit" class="campo_submit" value="Enviar" />
							</div>
							<div class="col">
								<small class="float-right">* Campos obrigatorios</small>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script>
	</body>
	
</html>