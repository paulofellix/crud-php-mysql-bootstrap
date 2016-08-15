<?php

	$link = mysqli_connect("localhost", "root", "123", "album_store");

	if (!$link) {
	    echo "Erro ao conectar no banco de dados<br>";
	    // echo "Descrição do erro: " . mysql_connect_error() . PHP_EOL;
	    exit;
	}

?>