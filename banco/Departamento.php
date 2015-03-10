<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/conexao.php');


	function buscaUsuarioDepartamento($conexao, $codusu) {

		$query = "select coddep, desdep, nomres, obsdep from f061dep where codusu = '$coddep'";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);

	}

	function insereDepartamento($conexao, $nomcom, $nomusu, $senusu, $emausu, $datnas) {
		$senhaMd5 = md5($senusu);
		$query = "insert into f999cpl (coddep, desdep, nomres, obsdep) values (null, '$coddep', '$desdep', '$nomres', '$obsdep')";
		return mysqli_query($conexao, $query);
	}

	function listaDepartamento($conexao) {
		$sql = "select coddep, desdep, nomres, obsdep from f999cpl";
		$usuarios = array();
		$resultado = mysqli_query($conexao, $sql);

		while($usuario = mysqli_fetch_assoc($resultado)) {
			array_push($usuarios, $usuario);
		}

		return $usuarios;
	}

	function alteraUsuario($conexao, $codusu, $nomcom, $nomusu, $emausu, $datnas) {
		$query = "update f999cpl set nomcom = '$nomcom', nomusu = '$nomusu', emausu = '$emausu', datnas = '$datnas' where codusu = '$codusu'";
		return mysqli_query($conexao, $query);
	}

	function removeUsuario($conexao, $codusu) {
		$query = "delete from f999cpl where codusu = '$codusu'";
		return mysqli_query($conexao, $query);
	}

?>
