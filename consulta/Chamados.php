<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/sqlChamado.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');

	verificaUsuario();
?>

<h1>Help Desk</h1>
<table class="table table-striped table-bordered">
	<th>Código</th>
	<th>Natureza<th>
	<th>Departamento</th>
  <th>Área</th>
  <th>Atendente</th>
  <th>Situação</th>
  <th>Data Geração</th>
  <th>Data Prevista</th>
  <th>Data Conclusão</th>

	<th></th>
	<?php
		$chamados = listaChamados($conexao);
		foreach($chamados as $chamados) {
	?>
		<tr>
			<td><?= $f114cab['codatn'] ?> </td>
			<td><?= $f114cab['natatn'] ?> </td>
      <td><?= $f114cab['natatn'] ?> </td>
			<td><?= $f114cab['coddep'] ?> </td>
      <td><?= $f114cab['codare'] ?> </td>
      <td><?= $f114cab['codate'] ?> </td>
      <td><?= $f114cab['sitatn'] ?> </td>
      <td><?= $f114cab['datger'] ?> </td>
      <td><?= $f114cab['datprv'] ?> </td>
      <td><?= $f114cab['datfim'] ?> </td>

			<td>
				<a href="index.php?id_usuario=<?php echo($linha['id_usuario']); ?>&acao=alterar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
				<a href="#" onclick="javascript: if(confirm('Confirma exclusão deste item?')) location.href='sqlusuario.php?id_usuario=<?php echo($linha['id_usuario']);
        ?>&acao=excluir'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
