<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');	  
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Usuario.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');      

	verificaUsuario();  
?>

<h1>Usuários</h1>
<table class="table table-striped table-bordered">
	<th>Código</th>
	<th>Nome</th>
	<th>Login</th>
	<th>Tipo</th>
	<th>E-mail</th>
	<th>Data de Nascimento</th>
	<th></th>
	<?php
		$usuarios = listaUsuarios($conexao);	
		foreach($usuarios as $usuario) {
	?>
		<tr>
			<td><?= $usuario['codusu'] ?> </td>
			<td><?= $usuario['nomcom'] ?> </td>
			<td><?= $usuario['nomusu'] ?> </td>
			<td><?= $usuario['tipusu'] ?> </td>
			<td><?= $usuario['emausu'] ?> </td>
			<td><?= $usuario['datnas'] ?> </td>
			<td>
				<a href="<?=SCRIPT_ROOT?>/Formulario/Usuario.php?codusu=<?php echo($usuario['codusu']); ?>&acao=alterar">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
				</a>
				<a href="#" onclick="javascript: if(confirm('Confirma exclusão deste item?')) location.href='<?=SCRIPT_ROOT?>/cadastro/Usuario.php?codusu=<?php echo($usuario['codusu']); ?>&acao=excluir'">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</a>
			</td>
			<!--
				<a href="Agendamento.php?id_cliente=<?=$usuarios['id_cliente']?>" class="btn btn-primary">Alterar</a> </td>
			<td>
				<form action="RemoveConsulta.php" method="post">
					<input type="hidden" name="id_cliente" value="<?=$usuarios['id_cliente']?>">
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
