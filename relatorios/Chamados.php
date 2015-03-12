<?php 
	include("fpdf/fpdf.php");
	include($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/Config/conexao.php');
	include($_SERVER['DOCUMENT_ROOT'].'/Testes-PHP/banco/Chamados.php');	

	$chamados = array();
	
	//$logotipo = "../images/home_logo.png";
	
	$titulo = "Relatorio de chamados";
	$data=date("d/m/Y H:i:s");

	$pdf = new FPDF('L','cm','A4');
	$pdf->Open();
	$pdf->AddPage();
	$pdf-> SetFont('Arial','B',18);
	$pdf->Cell(27, 1, $titulo, 0, 0, 'C');

	//$pdf->Image($logotipo,5,10,"png");  // Incluindo imagem

	$pdf->Ln(1);
	$pdf-> SetFont('Arial','',12);
	

	$pdf->Ln(1);
	
	//Cabeçalho
	$pdf -> Cell (1,	1,	'Cod.',			1,	0,	'C'); //Width, Height, Text, Border, (0-1-2), Align
	$pdf -> Cell (2,	1,	'Prioridade',	1,	0,	'C');
	$pdf -> Cell (4,	1,	'Natureza',		1,	0,	'L');
	
	if (tipoUsuario() != 'C')
		$pdf -> Cell (5,	1,	' Cliente',		1,	0,	'L');
	else 
		$pdf -> Cell (5,	1,	' Atendente',		1,	0,	'L');

	$pdf -> Cell (4,	1,	' Situacao',		1,	0,	'L');
	$pdf -> Cell (3,	1,	'Geracao',		1,	0,	'C');
	$pdf -> Cell (3,	1,	'Atualizacao',	1,	0,	'C');
	$pdf -> Cell (3,	1,	'Previsao',		1,	0,	'C');
	$pdf -> Cell (3,	1,	'Conclusao',	1,	1,	'C');

	$resultado = listaChamados($conexao, "");

	foreach ($resultado as $chamado) {
		
		$pdf -> Cell (1,	1,	$chamado['codatn'],	1,	0,	'C'); //Width, Height, Text, Border, (0-1-2), Align
		$pdf -> Cell (2,	1,	$chamado['nivpri'],	1,	0,	'C');
		$pdf -> Cell (4,	1,	$chamado['natatn'],	1,	0,	'L');
		$pdf -> Cell (5,	1,	' '.$chamado['nomcom'],	1,	0,	'L');
		$pdf -> Cell (4,	1,	' '.$chamado['sitatn'],	1,	0,	'L');
		$pdf -> Cell (3,	1,	$chamado['datger'],	1,	0,	'C');
		$pdf -> Cell (3,	1,	$chamado['datatu'],	1,	0,	'C');
		$pdf -> Cell (3,	1,	$chamado['datprv'],	1,	0,	'C');
		$pdf -> Cell (3,	1,	$chamado['datfim'],	1,	1,	'C');

	}

	$pdf -> Cell (5, 1, $data, 0,0);

	$pdf->Output(); // Fechamento do PDF
	
?>

