<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');	  
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Usuario.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');      

	verificaUsuario();  

	if (isset($_GET['acao']))
	{
		$codusu = $_GET['codusu'];

		if ($_GET['acao'] = 'excluir'){
			if (removeUsuario($conexao, $codusu)){
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
			$codusu = $_POST['codusu'];
			$nomcom = $_POST['nomcom'];
			$nomusu = $_POST['nomusu'];
			$emausu = $_POST['emausu'];
			$datnas = $_POST['datnas'];

			if (alteraUsuario($conexao, $codusu, $nomcom, $nomusu, $emausu, $datnas)){
				$_SESSION['success'] = "Alterado com sucesso!";
			}
			else {
				$_SESSION['danger'] = "Erro ao alterar!";
				echo mysql_error();
			}
		} 
	}

	header("Location: ".SCRIPT_ROOT."/consulta/Usuarios.php");
?>