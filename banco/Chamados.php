<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/conexao.php');

  $codusu = "";
  $tipusu  = "";

  if (isset ($_GET['user']))
    $codusu = $_GET['user'];

  if (isset ($_GET['tip']))
    $tipusu = $_GET['tip'];

	function listaChamados($conexao) {

    if ($tipusu == 'C')
			$sql = "select codatn, natatn, coddep, codare, codate as codigo, sitatn, datger, datprv, datatu, datfim from f114cab where codcli='$codusu'";
		elseif ($tipusu == 'D')
			$sql = "select codatn, natatn, coddep, codare, codcli as codigo, sitatn, datger, datprv, datatu, datfim from f114cab where codate='$codusu'";
		$consultas = array();
		$resultado = mysqli_query($conexao, $sql);

		while($consulta = mysqli_fetch_assoc($resultado)) {
			array_push($consultas, $consulta);
		}

		return $consultas;
	}
	
	function insereChamado($conexao, $codatn, $codcli, $codate, $codusu, $nivpri, 
								$datger, $sitatn, $datprv, $datatu, $datfim, $natatn) {
		$query = "insert into f114cab (codatn, codcli, codate, codusu, nivpri, datger, sitatn, datprv, datatu, datfim, natatn) 
					values (null, '$codcli', '$codate', '$codusu', '$nivpri', '$datger', '$sitatn', '$datprv', '$datatu', '$datfim', '$natatn')";
		return mysqli_query($conexao, $query);
	}

	function removeChamado($conexao, $codatn) {
		$query = "delete from f114cab where codatn = '$codatn'";
		return mysqli_query($conexao, $query);
	}

    function alteraChamado($conexao, $codatn, $codcli, $codate, $codusu, $nivpri, 
								$datger, $sitatn, $datprv, $datatu, $datfim, $natatn) {
		$query = "update f114cab 
					set codcli = '$codcli', 
						codate = '$codate', 
						codusu = '$codusu', 
						nivpri = '$nivpri', 
						datger = '$datger', 
						sitatn = '$sitatn', 
						datprv = '$datprv', 
						datatu = '$datatu', 
						datfim = '$datfim', 
						natatn = '$natatn' 
					where codatn = '$codatn'";
		return mysqli_query($conexao, $query);
	}

	/*
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

	*/
?>
