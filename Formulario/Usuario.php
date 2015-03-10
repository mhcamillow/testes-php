<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/barraDeNavegacao.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Usuario.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');
		verificaUsuario();
	//$estados = listaEstados($conexao);
	
	if (isset($_GET['codusu']))
	{
		
		$codusu = $_GET['codusu'];
		$retorno = buscaUsuarioPorCodigo($conexao, $codusu);
		
		$usuario = array('codusu' => $retorno['codusu'],
						'nomcom' => $retorno['nomcom'],
						'nomusu' => $retorno['nomusu'],
						'emausu' => $retorno['emausu'],
						'datnas' => $retorno['datnas']);
	} else {
		$usuario = array('codusu' => '', 'nomcom' => '', 'nomusu' => '', 'emausu' => '', 'datnas' => '');
	}
?>

<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Alteração de usuário</div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				<form action="<?=SCRIPT_ROOT?>/cadastro/Usuario.php" class="form-horizontal" method="post">
					<div class="form-group">
						<label class="col-sm-2 control-label">Código</label>
						<div class="col-sm-10">
							<input type="text" name="codusu" class="form-control" readonly value="<?=$usuario['codusu']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Usuário</label>
						<div class="col-sm-10">
							<input type="text" name="nomcom" class="form-control" value="<?=$usuario['nomcom']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Login</label>
						<div class="col-sm-10">
							<input type="text" name="nomusu" class="form-control" value="<?=$usuario['nomusu']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">E-mail</label>
						<div class="col-sm-10">
							<input type="email" name="emausu" class="form-control" value="<?=$usuario['emausu']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nascimento</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" name="datnas" placeholder="DD/MM/YYYY" value="<?=$usuario['datnas']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Estado</label>
						<div class="col-sm-10">
							<select name="id_estado" class="form-control">
									<?php foreach($estados as $estado) :
										$estadoAtivo = $paciente['id_estado'] == $estado['id_estado'];
										$buscaEstado = $estadoAtivo ? "selected='selected'" : "";
									?>
									<option value="<?=$estado['id_estado']?>" <?=$buscaEstado?>>
										<?=$estado['sigla']. " - " .$estado['descricao']?>
									</option>
									<?php endforeach ?>
								</select>
						</div>
					</div>
					<div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button class="btn btn-success" type="submit">Salvar alterações  </button>  
                            <a href="<?=SCRIPT_ROOT?>/consulta/Usuarios.php">
								<button type="button" id="singlebutton" name="singlebutton" class="btn btn-primary">Cancelar</button>
							</a>  
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
