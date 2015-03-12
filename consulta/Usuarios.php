<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/barraDeNavegacao.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Usuario.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');

	verificaUsuario();
?>

<h1 align="center">Usuários</h1>
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
			<td><?php switch ($usuario['tipusu']){
                case 'C': echo "Cliente"; break;
                case 'A': echo "Atendente"; break;
                case 'M': echo "Master of Puppets"; break;
            } ?></td>
			<td><?= $usuario['emausu'] ?> </td>
			<td><?= $usuario['datnas'] ?> </td>
			<td>
				<a href="<?=SCRIPT_ROOT?>/Formulario/Usuario.php?codusu=<?php echo($usuario['codusu']); ?>&acao=alterar">
					<span title = 'Editar' class="glyphicon glyphicon-edit" aria-hidden="true"></span>
				</a>
				<a href="#" onclick="javascript: if(confirm('Confirma exclusão deste item?')) location.href='<?=SCRIPT_ROOT?>/cadastro/Usuario.php?codusu=<?php echo($usuario['codusu']); ?>&acao=excluir'">
					<span title = 'Excluir' class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</a>
			</td>
		</tr>
	<?php
		}
	?>
</table>
