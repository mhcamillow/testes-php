<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/conexao.php');

  $codusu = "";
  $tipusu  = "";

  if (isset ($_GET['user']))
    $codusu = $_GET['user'];

  if (isset ($_GET['tip']))
    $tipusu = $_GET['tip'];

	function listaChamados($conexao) {
    $sql = "select codatn, natatn, coddep, codare, codate, sitatn, datger, datprv, datatu, datfim from f114cab where 1=1";
    if (($codusu <> 0) and ($tipusu = 'C')){
      $sql = $sql + " and codcli='$codusu'";
    }
		$consultas = array();
		$resultado = mysqli_query($conexao, $sql);

		while($consulta = mysqli_fetch_assoc($resultado)) {
			array_push($consultas, $consulta);
		}

		return $consultas;
	}
	/*
	function insereConsulta($conexao, $id_paciente, $data_consulta, $hora, $atendida, $observacao) {
		$query = "insert into consulta (id_paciente, data_consulta, hora, atendida, observacao) values ('$id_paciente', '$data_consulta', '$hora', '$atendida', '$observacao')";
		return mysqli_query($conexao, $query);
	}

	function removeConsulta($conexao, $id_consulta) {
		$query = "delete from consulta where id_consulta = '$id_consulta'";
		return mysqli_query($conexao, $query);
	}

	function buscaConsulta($conexao, $id_consulta) {
		$query = "select * from consulta where id_consulta = '$id_consulta'";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
	}

	function buscaConsultaPaciente($conexao, $id_paciente) {
		$query = "select * from paciente where id_paciente = '$id_paciente'";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
	}

    function alteraConsulta($conexao, $id_consulta, $data_consulta, $hora, $observacao, $atendida) {
		$query = "update consulta set data_consulta = '$data_consulta', hora = '$hora', observacao = '$observacao', atendida = '$atendida' where id_consulta = '$id_consulta'";
		return mysqli_query($conexao, $query);
	}
	*/
?>
