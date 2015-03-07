<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');	  
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Agendamento.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');      

	verificaUsuario();  
?>

<h1>Agendamentos</h1>
<table class="table table-striped table-bordered">
	<th>Código</th>
	<th>Cliente</th>
	<th>Data</th>
	<th>Hora</th>
	<th>#</th>
	<th>#</th>
	<?php
		$consultas = listaConsultas($conexao);	
		foreach($consultas as $consulta) {
	?>
		<tr>
			<td><?= $consulta['id_consulta'] ?> </td>			
			<td><?= $consulta['nome'] ?> </td>
			<td><?= $consulta['data_consulta'] ?> </td>
			<td><?= $consulta['hora'] ?> </td>			
			<td><a href="AlterarConsultaFormulario.php?id_consulta=<?=$consulta['id_consulta']?>" class="btn btn-primary">Alterar</a> </td>
			<td>
				<form action="RemoveConsulta.php" method="post">
					<input type="hidden" name="id_consulta" value="<?=$consulta['id_consulta']?>">
					<button class="btn btn-danger">Desmarcar</a>	
				</form>
			</td>	
		</tr>
	<?php
		}
	?>
</table>
<div class="text-right">
	<a href="relatorio/RelatorioConsultasPdf.php" class="btn btn-success btn-lg">Relatório</a>	
</div>
