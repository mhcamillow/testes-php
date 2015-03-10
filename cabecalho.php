<?php 
	require_once('Config/Constantes.php');
?>

<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Oficina </title>
		<!-- Bootstrap -->
		<link href="<?=SCRIPT_ROOT?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?=SCRIPT_ROOT?>/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?=SCRIPT_ROOT?>/index.php">Camillo</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cadastros <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="Cadastro/Usuario.php">Usuário</a></li>
								<li><a href="#">Cliente</a></li>
								<li><a href="#">Veículo</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Usuário</a></li>
								<li><a href="#">Cliente</a></li>
								<li><a href="#">Veículo</a></li>
							</ul>
						</li>
					</ul>
					
					</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
				<?php
					error_reporting(E_ALL ^ E_NOTICE);
					require_once('MostraAlerta.php');
					require_once('config/controleUsuario.php');
					mostraAlerta('success');
					mostraAlerta('danger');
				?>
				<div class="container">
					<div class="principal">