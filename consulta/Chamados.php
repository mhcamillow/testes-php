<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Chamados.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');

	verificaUsuario();
?>

<h1>Help Desk</h1>
<table class="table table-striped table-bordered">
  <th>Código</th>
	<th>Natureza</th>
	<th>Departamento</th>
  <th>Área</th>
  <th>Atendente</th>
  <th>Situação</th>
  <th>Geração</th>
  <th>Atualização</th>
  <th>Previsão</th>
  <th>Conclusão</th>
  <th></th>
	<?php
		$chamados = listaChamados($conexao);
		foreach($chamados as $chamados) {
	?>
		<tr>
			<td><?= $f114cab['codatn'] ?></td>
      <td><?= $f114cab['natatn'] ?></td>
			<td><?= $f114cab['coddep'] ?></td>
      <td><?= $f114cab['codare'] ?></td>
      <td><?= $f114cab['codate'] ?></td>
      <td><?= $f114cab['sitatn'] ?></td>
      <td><?= $f114cab['datger'] ?></td>
      <td><?= $f114cab['datprv'] ?></td>
      <td><?= $f114cab['datatu'] ?></td>
      <td><?= $f114cab['datatu'] ?></td>

      <td>
				<a href="DetalheChamado.php?id=<?php echo($chamados['codatn']);?>&acao=consultar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
			</td>
		</tr>
	<?php
		}
	?>
</table>
<!--
<div class="text-right">
	<a href="relatorio/RelatorioConsultasPdf.php" class="btn btn-success btn-lg">Relatório</a>
</div>
-->
