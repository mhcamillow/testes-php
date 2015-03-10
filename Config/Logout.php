<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/Constantes.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php'); 
	$_SESSION['success'] = "Vai tarde!.";
	header("Location: ".SCRIPT_ROOT."/index.php");
	logout();
	die();
?>