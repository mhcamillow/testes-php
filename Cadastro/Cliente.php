<?php 

	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');	  
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Cliente.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');           

	verificaUsuario();

?>

	<h1>Cadastro de Cliente</h1>
	<form action="AdicionaPaciente.php" method="post">
		<table class="table">
			
			<?php include('PacienteFormularioBase.php') ?>

			<tr>
				<td><input type="submit" value="Cadastrar" class="btn btn-primary btn-lg btn-block"> <br/></td>				
			</tr>			
		</table>
	</form>
	
<?php include('rodape.php') ?>