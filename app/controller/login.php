<?php

//indlcuindo a conexão com o banco

include "conexao.php";

if (isset($_POST['email'])) {

  //recebendo vareaveis com os valores do bancos

  $email= $_POST ['email'];
  $senha = $_POST ['senha']; 

//selecionando a tabela usuarios para a autenticação

$sql = "SELECT * FROM `usuarios` WHERE email='$email'AND senha= '$senha'";

if ($result = mysqli_query($conexao, $sql)){
  $num_resgitros = mysqli_num_rows($result);
     if ($num_resgitros ==1) {
     $linha= mysqli_fetch_assoc($result);
       if (($email==$linha['email']) and ($senha==$linha['senha'])) { 

       //se tudo deu certo inicie uma seção e leve o usuario para a dashboard

       session_start();
       $_SESSION['email']= "usuario: adm";  
       header("location: ../screens/dashboard.php");
  
       } else {

      //se o lgin tiver invailido faça isso
       echo  "<script>
      
       alert('Login inválido');
       window.location='../screens/tela_de_login.php';
      
       </script>";
     
   }
}    

      else {

      //se a senha não for encontrada faça isso 

      echo  "<script>
      
      alert('Login ou senha não foram encontrados ou inválido.');
      window.location='../screens/tela_de_login.php';
      
      </script>";

   }
}

      else {
   
      //se não tiver nada no banco  faça isso

      echo  "<script>
      
      alert('Nenhum resultado do banco');
      window.location='../views/tela_de_login.php';
      
      </script>";
   
   }
}

?>