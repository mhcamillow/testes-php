<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');	  
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Usuario.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');   

	$nomusu = $_POST['nomusu'];
	$senusu = $_POST['senusu'];
	$emausu = $_POST['emausu'];
	$datnas = $_POST['datnas'];

	insereUsuario($conexao, $nomusu, $senusu, $emausu, $datnas);
    $_SESSION['success'] = "Usuário cadastrado com sucesso.";
    header("Location:index.php");
	die();
?>