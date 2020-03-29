<?php
session_start();
?>

<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

        <title>Fkwant - tela de acesso</title>
		
		<link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="imgimg/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
		<link rel="manifest" href="config/manifest.json">

        <!-- BOOTSTRAP CSS VIA ARQUIVOS LOCAIS... -->
        <link rel='stylesheet' href='styled/css/style.css'>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>

    </head>

    <body class='text-center'>
        <div class='container'>
		
			<?php
				if ( isset( $_SESSION['msg-index'] ) ) {
					echo $_SESSION['msg-index'];
					unset( $_SESSION['msg-index'] );
				}
			?>
		
            <div class='form-signin'>

                <form method='POST' action='valida-login.php'>
                    <img class='mb-3' src='img/genero.svg' alt='logo' width='52' height='52'>

                    <h1 class='h5 font-weight-normal mb-3'>Acessar site <b>Fkwant</b></h1>

                    <p class='small text-muted'>Para ter acesso à este site coloque no campo abaixo o código que recebeu através de uma carta.</p>

                    <input onpaste='return false' ; ondrop='return false' ; type='text' id='universal' name='inputCodigo' class='form-control text' autocomplete='off' placeholder='Digite o código aqui!!' onkeypress="$(this).mask('000-SS-0-S-00-SSS')" autofocus maxlength='17'>

                    <input type='submit' name='btnLogin' value='Entrar' class='btn btn-lg btn-primary btn-block'>
					
					<a href="cadastrar.php" class="mt-0 mr-3 float-right small">Cadastrar códigos</a>
                </form>
				
				<p class='mt-5 text-muted'>Fkwant &copy;
					<script type='text/javascript'>
					document.write(new Date().getFullYear());
					</script>
                </p>
				
            </div>
		
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Launch demo modal</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden"true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button> 
						</div>
						<div class="modal-body">
							<input type='text' id='universal' name='inputCodigo' class='form-control text' autocomplete='off' 
							placeholder='Digite o código aqui!!' autofocus>
							
							<input type='text' id='universal' name='inputCodigo' class='form-control text' autocomplete='off' 
							placeholder='Digite o código aqui!!' autofocus>
							
							<input type='text' id='universal' name='inputCodigo' class='form-control text' autocomplete='off' 
							placeholder='Digite o código aqui!!' autofocus>
							
							<input type='text' id='universal' name='inputCodigo' class='form-control text' autocomplete='off' 
							placeholder='Digite o código aqui!!' autofocus>
							
							<input type='text' id='universal' name='inputCodigo' class='form-control text' autocomplete='off' 
							placeholder='Digite o código aqui!!' autofocus>
							
							<input type='text' id='universal' name='inputCodigo' class='form-control text' autocomplete='off' 
							placeholder='Digite o código aqui!!' autofocus>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
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