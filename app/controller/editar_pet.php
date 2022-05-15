
<?php

//inscluindo arquivo de conexao
include "conexao.php";

//criando vareaveis para editar
$id=$_POST ['id'];
$nome=$_POST ['nome'];
$raca=$_POST ['raca'];
$endereco=$_POST ['endereco'];
$telefone=$_POST ['telefone'];
$responsavel=$_POST ['responsavel'];

//pegando vareaveis e atualizando os dados inserindo nelas 
$sql= "UPDATE `pets` SET `nome`='$nome',`raca`='$raca',`endereco`='$endereco',`telefone`='$telefone',`responsavel`='$responsavel' 

WHERE id=$id";

//aviso se foi atualizado ou nao 
if (mysqli_query($conexao , $sql)) {

    //se tudo deu certo faça isso 

    echo  "<script>
      
    alert('Alterado com sucesso');
    window.location='../screens/tabela_pets.php';
 
    </script>";
    
}else {

    //caso contrario faça isso

    echo  "<script>
      
    alert('NÃO Alterado com sucesso');
    window.location='../screens/tela_de_editar_pet.php';
   
    </script>";
  
}


?>
