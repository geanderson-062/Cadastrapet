<?php
define('FPDF_FONTPATH', 'font/');
require 'FPDF/fpdf.php';
include 'conexao.php';

// exibe todos os registros $sql="SELECT * FROM users ";
//selecionando as tabelas
$sql3=("SELECT * FROM `administrador`");
$sql2=("SELECT * FROM `coordenador`");
$sql=("SELECT * FROM `visitas`");

$busca3 = mysqli_query($conexao, $sql3);
$busca2 = mysqli_query($conexao, $sql2);
$busca = mysqli_query($conexao, $sql);

$pdf = new FPDF('L');//l siguinifica que a pagina e lateral
$pdf->AddPage();

$pdf->SetTextColor(0,0, 128);//cor do texto

//imagem

$pdf->Image('../assets/img/imgHome.png',15,10,20,24,'PNG');

//cabeçalho
$pdf->SetFont('Arial','B',12);
$pdf->Cell(140,10,('Relatorio'),0,0,"C");//titulo

$pdf->ln(15); // espaçamento entra linhas de 15 mm

///////////////////////////////////////////////////Administradores//////////////////////////////////////////////

//titulo da tabela 
$pdf->SetFont('Arial','B',16);//tamanho do titulo
$pdf->Cell(140,10,('Administradores'),0,0,"C");//titulo

$pdf->ln(15); // espaçamento entra linhas de 15 mm

//parametros da tabela 

$pdf->SetFont('Arial','B',12);//tamanho do resto da tabela

$pdf->Cell(80, 7, 'Nome' ,1,0,'c');

$pdf->Cell(40, 7, 'CPF' ,1,0,'c');

$pdf->Cell(40, 7, 'Telefone' ,1,0,'c');

$pdf->Cell(40, 7, 'Senha' ,1,0,'c');

$pdf->Cell(40, 7, 'Tipo',1,0,'c');

$pdf->ln(); //pular par linha de baixo

//pegando os dados do banco
while ($resultado3 = mysqli_fetch_array($busca3)) {

   $pdf->Cell(80, 7, $resultado3['nomeADM'],1,0,'c');
 
   $pdf->Cell(40, 7, $resultado3['cpfADM'],1,0,'c');
 
   $pdf->Cell(40, 7, $resultado3['telefoneADM'],1,0,'c');

   $pdf->Cell(40, 7, $resultado3['senhaADM'],1,0,'c');

   $pdf->Cell(40, 7, $resultado3['tipoADM'],1,0,'c');

   $pdf->Ln();//pular par linha de baixo
 
}

$pdf->ln(15); // espaçamento entra linhas de 15 mm

//fianlizando o pdf
$pdf->Output();
?>