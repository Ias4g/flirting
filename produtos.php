<?php

    require_once( 'connection.php' );
    class TableRows extends RecursiveIteratorIterator {
        function __construct( $it ) {
            parent::__construct( $it, self::LEAVES_ONLY );
        }

        function current() {
            return "<td style='width:100px; border:1px solid black; padding:10px;'>" . parent::current(). '</td>';
        }

        function beginChildren() {
            echo '<tr>';
        }

        function endChildren() {
            echo '</tr>';
        }
    }
	
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

        <title>Mostrando os registros cadastrados na base de dados!!!</title>

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
		
        <link rel='stylesheet' href='styled/css/style-view-products.css'>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>

    </head>
    <body>
        <div class="container">
            <div class="form-signin">
                <?php
                    $conn = getConnection();
                    $stmt = $conn->prepare( 'SELECT user_id, user_name, user_codigo FROM codigos' );
                    $stmt->execute();
                    $lin = $stmt->rowCount();

                    $result = $stmt->setFetchMode( PDO::FETCH_ASSOC );

                    if ($lin === 0) {
                        echo '<p class="h4 alert alert-warning mb-4">Nenhum registro foi encontrado...</p>';
                    }else{
                        echo '<p class="h5 mb-4">Mostrando os dados diretamente cadastrados no banco de dados.</p>';
                        echo "<table class='text-center' style='border:solid 1px black; margin:auto'>";
                        echo "<tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>CÓDIGO</th>
                            </tr>"
                        ;

                        foreach ( new TableRows( new RecursiveArrayIterator( $stmt->fetchAll() ) ) as $k=>$v ) {
                            echo $v;
                        }

                        echo '</table>';
                    }
					
                    $conn = null;
                ?>
            </div>
        </div>
    </body>
</html>