<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Chamados.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');

	verificaUsuario();

	$codatn = $_POST['codatn'];
	$codcli = $_POST['codcli'];
	$codate = $_POST['codate'];
	$codusu = $_POST['codusu'];
	$nivpri = $_POST['nivpri'];
	$datger = $_POST['datger'];
	$sitatn = $_POST['sitatn'];
	$datprv = $_POST['datprv'];
	$datatu = $_POST['datatu'];
	$datfim = $_POST['datfim'];
	$natatn = $_POST['natatn'];
	$descli = $_POST['descli'];
	$desate = $_POST['desate'];



	if (isset($_GET['acao']))
	{

		if ($_GET['acao'] = 'excluir'){
			$codatn = $_GET['codatn'];
			if (removeChamado($conexao, $codatn)){
				$_SESSION['success'] = "Removido com sucesso!";
			}
			else
			{
				$_SESSION['danger'] = "Erro ao remover!";
				echo mysql_error();
			}
		}

	} else {
		if ($codatn != '')
		{
			if (tipoUsuario() == 'C')
			{
				if (clienteAlteraChamado($conexao, $codatn, $sitatn, $natatn, $descli)){
					$_SESSION['success'] = "Alterado com sucesso!";
				}
				else {
					$_SESSION['danger'] = "Erro ao alterar!";
					echo mysql_error();
				}
			} else {
				if (alteraChamado($conexao, $codatn, $codate, $sitatn, $natatn, $datprv, $nivpri, $desate))
				{
					$_SESSION['success'] = "Alterado com sucesso!";
				}
				else
				{
					$_SESSION['danger'] = "Erro ao alterar!";
					echo mysql_error();
				}
			}

		} else {
			if (insereChamado($conexao, $codcli, $codusu, $natatn, $descli)){
				$_SESSION['success'] = "Inserido com sucesso!";
			}
			else {
				$_SESSION['danger'] = "Erro ao inserir!";
				echo mysql_error();
			}
		}
	}

	header("Location: ".SCRIPT_ROOT."/consulta/Chamados.php");
?>
