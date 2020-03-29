<?php
    session_start();

    function getPostgres(){

        $servername = 'localhost';
        $dbname = 'id12773404_fkwant';
        $username = 'id12773404_fkwant';
        $password = 'sWI4*b3jUn4S3QHhIdJ(';

        try {
            $conn = new PDO( "pgsql:host=$servername;dbname=$dbname", $username, $password );
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); // defina o modo de erro do PDO como exceção
            //echo 'Conexão estabelecida com sucesso!!!';
            return $conn;
        } catch( PDOException $e ){

            $_SESSION['msg-index'] = "<div class='alert alert-warning'>Conexão não estabelecida, ocorreu um erro: ' . $e->getMessage()</div>";
			header('Location: index.php');
        }
    }

    function getMySQL(){

        $servername = '';
        $dbname = '';
        $username = '';
        $password = '';

        try {
            $conn = new PDO( "mysql:host=$servername;dbname=$dbname", $username, $password );
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); // defina o modo de erro do PDO como exceção
            //echo 'Conexão estabelecida com sucesso!!!';
            return $conn;
        } catch( PDOException $e ){
            echo ';
            $_SESSION['msg-index'] = "<div class='alert alert-warning'>Conexão não estabelecida, ocorreu um erro: ' . $e->getMessage()</div>";
			header('Location: index.php');
        }
    }
?>