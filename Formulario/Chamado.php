﻿<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/cabecalho.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/barraDeNavegacao.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Chamados.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Departamento.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/controleUsuario.php');
	verificaUsuario();

	if (isset($_GET['codatn'])){
		$codatn = $_GET['codatn'];
		$retorno = buscaChamadoPorCodigo($conexao, $codatn);
		$tipoFormulario = 'V';
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
						 'desate' => $retorno['desate'],
						 'descli' => $retorno['descli'],
						 'coddep' => $retorno['coddep']);
		// cliente
		if (tipoUsuario() == 'C'){
			if (($retorno['sitatn'] == 1) or ($retorno['sitatn'] == 2) or ($retorno['sitatn'] == 5)){ //apenas nova mensagem
				$tipoFormulario = 'M';

			} elseif ($retorno['sitatn'] == 3){ // aprovar ou reabrir chamado
				$tipoFormulario = 'C';

			} else { //chamado somente para visualisar
				$tipoFormulario = 'V';

			}
		// atendente
		} else {
			if (($retorno['sitatn'] == 1) or ($retorno['sitatn'] == 5)){//atender chamado
				$tipoFormulario = 'A';

        		$chamado['sitatn'] = '2';
        		$chamado['codate'] = $_SESSION['codigo_usuario'];

			} elseif ($retorno['sitatn'] == 2){ // mensagem / alterar status
				$tipoFormulario = 'C';

			} elseif ($retorno['sitatn'] == 3){ //apenas nova mensagem
				$tipoFormulario = 'M';

			} else { //chamado somente para visualisar
				$tipoFormulario = 'V';

			}
		}

	} else { //abrir chamado
		$tipoFormulario = 'A';
		$codcli = "";
		$codate = "";
		$codusu = codigoUsuario();
		$codcli = $codusu;

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
						 'desate' => '',
						 'descli' => '');
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

					<div class="form-group" <?php if ($tipoFormulario == 'A') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Código do chamado</label>
						<div class="col-sm-8">
							<input type="number" name="codatn" class="form-control" readonly value="<?=$chamado['codatn']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Departamento</label>
						<div class="col-sm-8">
							<select class="form-control" name="coddep" <?php if ($tipoFormulario != 'A') echo 'readonly'; ?>>
								<option value=""></option>
								<?php
								$departamento = listaDepartamentos($conexao);
								foreach($departamento as $departamento) {
			  					echo("<option value='".$departamento['coddep']."' ");
									if ($departamento['coddep'] == $chamado['coddep'])
										echo("SELECTED");
			  					echo(">".$departamento['desdep']."</option>");
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group" <?php if ($tipoFormulario == 'A') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Código do atendente</label>
						<div class="col-sm-8">
							<input type="number" name="codate" class="form-control" readonly value="<?=$chamado['codate']?>">
						</div>
					</div>

					<div class="form-group" <?php if ($tipoFormulario == 'A') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Cliente</label>
						<div class="col-sm-8">
							<input type="number" name="codcli" class="form-control" readonly value="<?=$chamado['codcli']?>">
						</div>
					</div>
					<div class="form-group" <?php if ($tipoFormulario == 'A') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Usuário</label>
						<div class="col-sm-8">
							<input type="number" name="codusu" class="form-control" readonly value="<?=$chamado['codusu']?>">
						</div>
					</div>
					<div class="form-group" <?php if ((tipoUsuario() == 'C' and $tipoFormulario == 'A') or $tipoFormulario == 'M' or $tipoFormulario == 'V') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Prioridade</label>
						<div class="col-sm-8">
							<select name="nivpri" class="form-control">
								<option value="1" <?php if ($chamado['nivpri'] == 1) echo "selected"; ?>>Baixo </option>
								<option value="2" <?php if ($chamado['nivpri'] == 2) echo "selected"; ?>>Médio </option>
								<option value="3" <?php if ($chamado['nivpri'] == 3) echo "selected"; ?>>Alto </option>
							</select>
						</div>
					</div>
					<div class="form-group" <?php if ($tipoFormulario == 'A') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Data da Geração</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="datger" placeholder="DD/MM/YYYY" readonly value="<?=$chamado['datger']?>">
						</div>
					</div>

					<div class="form-group" <?php if ($tipoFormulario == 'A') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Situação</label>
						<div class="col-sm-8">
							<select <?php if ($tipoFormulario == 'V') echo 'readonly'; ?> name="sitatn" class="form-control">
                				<?php
									if ($chamado['sitatn'] == 1)
										echo '<option value="1" selected >Aberto </option>';

									if (tipoUsuario() == 'C' && $chamado['sitatn'] == 2)
                						echo '<option value="2" selected>Em Andamento </option>';

            						if ($chamado['sitatn'] == 3)
	              						echo '<option value="3" selected>Aguardando aprovação </option>';

									if ($chamado['sitatn'] == 4)
                						echo '<option value="4" selected>Finalizado </option>';

									if ($chamado['sitatn'] == 5)
	               						echo '<option value="5" selected>Reaberto </option>';

									if (tipoUsuario() == 'A' && $chamado['sitatn'] == 2)
									{
                  						echo '<option value="1">Aberto </option>';
                  						echo '<option value="2" selected>Em Andamento </option>';
                  						echo '<option value="3">Aguardando aprovação </option>';
	                				}

	                				if (tipoUsuario() == 'C' && $chamado['sitatn'] == 3)
	                				{
										echo '<option value="4">Finalizado </option>';
	                  					echo '<option value="5">Reaberto </option>';
	                				}
	              				?>
							</select>
						</div>
					</div>

					<div class="form-group" <?php if (tipoUsuario() == 'C' && $tipoFormulario == 'A') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Previsão</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="datprv" placeholder="DD/MM/YYYY"
									<?php if (tipoUsuario() == 'C' or $tipoFormulario == 'V') echo 'readonly'; ?> value="<?=$chamado['datprv']?>">
						</div>
					</div>

					<div class="form-group" <?php if ($tipoFormulario == 'A') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Última movimentação</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="datatu" placeholder="DD/MM/YYYY" readonly value="<?=$chamado['datatu']?>">
						</div>
					</div>

					<div class="form-group" <?php if ($tipoFormulario == 'A') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Finalização</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="datfim" placeholder="DD/MM/YYYY" readonly value="<?=$chamado['datfim']?>">
						</div>
					</div>

					<div class="form-group" <?php if ($tipoFormulario != 'A') echo 'style="display: none;"'; ?>>
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
						<label class="col-sm-3 control-label">Pergunta</label>
						<div class="col-sm-8">
							<textarea class="form-control" rows="3" name="descli" placeholder="Descreva o motivo do chamado"
									<?php if (tipoUsuario() == 'A' or $tipoFormulario == 'V') echo 'readonly'; ?> ><?=$chamado['descli']?></textarea>
						</div>
					</div>

					<div class="form-group" <?php if (tipoUsuario() == 'C' && $tipoFormulario == 'A') echo 'style="display: none;"'; ?>>
						<label class="col-sm-3 control-label">Resposta</label>
						<div class="col-sm-8">
							<textarea class="form-control" rows="3" name="desate" placeholder="Resposta"
									<?php if (tipoUsuario() == 'C' or $tipoFormulario == 'V') echo 'readonly'; ?> ><?=$chamado['desate']?></textarea>
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
