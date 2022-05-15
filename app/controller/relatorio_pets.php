<?php
define('FPDF_FONTPATH', 'font/');
require 'FPDF/fpdf.php';
include 'conexao.php';

// exibe todos os registros $sql="SELECT * FROM users ";
//selecionando as tabelas
$sql=("SELECT * FROM `pets`");

$busca = mysqli_query($conexao, $sql);

$pdf = new FPDF('L');//l siguinifica que a pagina e lateral
$pdf->AddPage();

$pdf->SetTextColor(0,0, 128);//cor do texto

//imagem

$pdf->Image('../assets/img/imgHome.png',15,10,20,24,'PNG');

//cabeçalho
$pdf->SetFont('Arial','B',12);
$pdf->Cell(140,10,('Cadastrapet'),0,0,"C");//titulo

$pdf->ln(15); // espaçamento entra linhas de 15 mm

///////////////////////////////////////////////////Administradores//////////////////////////////////////////////

//titulo da tabela 
$pdf->SetFont('Arial','B',16);//tamanho do titulo
$pdf->Cell(140,10,('Animais cadastrados'),0,0,"C");//titulo

$pdf->ln(15); // espaçamento entra linhas de 15 mm

//parametros da tabela 

$pdf->SetFont('Arial','B',12);//tamanho do resto da tabela

$pdf->Cell(60, 7, 'Nome do pet' ,1,0,'c');

$pdf->Cell(40, 7, 'Raca' ,1,0,'c');

$pdf->Cell(60, 7, 'Endereco' ,1,0,'c');

$pdf->Cell(40, 7, 'Telefone' ,1,0,'c');

$pdf->Cell(80, 7, 'Responsavel',1,0,'c');

$pdf->ln(); //pular par linha de baixo

//pegando os dados do banco
while ($resultado = mysqli_fetch_array($busca)) {

   $pdf->Cell(60, 7, $resultado['nome'],1,0,'c');
 
   $pdf->Cell(40, 7, $resultado['raca'],1,0,'c');
 
   $pdf->Cell(60, 7, $resultado['endereco'],1,0,'c');

   $pdf->Cell(40, 7, $resultado['telefone'],1,0,'c');

   $pdf->Cell(80, 7, $resultado['responsavel'],1,0,'c');

   $pdf->Ln();//pular par linha de baixo
 
}

$pdf->ln(15); // espaçamento entra linhas de 15 mm

//fianlizando o pdf
$pdf->Output();
?>