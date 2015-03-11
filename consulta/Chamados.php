<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Chamados.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/barraDeNavegacao.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');

	verificaUsuario();
  if (tipoUsuario() == 'C')
    $tipo = "Atendente";
  else
    $tipo = "Cliente";

	$filtro = "";
	$sitatn= 0;
	if (isset($_GET['sitatn'])){
		$sitatn = $_GET['sitatn'];
		if ($sitatn > 0)
			$filtro = "sitatn in ('$sitatn')";
	}
?>

<form action="" method="get">
	<div class="navbar-text navbar-right">
		<button class="btn btn-success" type="submit">Filtrar</button>
		<a href="<?=SCRIPT_ROOT?>/consulta/Chamados.php">
		</a>
	</div>
	<div class="navbar-text navbar-right">
		<select name="sitatn" class="form-control">
			<option value="0" <?php if ($sitatn == 0) echo "selected"; ?>> </option>
			<option value="1" <?php if ($sitatn == 1) echo "selected"; ?>>Aberto </option>
			<option value="2" <?php if ($sitatn == 2) echo "selected"; ?>>Em Andamento </option>
			<option value="3" <?php if ($sitatn == 3) echo "selected"; ?>>Aguardando Aprovação </option>
			<option value="4" <?php if ($sitatn == 4) echo "selected"; ?>>Finalizado </option>
			<option value="5" <?php if ($sitatn == 5) echo "selected"; ?>>Reaberto </option>
		</select>
	</div>
</form>

<table class="table table-striped table-bordered table-hover">
  <th>Código</th>
	<th>Natureza</th>
  <th><?php echo $tipo ?></th>
  <th>Situação</th>
  <th>Geração</th>
  <th>Atualização</th>
  <th>Previsão</th>
  <th>Conclusão</th>
  <th></th>
	<?php
		$chamados = listaChamados($conexao, $filtro);
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
      <td><?= $chamados['nomcom'] ?></td>
      <td><?php switch ($chamados['sitatn']){
                case 1: echo "Aberto"; break;
                case 2: echo "Em Andamento"; break;
                case 3: echo "Aguardando Aceite"; break;
                case 4: echo "Finalizado"; break;
                case 5: echo "Reaberto"; break;
              } ?></td>
      <td><?= $chamados['datger'] ?></td>
      <td><?= $chamados['datatu'] ?></td>
      <td><?= $chamados['datprv'] ?></td>
      <td><?= $chamados['datfim'] ?></td>

      <td>
				<a href="<?=SCRIPT_ROOT?>/Formulario/Chamado.php?codatn=<?php echo($chamados['codatn']);?>&acao=consultar"><span title="Detalhes" class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
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
