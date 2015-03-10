<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Chamados.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/barraDeNavegacao.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');

	verificaUsuario();

?>

<h1>Help Desk</h1>
<table class="table table-striped table-bordered">
  <th>Código</th>
	<th>Natureza</th>
  <th><?php /*if (tipoUsuario() = 'C')
    echo "Atendente"
  else
    echo "Cliente"
  */?></th>
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
      <td><?= $chamados['codatn'] ?></td>
      <td><?php switch ($chamados['natatn']){
                case 1: echo "Dúvida"; break;
                case 2: echo "Erro"; break;
                case 3: echo "Exigência Legal"; break;
                case 4: echo "Implantação"; break;
                case 5: echo "Implementação"; break;
                case 6: echo "Serviço"; break;
                case 7: echo "Sugestão"; break;
                case 8: echo "Treinamento"; break;
              } ?></td>
      <td><?= $chamados['codigo'] ?></td>
      <td><?php switch ($chamados['sitatn']){
                case 1: echo "Aberto"; break;
                case 2: echo "Em Andamento"; break;
                case 3: echo "Aguardando Aceite"; break;
                case 4: echo "Finalizado"; break;
                case 5: echo "Reaberto"; break;
              } ?></td>
      <td><?= $chamados['datger'] ?></td>
      <td><?= $chamados['datprv'] ?></td>
      <td><?= $chamados['datatu'] ?></td>
      <td><?= $chamados['datfim'] ?></td>

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
