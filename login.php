<?php
	include('Config/conexao.php');
	require_once('banco/Usuario.php');
	require_once('Config/controleUsuario.php');

	$usuario = buscaUsuario($conexao, $_POST['login'], $_POST['password']);

	if ($usuario == null) {
		$_SESSION['danger'] = "Usuário ou senha inválida.";
		header("Location: index.php");
	} else {
		$_SESSION['success'] = "Usuário logado com sucesso..";
		logaUsuario($usuario['login'], $usuario['codusu'], $usuario['tipusu']);
		header("Location: consulta/Chamados.php?sitatn=1,5");
	}

	die();
?>
