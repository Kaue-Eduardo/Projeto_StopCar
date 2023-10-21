<?php

    include ("connection-MySql.php");
    include ("crud-relatorio.php");
    
    define('FPDF_FONTPATH','font/');
    require('./fpdf/fpdf.php');

    $pdf = new FPDF('L');
    $pdf->AddPage();
    $pdf->SetFont('Courier','',10);

   $listaAluno = select_aluno($conexao);

    // Cabeçalho I
    $pdf->Cell(280,6,utf8_decode('FACULDADE PITÁGORAS - UNIDADE BETIM'),1,1,"C");
	$pdf->Cell(280,6,utf8_decode('# RELATÓRIO 01 - LISTA DE ALUNOS - DADOS DA PESSOA # '),1,1,"C");

    // Coluna Cabeçalho
    $pdf->Cell(11, 6,utf8_decode('Nº'),1,0,"C");
    $pdf->Cell(21, 6,utf8_decode('MATRICULA'),1,0,"C");
    $pdf->Cell(105, 6,'NOME',1,0,"C");
    $pdf->Cell(80, 6,'EMAIL',1,0,"C");
    $pdf->Cell(63, 6,'SENHA',1,0,"C");

    // Contador
    $i = 1;
    
    // Coluna Dados
    foreach($listaAluno as $aluno):

        $pdf->ln();
        $pdf->Cell(11, 6, $i++,1,0,"C");
        $pdf->Cell(21, 6, $aluno['MATRICULA'],1,0,"C");
        $pdf->Cell(105, 6, utf8_decode($aluno['NOME']),1,0,"L");
        $pdf->Cell(80, 6, $aluno['EMAIL'],1,0,"L");
        $pdf->Cell(63, 6, $aluno['SENHA'],1,0,"L");
    
    endforeach;
	
    // Rodapé
	date_default_timezone_set('America/Sao_Paulo');
	$datehora = date('d-m-Y H:i');
	$pdf->ln();
	$pdf->ln();

    $pdf->Cell(193, 6,utf8_decode('Setor de Extensão FapBetim'));
    $pdf->ln();
	
    $pdf->Cell(193, 6,utf8_decode('Data\Hora Emissão: ').$datehora,0,0,"L");
    $pdf->ln();

    $pdf->SetFont('Courier','',7);
    $pdf->Cell(193, 6,utf8_decode('Fábrica de Soluções® - Sistema de Controle de Eventos - Versão 2.0'));
    $pdf->Output();

?>