<?php
	require_once('Config/conexao.php');

	function buscaUsuario($conexao, $login, $senha) {

		$senhaMd5 = md5($senha);
		$login = mysqli_real_escape_string($conexao, $login); // Tratamento de aspas no sql
		
		$query = "select * from usuario where login = '$login' and senha = '$senhaMd5'";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
		
	}

?>