<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/barraDeNavegacao.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Chamados.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');
	verificaUsuario();

	if (isset($_GET['codatn']))
	{
		$codatn = $_GET['codatn'];
		$retorno = buscaChamadoPorCodigo($conexao, $codatn);
		$tipoFormulario = 'C';
		$chamado = array('codatn' => $retorno['codatn'],
						 'codcli' => $retorno['codcli'],
						 'codate' => $retorno['codate'],
						 'codusu' => $retorno['codusu'],
						 'nivpri' => $retorno['nivpri'],
						 'datger' => $retorno['datger'],
						 'sitatn' => $retorno['sitatn'],
						 'datprv' => $retorno['datprv'],
						 'datatu' => $retorno['datatu'],
						 'datfim' => $retorno['datfim'],
						 'natatn' => $retorno['natatn'],
						 'desatn' => $retorno['desatn']);
	} 
	else 
	{
		$tipoFormulario = 'I';
		$codcli = "";
		$codate = "";
		$codusu = codigoUsuario();
		
		if (tipoUsuario() == 'C')
			$codcli = $codusu;
		else
			$codate = $codusu;

		$chamado = array('codcli' => $codcli, 
						 'codate' => $codate, 
						 'codusu' => $codusu, 
						 'nivpri' => '', 
						 'datger' => '', 
						 'sitatn' => '1', 
						 'datprv' => '', 
						 'datatu' => '', 
						 'datfim' => '', 
						 'natatn' => '', 
						 'desatn' => '');
	}
?>

<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-9 col-md-offset-1 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Formulário de Chamado</div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				<form action="<?=SCRIPT_ROOT?>/cadastro/Chamado.php" class="form-horizontal" method="post">

					<div class="form-group" <?php if (tipoUsuario() == 'C' && $tipoFormulario == 'I') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Código do chamado</label>
						<div class="col-sm-8">
							<input type="number" name="codatn" class="form-control" readonly value="<?=$chamado['codatn']?>">
						</div>
					</div>

					<div class="form-group" <?php if (tipoUsuario() == 'C' && $tipoFormulario == 'I') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Código do atendente</label>
						<div class="col-sm-8">
							<input type="number" name="codate" class="form-control" readonly value="<?=$chamado['codate']?>">
						</div>
					</div>

					<div class="form-group" <?php if (tipoUsuario() == 'C') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Cliente</label>
						<div class="col-sm-8">
							<input type="number" name="codcli" class="form-control" value="<?=$chamado['codcli']?>">
						</div>
					</div>
					<div class="form-group" <?php if (tipoUsuario() == 'C') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Usuário</label>
						<div class="col-sm-8">
							<input type="number" name="codusu" class="form-control" value="<?=$chamado['codusu']?>">
						</div>
					</div>
					<div class="form-group" <?php if (tipoUsuario() == 'C') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Prioridade</label>
						<div class="col-sm-8">
							<input type="number" name="nivpri" class="form-control" value="<?=$chamado['nivpri']?>">
						</div>
					</div>
					<div class="form-group" <?php if (tipoUsuario() == 'C' && $tipoFormulario == 'I') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Data da Geração</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="datger" placeholder="DD/MM/YYYY" readonly value="<?=$chamado['datger']?>">
						</div>
					</div>

					<div class="form-group" <?php if (tipoUsuario() == 'C' && $tipoFormulario == 'I') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Situação</label>
						<div class="col-sm-8">
							<select name="sitatn" class="form-control" <?php if ($chamado['sitatn'] != 3) echo 'readonly'; ?>>
								<option value="1" <?php if ($chamado['sitatn'] == 1) echo "selected"; ?>>Aberto </option>
								<option value="2" <?php if ($chamado['sitatn'] == 2) echo "selected"; ?>>Em Andamento </option>
								<option value="3" <?php if ($chamado['sitatn'] == 3) echo "selected"; ?>>Aguardando aprovação </option>
								<option value="4" <?php if ($chamado['sitatn'] == 4) echo "selected"; ?>>Finalizado </option>
								<option value="5" <?php if ($chamado['sitatn'] == 5) echo "selected"; ?>>Reaberto </option>
							</select>
						</div>
					</div>

					<div class="form-group" <?php if (tipoUsuario() == 'C' && $tipoFormulario == 'I') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Previsão</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="datprv" placeholder="DD/MM/YYYY" 
									<?php if (tipoUsuario() == 'C') echo 'readonly'; ?> value="<?=$chamado['datprv']?>">
						</div>
					</div>

					<div class="form-group" <?php if (tipoUsuario() == 'C' && $tipoFormulario == 'I') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Última movimentação</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="datatu" placeholder="DD/MM/YYYY" readonly value="<?=$chamado['datatu']?>">
						</div>
					</div>

					<div class="form-group" <?php if (tipoUsuario() == 'C' && $tipoFormulario == 'I') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Finalização</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="datfim" placeholder="DD/MM/YYYY" readonly value="<?=$chamado['datfim']?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Natureza</label>
						<div class="col-sm-8">
							<select name="natatn" class="form-control">
								<option value="1" <?php if ($chamado['natatn'] == 1) echo "selected"; ?>>Dúvida </option>
								<option value="2" <?php if ($chamado['natatn'] == 2) echo "selected"; ?>>Erro </option>
								<option value="3" <?php if ($chamado['natatn'] == 3) echo "selected"; ?>>Exigência legal </option>
								<option value="4" <?php if ($chamado['natatn'] == 4) echo "selected"; ?>>Implantação </option>
								<option value="5" <?php if ($chamado['natatn'] == 5) echo "selected"; ?>>Implementação </option>
								<option value="6" <?php if ($chamado['natatn'] == 6) echo "selected"; ?>>Serviço </option>
								<option value="7" <?php if ($chamado['natatn'] == 7) echo "selected"; ?>>Sugestão </option>
								<option value="8" <?php if ($chamado['natatn'] == 8) echo "selected"; ?>>Treinamento </option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Descrição</label>
						<div class="col-sm-8">
							<textarea class="form-control" rows="3" name="desatn" placeholder="Descreva o motivo do chamado" 
									<?php if ($tipoFormulario == 'I') echo 'required'; else echo 'readonly'; ?>></textarea>
						</div>
					</div>

					<div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-sm-10 controls">
                            <button class="btn btn-success" type="submit">Salvar alterações  </button>
                            <a href="<?=SCRIPT_ROOT?>/consulta/Chamados.php">
								<button type="button" id="singlebutton" name="singlebutton" class="btn btn-primary">Cancelar</button>
							</a>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
