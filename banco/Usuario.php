<?php
	require_once('Config/conexao.php');

	function buscaUsuario($conexao, $login, $senha) {

		$senhaMd5 = md5($senha);
		$login = mysqli_real_escape_string($conexao, $login); // Tratamento de aspas no sql
		
		$query = "select nomusu as login from f999cpl where nomusu = '$login' and senusu = '$senhaMd5'";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
		
	}

?>