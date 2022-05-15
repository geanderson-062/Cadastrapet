
<?php

include "conexao.php";

$id= $_POST ['id'];
$email= $_POST ['email'];
$senha= $_POST ['senha'];

$sql= "DELETE FROM `usuarios` WHERE id=$id" ;

if (mysqli_query($conexao , $sql)) {

    //se tudo der certo faça isso

    echo  " <script>
      
    alert('excluido com sucesso');
    window.location='../screens/tabela_usuarios.php';
 
    </script>
   
    ";

}else {

    //caso contrario faça isso

    echo  " <script>
      
    alert('Houve um erro pet não excluido');
    window.location='../screens/tabela_usuarios.php';
 
    </script>
   
    ";

}

?>
