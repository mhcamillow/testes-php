<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/conexao.php');

	function buscaUsuario($conexao, $login, $senha) {

		$senhaMd5 = md5($senha);
		$login = mysqli_real_escape_string($conexao, $login); // Tratamento de aspas no sql

		$query = "select nomusu as login, tipusu, codusu, nomcom from f999cpl where nomusu = '$login' and senusu = '$senhaMd5'";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
	}

	function buscaUsuarioPorCodigo($conexao, $codusu) {

		$query = "select codusu, nomcom, nomusu, tipusu, emausu, datnas, tipusu from f999cpl where codusu = '$codusu'";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);

	}

	function loginExistente($conexao, $nomusu){
		$query = "select count(*) as qtd from f999cpl where nomusu = '$nomusu'";
		$resultado = mysqli_query($conexao, $query);
		$r = mysqli_fetch_assoc($resultado);
		return ($r['qtd'] > 0);
	}

	function insereUsuario($conexao, $nomcom, $nomusu, $senusu, $emausu, $datnas) {
		$senhaMd5 = md5($senusu);
		$query = "insert into f999cpl (codusu, nomcom, nomusu, senusu, tipusu, emausu, datnas) values (null, '$nomcom', '$nomusu', '$senhaMd5', 'C', '$emausu', '$datnas')";
		return mysqli_query($conexao, $query);
	}

	function listaUsuarios($conexao) {
		$sql = "select codusu, nomcom, nomusu, tipusu, emausu, DATE_FORMAT(datnas, '%d-%m-%Y') datnas from f999cpl";
		$usuarios = array();
		$resultado = mysqli_query($conexao, $sql);

		while($usuario = mysqli_fetch_assoc($resultado)) {
			array_push($usuarios, $usuario);
		}

		return $usuarios;
	}

	function alteraUsuario($conexao, $codusu, $nomcom, $nomusu, $emausu, $datnas, $tipusu) {
		$query = "update f999cpl set nomcom = '$nomcom', nomusu = '$nomusu', emausu = '$emausu', datnas = '$datnas', tipusu= '$tipusu' where codusu = '$codusu'";
		return mysqli_query($conexao, $query);
	}

	function removeUsuario($conexao, $codusu) {
		$query = "delete from f999cpl where codusu = '$codusu'";
		return mysqli_query($conexao, $query);
	}

?>
