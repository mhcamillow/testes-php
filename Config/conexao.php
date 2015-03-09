<?php
/*
    $server = "localhost";
	$user = "root";
	$senha = "";
	$nome_banco = "oficina";

	

	$conecta = mysql_connect($server, $user, $senha) or die ("Erro de conexão");

	mysql_select_db($nome_banco, $conecta) or die ("Erro ao conexaor ao banco");
	*/
	$conexao = mysqli_connect('localhost', 'root', '', 'helpdesk');
?>