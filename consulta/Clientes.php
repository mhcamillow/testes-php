<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');	  
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Cliente.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');      

	verificaUsuario();  
?>

<h1>Clientes</h1>
<table class="table table-striped table-bordered">
	<th>Código</th>
	<th>Cliente</th>
	<th>Data de Nascimento</th>
	<th></th>
	<?php
		$clientes = listaClientes($conexao);	
		foreach($clientes as $cliente) {
	?>
		<tr>
			<td><?= $cliente['id_cliente'] ?> </td>			
			<td><?= $cliente['nome'] ?> </td>
			<td><?= $cliente['DataNascimento'] ?> </td>
			<td>
				<a href="index.php?id_usuario=<?php echo($linha['id_usuario']); ?>&acao=alterar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
				<a href="#" onclick="javascript: if(confirm('Confirma exclusão deste item?')) location.href='sqlusuario.php?id_usuario=<?php echo($linha['id_usuario']); ?>&acao=excluir'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
			</td>
			<!--
				<a href="Agendamento.php?id_cliente=<?=$cliente['id_cliente']?>" class="btn btn-primary">Alterar</a> </td>
			<td>
				<form action="RemoveConsulta.php" method="post">
					<input type="hidden" name="id_cliente" value="<?=$cliente['id_cliente']?>">
					<button class="btn btn-danger">Cancelar Agendamento</a>	
				</form>
			</td>	
			-->
		</tr>
	<?php
		}
	?>
</table>
<div class="text-right">
	<a href="relatorio/RelatorioConsultasPdf.php" class="btn btn-success btn-lg">Relatório</a>	
</div>
