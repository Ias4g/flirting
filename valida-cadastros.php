<?php
	SESSION_START();
	include_once( "connection.php" );

	$btnLogin = filter_input( INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING );

	if ( $btnLogin ) {
		$conn = getConnection();
		$nome = $_POST['nome'];
		$codigo = $_POST['codigo'];
		if ( ( !empty( $nome ) ) && ( !empty( $codigo ) ) ) {
			$cod_crypt = md5($codigo);
			$result_cod = $conn->prepare("SELECT user_codigo FROM codigos WHERE user_codigo = :cod_crypt");
			$result_cod->bindParam(':cod_crypt', $cod_crypt);
			$result_cod->execute();
			$linha = $result_cod->rowCount();

			if($linha != 0){
				$_SESSION['msg-cadastrar'] = "<div class='alert alert-danger text-center'>Este código já se encontra cadastrado em nossa base!</div>";
				header( 'Location: cadastrar.php' );
			}else{
				$insert = 'INSERT INTO codigos (user_name, user_codigo) VALUES (:nome, :cod_crypt)';
				try {
					$stmt = $conn->prepare( $insert );
					$stmt->bindParam( ':nome', $nome, PDO::PARAM_STR );
					$stmt->bindParam( ':cod_crypt', $cod_crypt, PDO::PARAM_STR );

					$stmt->execute();

					$count = $stmt->rowCount();

					if ( $count > 0 ) {
						$_SESSION['msg-cadastrar'] = "<div class='alert alert-success mt-3 text-center' role='alert'>Dados inseridos com sucesso!!</div>";
						header( 'Location: cadastrar.php' );
					} else {
						$_SESSION['msg-cadastrar'] = "<div class='alert alert-danger mt-3 text-center'> Error: na inserssão de dados<br>" . $sql . $conn->error . '</div>';
						header( 'Location: cadastrar.php' );
					}

				} catch( PDOException $e ) {
					$_SESSION['msg-cadastrar'] = "<div class='alert alert-danger mt-3 text-center'> Error: do CATCH{}<br>" .$e->getMessage() . '</div>';
					header( 'Location: cadastrar.php' );
				}
			}

		} else {
			$_SESSION['msg-cadastrar'] = "<div class='alert alert-warning mt-3 text-center' role='alert'>Campos (*) obrigatórios!!!</div>";
			header( 'Location: cadastrar.php' );
		}
		
	} else {
		$_SESSION['msg-cadastrar'] = "<div class='alert alert-warning mt-3 text-center' role='alert'>Página inválida!!</div>";
		$conn = NULL;
		header( 'Location: cadastrar.php' );
	}
?>