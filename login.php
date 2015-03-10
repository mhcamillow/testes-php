<<<<<<< HEAD
<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/conexao.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Usuario.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');
	
=======
<?php
	include('Config/conexao.php');
	require_once('banco/Usuario.php');
	require_once('Config/controleUsuario.php');

>>>>>>> origin/master
	$usuario = buscaUsuario($conexao, $_POST['login'], $_POST['password']);

	if ($usuario == null) {
		$_SESSION['danger'] = "Usuário ou senha inválida.";
		header("Location: index.php");
	} else {
		$_SESSION['success'] = "Usuário logado com sucesso..";
		logaUsuario($usuario['login']);
<<<<<<< HEAD
		header("Location: consulta/Usuarios.php?");
=======
		header("Location: consulta/Chamados.php?");
>>>>>>> origin/master
	}

	die();
?>
