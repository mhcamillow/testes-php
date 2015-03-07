<?php
	require_once('cabecalho.php');
	require_once('Config/controleUsuario.php');
	include('BancoConsulta.php');
	
	verificaUsuario();
		$id_paciente = $_GET['id_paciente'];
		$consulta = buscaConsultaPaciente($conexao, $id_paciente);
?>
<h1>Agendar Consulta</h1>
<div class="container" id="formsConsulta">
	<form action="AdicionaConsulta.php" method="post">
		<table class="table">
			<tr>
				<td><label>Nome:</label></td>
				<td width="80%"><input type="text" name="nome" class="form-control" readonly value="<?=$consulta['nome']?>"></td>
			</tr>
			<tr>
				<td><label>Código do Paciente:</label></td>
				<td><input type="text" name="id_paciente" class="form-control" readonly placeholder="Código do Paciente" value="<?=$consulta['id_paciente']?>"></td>
			</tr>
			<tr>
				<td><label>Número da Consulta:</label></td>
				<td><input type="number" name="id_consulta" class="form-control" readonly placeholder="Código gerado automáticamente"></td>
			</tr>
			<tr>
				<td><label>Data:</label></td>
				<td><input type="text" name="data_consulta" class="form-control"></td>
			</tr>
			<tr>
				<td><label>Horário:</label></td>
				<td><input type="text" name="hora" class="form-control"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" value="Salvar" class="btn btn-primary">
					<a href="ListaPaciente.php" class="btn btn-warning">Voltar</a>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php include('rodape.php') ?>