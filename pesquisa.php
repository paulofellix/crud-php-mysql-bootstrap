<?php 
	include_once 'conexao.php';
	$pesquisa = $_GET["termoPesquisa"];
	$queryPesquisa = sprintf("select * from album where UPPER(ds_album) like '%%%s%%'",strtoupper($pesquisa));
	$result = mysqli_query($link,$queryPesquisa);
	$jsonData = array();
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		array_push($jsonData, $row);
	}	
	echo json_encode($jsonData);
 ?>