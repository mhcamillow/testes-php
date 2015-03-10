<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/conexao.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');

	function listaChamados($conexao) {
		$codusu = codigoUsuario();

    if (tipoUsuario() == 'C')
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

	function insereChamado($conexao, $codcli, $codusu, $natatn) {
		$query = "insert into f114cab (codatn, codcli, codusu, datger, sitatn, natatn)
					values (null, '$codcli',  '$codusu', SYSDATE(), '1', '$natatn')";
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

	function getUltimoChamado($conexao, $codcli, $codusu, $natatn){
		$sql = "select codatn, sitatn, nivpri
				from f114cab 
				where codcli = '$codusu'
				  and codusu = '$codusu'
				  and natatn = '$natatn'";
		$resultado = mysqli_query($conexao, $sql);
		return mysqli_fetch_assoc($resultado);
	}

	function insereMensagemInicial($conexao, $desatn, $codusu, $codcli, $natatn) {

		$chamado = getUltimoChamado($conexao, $codcli, $codusu, $natatn);

		$codatn = $chamado['codatn'];
		$sitatn = $chamado['sitatn'];
		$nivpri = $chamado['nivpri'];

		$query = "insert into f114msg (codatn, seqatn, desatn, codcli, codate, sitatn, datatu, codusu, nivpri)
					values ('$codatn', '1', '$desatn', '$codcli', '0', '$sitatn', sysdate(), '$codusu', '$nivpri')";
		return mysqli_query($conexao, $query);
	}
?>
