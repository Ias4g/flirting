<?php
	SESSION_START();
?>
<!DOCTYPE html>
<html lang='pt-br'>
	<head>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
		<title>Cadastros de códigos</title>
	
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
	<body>
		<div class='container'>
			<?php
				if ( isset( $_SESSION['msg-cadastrar'] ) ) {
					echo $_SESSION['msg-cadastrar'];
					unset( $_SESSION['msg-cadastrar'] );
				}
			?>
			
			<div class='form-signin'>
				<form class='text-center' method='POST' action='valida-cadastros.php'>
					<a href="index.php"><img class='mb-3' src='img/genero.svg' alt='logo' width='52' height='52'></a>
					
					<h1 class='h5 font-weight-normal mb-4'>Cadastro de códigos</h1>
					
					<h2 class='h6 font-weight-normal mb-0'>Preencha os campos abaixo!!</h2>
					
					<small class='text-muted'>Os campos com ( * ) são obrigatórios</small>
					
					<input onpaste="return false"; ondrop="return false"; type='text' autocomplete="off" id='nome' name='nome' class='form-control text' placeholder='Nome completo(*)' autofocus>
					
					<input onpaste="return false"; ondrop="return false"; autocomplete="off" type='text' id='universal' name='codigo' class='form-control mb-3' placeholder='Digite o código(*)' onkeypress="$(this).mask('000-SS-0-S-00-SSS')" autofocus>
				   
					<input type='submit' name='btnLogin' value='Cadastrar' class='btn btn-lg btn-primary btn-block'>
					
					<p class='mt-5 mb-3 text-muted'>KammaSultra &copy;
						<script type='text/javascript'>
						document.write(new Date().getFullYear());
						</script>
					</p>
				</form>
			</div>
		</div>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
		<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
		<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script>
	</body>
</html>