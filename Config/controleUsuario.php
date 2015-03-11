<?php

	session_start();

	function usuarioEstaLogado() {
		return isset($_SESSION['usuario_logado']);
	}

	function verificaUsuario() {
      	if (!usuarioEstaLogado()) {
      		$_SESSION['danger'] = "Você não tem acesso.";
		  	header("Location: ".SCRIPT_ROOT."/index.php");
		  	die();
	  	}
    }

    function usuarioLogado() {
    	return $_SESSION['usuario_logado'];
    }

    function logaUsuario($login, $codusu, $tipusu, $nomcom) {
    	$_SESSION['usuario_logado'] = $login;
			$_SESSION['tipo_usuario']	  = $tipusu;
			$_SESSION['codigo_usuario'] = $codusu;
			$_SESSION['nome_usuario']		= $nomcom;
    }

		function tipoUsuario(){
			return $_SESSION['tipo_usuario'];
		}

		function codigoUsuario(){
			return $_SESSION['codigo_usuario'];
		}

    function logout() {
    	session_destroy();
    	session_start();
    }

?>
