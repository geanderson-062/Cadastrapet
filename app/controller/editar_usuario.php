
<?php

//inscluindo arquivo de conexao
include "conexao.php";

//criando vareaveis para editar
$id=$_POST ['id'];
$email=$_POST ['email'];
$senha=$_POST ['senha'];

//pegando vareaveis e atualizando os dados inserindo nelas 
$sql= "UPDATE `usuarios` SET `email`='$email',`senha`='$senha' 

WHERE id=$id";

//aviso se foi atualizado ou nao 
if (mysqli_query($conexao , $sql)) {

    //se tudo deu certo faça isso 

    echo  "<script>
      
    alert('Alterado com sucesso');
    window.location='../screens/tabela_usuarios.php';
 
    </script>";
    
}else {

    //caso contrario faça isso

    echo  "<script>
      
    alert('NÃO Alterado com sucesso');
    window.location='../screens/tela_de_editar_usuario.php';
   
    </script>";
  
}


?>
