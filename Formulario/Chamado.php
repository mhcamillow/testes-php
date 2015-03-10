<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/barraDeNavegacao.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Chamado.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');
	verificaUsuario();
	
	if (isset($_GET['codatn']))
	{
		
		$codatn = $_GET['codatn'];
		$retorno = buscaChamadoPorCodigo($conexao, $codatn);

		$chamado = array('codatn' => $retorno['codatn'],
						 'codcli' => $retorno['codcli'],
						 'codate' => $retorno['codate'],
						 'codusu' => $retorno['codusu'],
						 'nivpri' => $retorno['nivpri'],
						 'coddep' => $retorno['coddep'],
						 'codare' => $retorno['codare'],
						 'datger' => $retorno['datger'],
						 'sitatn' => $retorno['sitatn'],
						 'datprv' => $retorno['datprv'],
						 'datatu' => $retorno['datatu'],
						 'datfim' => $retorno['datfim'],
						 'codgrp' => $retorno['codgrp'],
						 'natatn' => $retorno['natatn']);
	} else {
		$chamado = array('codatn' => '', 'codcli' => '', 'codate' => '', 'codusu' => '', 'nivpri' => '', 'coddep' => '', 'codare' => '', 'datger' => '', 'sitatn' => '', 'datprv' => '', 'datatu' => '', 'datfim' => '', 'codgrp' => '', 'natatn' => '');
	}

?>

<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Formulário de Chamado</div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				<form action="<?=SCRIPT_ROOT?>/cadastro/Chamado.php" class="form-horizontal" method="post">
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
