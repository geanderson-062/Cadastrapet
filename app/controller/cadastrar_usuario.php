
<?php

//incluindo a conexao
include "conexao.php";

//criando vareaveis para armazenar dados digitados no input
$email= $_POST ['email'];
$senha= $_POST ['senha'];

///inserindo valores na tabelda
$sql= "INSERT INTO `usuarios`( `email`, `senha`) 
VALUES ('$email','$senha')";

if (mysqli_query($conexao , $sql)) {

    //se tudo deu certo faça isso

    echo  "<script>
      
    alert('Usuário cadastrado com sucesso');
    window.location='../screens/dashboard.php';
   
    </script>";


}else {

    //caso contrario faça isso

    echo  "<script>
      
    alert('Usuário NÃO cadastrado com sucesso');
    window.location='../screens/tela_de_cadastro_usuario.php';
   
    </script>";
    
}

?>
