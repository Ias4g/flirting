<?php
	session_start();
	
	$btnVerifyCode = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
	
	if($btnVerifyCode){
		include_once 'connection.php';
		
		$conn = getConnection();
		
		$codigo = filter_input(INPUT_POST, 'inputCodigo', FILTER_DEFAULT);
		
		$erro = false;
		
		if(empty($codigo)){
			
			$erro = true;
			$_SESSION['msg-index'] = "<div class='alert alert-warning'>Campos (*) obrigatórios!!</div>";
			header('Location: index.php');
			
		}else{
			
			$cod_encrypt = md5($codigo);
			
			$stmt = $conn->prepare('SELECT user_codigo FROM codigos WHERE user_codigo = :cod_encrypt');
			$stmt->bindParam(':cod_encrypt', $cod_encrypt, PDO::PARAM_STR);
			$stmt->execute();
			$linhas = $stmt->rowCount();

			if($linhas > 0){
				$erro = true;
				$_SESSION['msg-index'] = "<div class='alert alert-warning'>Este usuário já está sendo utilizado!</div>";
				header('Location: index.php');
			}else{
				$erro = true;
				$_SESSION['msg-index'] = "<div class='alert alert-warning'>Nenhum resultado encontrado com o codigo " . $codigo . "</div>";
				header('Location: index.php');
			}
			
		}
		/*
		if(!$erro){
			$dados['inputCodigo'] = password_hash($dados['inputCodigo'], PASSWORD_DEFAULT);
			$stmt = $conn->prepare("INSERT INTO codigos VALUES (user_name=:inputNome, user_codigo=:inputCodigo)");
			$stmt->bindParam(':inputNome', $dados['inputNome'], PDO::PARAM_STR);
			$stmt->bindParam(':inputCodigo', $dados['inputCodigo'], PDO::PARAM_STR);
			

			if($stmt->execute()){
				$_SESSION['msgcad'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso!</div>";
				header("Location: login.php");
			}else{
				$_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar o usuário!</div>";
			}
		}
		*/
	}else {
		$_SESSION['msg-index'] = "<div class='alert alert-warning mt-3 text-center' role='alert'>Página inválida!!!</div>";
		header( 'Location: index.php' );
	}
	
	$conn = NULL;
?>