<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');	  
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Usuario.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');   

	$nomcom = $_POST['nomcom'];
	$nomusu = $_POST['nomusu'];
	$senusu = $_POST['senusu'];
	$emausu = $_POST['emausu'];
	$datnas = $_POST['datnas'];
	
	if (loginExistente($conexao, $nomusu))
	{
		$_SESSION['danger'] = "Este login já está sendo utilizado.";
	}
	else
	{
		if (insereUsuario($conexao, $nomcom, $nomusu, $senusu, $emausu, $datnas))
		{
			$_SESSION['success'] = "Usuário cadastrado com sucesso.";
		} else {
			$_SESSION['danger'] = "Erro ao cadastrar usuário.";
		}	
	}

	header("Location:index.php");
	die();	
    
?>