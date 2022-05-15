
<?php

include "conexao.php";

$id= $_POST ['id'];
$nome= $_POST ['nome'];
$raca= $_POST ['raca'];
$endereco= $_POST ['endereco'];
$telefone= $_POST ['telefone'];
$responsavel= $_POST ['responsavel'];

$sql= "DELETE FROM `pets` WHERE id=$id" ;

if (mysqli_query($conexao , $sql)) {

    //se tudo der certo faça isso

    echo  " <script>
      
    alert('excluido com sucesso');
    window.location='../screens/tabela_pets.php';
 
    </script>
   
    ";

}else {

    //caso contrario faça isso

    echo  " <script>
      
    alert('Houve um erro pet não excluido');
    window.location='../screens/tabela_pets.php';
 
    </script>
   
    ";

}

?>
