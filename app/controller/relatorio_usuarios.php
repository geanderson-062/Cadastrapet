<?php
define('FPDF_FONTPATH', 'font/');
require 'FPDF/fpdf.php';
include 'conexao.php';

// exibe todos os registros $sql="SELECT * FROM users ";
//selecionando as tabelas
$sql=("SELECT * FROM `usuarios`");

$busca = mysqli_query($conexao, $sql);

$pdf = new FPDF('P');//l siguinifica que a pagina e lateral
$pdf->AddPage();

$pdf->SetTextColor(0,0, 128);//cor do texto

//imagem

$pdf->Image('../assets/img/imgHome.png',15,10,20,24,'PNG');

$pdf->ln(15); // espaçamento entra linhas de 15 mm

//cabeçalho
$pdf->SetFont('Arial','B',12);
$pdf->Cell(140,10,('Cadastrapet'),0,0,"C");//titulo

$pdf->ln(15); // espaçamento entra linhas de 15 mm

///////////////////////////////////////////////////Administradores//////////////////////////////////////////////

//titulo da tabela 
$pdf->SetFont('Arial','B',16);//tamanho do titulo
$pdf->Cell(140,10,('Usuarios cadastrados no sistema'),0,0,"C");//titulo

$pdf->ln(15); // espaçamento entra linhas de 15 mm

//parametros da tabela 

$pdf->SetFont('Arial','B',12);//tamanho do resto da tabela

$pdf->Cell(80, 7, 'Email' ,1,0,'c');

$pdf->Cell(80, 7, 'Senha' ,1,0,'c');


$pdf->ln(); //pular par linha de baixo

//pegando os dados do banco
while ($resultado = mysqli_fetch_array($busca)) {

   $pdf->Cell(80, 7, $resultado['email'],1,0,'c');
 
   $pdf->Cell(80, 7, $resultado['senha'],1,0,'c');
 


   $pdf->Ln();//pular par linha de baixo
 
}

$pdf->ln(15); // espaçamento entra linhas de 15 mm

//fianlizando o pdf
$pdf->Output();
?>