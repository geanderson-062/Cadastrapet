
<?php

//incluindo a conexao
include "conexao.php";

//criando vareaveis para armazenar dados digitados no input
$nome=$_POST ['nome'];
$raca=$_POST ['raca'];
$endereco=$_POST ['endereco'];
$telefone=$_POST ['telefone'];
$responsavel= $_POST ['responsavel'];

///inserindo valores na tabelda
$sql= "INSERT INTO `pets`( `nome`, `raca`, `endereco`, `telefone`, `responsavel`) 
VALUES ('$nome','$raca','$endereco','$telefone','$responsavel')";


if (mysqli_query($conexao , $sql)) {

      //se tudo deu certo faça isso

      echo  "<script>
      
      alert('Pet cadastrado com sucesso');
      window.location='../screens/dashboard.php';
     
      </script>";
  

}else {

     //caso contrario faça isso

     echo  "<script>
      
     alert('pet NÃO cadastrado com sucesso');
     window.location='../screens/tela_de_cadastro_pet.php';
    
     </script>";

}

?>

