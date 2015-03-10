<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Departamento.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');

	verificaUsuario();

	if (isset($_GET['acao']))
	{
		$codusu = $_GET['coddep'];

		if ($_GET['acao'] = 'excluir'){
			if (removeDeposito($conexao, $codusu)){
				$_SESSION['success'] = "Removido com sucesso!";
			}
			else
			{
				$_SESSION['danger'] = "Erro ao remover!";
				echo mysql_error();
			}
		}

	} else {
		if (isset($_POST['codusu']))
		{
			$coddep = $_POST['coddep'];
			$desdep = $_POST['desdep'];
			$nomres = $_POST['nomres'];
			$obsdep = $_POST['obsdep'];

			if (alteraDeposito($conexao, $coddep, $desdep, $nomres, $obsdep)){
				$_SESSION['success'] = "Alterado com sucesso!";
			}
			else {
				$_SESSION['danger'] = "Erro ao alterar!";
				echo mysql_error();
			}
		}
	}

	header("Location: ".SCRIPT_ROOT."/consulta/Departamento.php");
?>
