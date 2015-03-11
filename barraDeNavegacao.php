<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');
require_once('mostraAlerta.php');
?>

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
			<a class="navbar-brand" href="<?=SCRIPT_ROOT?>/index.php">Help Desk</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cadastros <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?=SCRIPT_ROOT?>/Formulario/Chamado.php">Chamado</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php if ($_SESSION['tipo_usuario'] != 'C')
							echo '<li><a href="<?=SCRIPT_ROOT?>/consulta/usuarios.php">Usuário</a></li>';
						?>
						<li><a href="<?=SCRIPT_ROOT?>/consulta/Chamados.php">Chamado</a></li>
						<!--<li><a href="#">Cliente</a></li>
						<li><a href="#">Veículo</a></li> -->
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<p class="navbar-text">Olá, <?php echo $_SESSION['nome_usuario'] ?></p>
				<li><a href="<?=SCRIPT_ROOT?>/Config/Logout.php">Logout</a></li>
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
