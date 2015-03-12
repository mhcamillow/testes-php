<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/conexao.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');

	function listaDepartamentos($conexao) {
		$sql = "select coddep, desdep from f061dep";

		$consultas = array();
		$resultado = mysqli_query($conexao, $sql);

		while($consulta = mysqli_fetch_assoc($resultado)) {
			array_push($consultas, $consulta);
		}

		return $consultas;
	}
?>
