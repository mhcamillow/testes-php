<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/conexao.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');

	function listaChamados($conexao, $filtro) {
		$codusu = codigoUsuario();
    if (tipoUsuario() == 'C')
			$sql = "select a.codatn, a.natatn, a.coddep, a.codare, a.codate, a.sitatn, DATE_FORMAT(a.datger, '%d-%m-%Y') datger, DATE_FORMAT(a.datprv, '%d-%m-%Y') datprv,
							DATE_FORMAT(a.datatu,'%d-%m-%Y') datatu, DATE_FORMAT(a.datfim, '%d-%m-%Y') datfim, b.nomcom from f114cab a
							left join f999cpl b on a.codate=b.codusu where codcli='$codusu'";
		else
			$sql = "select a.codatn, a.natatn, a.coddep, a.codare, a.codcli, a.sitatn, DATE_FORMAT(a.datger, '%d-%m-%Y') datger, DATE_FORMAT(a.datprv, '%d-%m-%Y') datprv,
							DATE_FORMAT(a.datatu,'%d-%m-%Y') datatu, DATE_FORMAT(a.datfim, '%d-%m-%Y') datfim, b.nomcom from f114cab a
							left join f999cpl b on a.codcli=b.codusu where (codate='$codusu' or codate=0)";
		if ($filtro != "")
			$sql = $sql ." and $filtro";

		$consultas = array();
		$resultado = mysqli_query($conexao, $sql);

		while($consulta = mysqli_fetch_assoc($resultado)) {
			array_push($consultas, $consulta);
		}

		return $consultas;
	}

	function buscaChamadoPorCodigo($conexao, $codatn){

		$query = "select codatn, codcli, codate, codusu, nivpri,
						 datger, sitatn, datprv, datatu, datfim, natatn, desate, descli
				  from f114cab
				  where codatn = '$codatn'";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);

	}

	function insereChamado($conexao, $codcli, $codusu, $natatn, $descli) {
		$query = "insert into f114cab (codatn, codcli, codate, codusu, datger, sitatn, datatu, natatn, descli)
					values (null, '$codcli', '0', '$codusu', SYSDATE(), '1', SYSDATE(), '$natatn', '$descli')";
		return mysqli_query($conexao, $query);
	}

	function removeChamado($conexao, $codatn) {
		$query = "delete from f114cab where codatn = '$codatn'";
		return mysqli_query($conexao, $query);
	}

    function clienteAlteraChamado($conexao, $codatn, $sitatn, $natatn, $descli) {

		if ($sitatn = '5'){
			$query = "update f114cab
					  set sitatn = '$sitatn',
					      datatu = sysdate(),
					      natatn = '$natatn',
					      datfim = sysdate(),
						  descli = '$descli'
					  where codatn = '$codatn'";
		} else {
			$query = "update f114cab
					  set sitatn = '$sitatn',
					      datatu = sysdate(),
					      natatn = '$natatn',
						  descli = '$descli'
					  where codatn = '$codatn'";
		}


		return mysqli_query($conexao, $query);
	}

	function alteraChamado($conexao, $codatn, $codate, $sitatn, $natatn, $datprv, $nivpri, $desate) {

		$query = "update f114cab
				  set codate = '$codate',
				      sitatn = '$sitatn',
				      natatn = '$natatn',
				      datprv = '$datprv',
					  nivpri = '$nivpri',
					  desate = '$desate',
					  datatu = sysdate()
				  where codatn = '$codatn'";

		return mysqli_query($conexao, $query);
	}
	/*
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
	*/
?>
