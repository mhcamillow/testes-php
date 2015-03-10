<?php
	require_once('Config/conexao.php');

	function buscaUsuario($conexao, $login, $senha) {

		$senhaMd5 = md5($senha);
		$login = mysqli_real_escape_string($conexao, $login); // Tratamento de aspas no sql
		
		$query = "select nomusu as login from f999cpl where nomusu = '$login' and senusu = '$senhaMd5'";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
		
	}

	function insereUsuario($conexao, $nomusu, $nomusu, $senusu, $emausu, $datnas) {
		$senhaMd5 = md5($senusu);
		$query = "insert into f999cpl (codusu, nomusu, nomusu, senusu, tipusu, emausu, datnas) values (null, '$nomusu', '$nomusu', '$senhaMd5', 'C', '$emausu', '$datnas')";
		return mysqli_query($conexao, $query);
	}
 
?>