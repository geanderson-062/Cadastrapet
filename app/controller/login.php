<?php

include "conexao.php";

if (isset($_POST['email'])) {
  $email= $_POST ['email'];
  $senha = $_POST ['senha']; 

$sql = "SELECT * FROM `usuarios` WHERE email='$email'AND senha= '$senha'";

if ($result = mysqli_query($conexao, $sql)){
  $num_resgitros = mysqli_num_rows($result);
     if ($num_resgitros ==1) {
     $linha= mysqli_fetch_assoc($result);
       if (($email==$linha['email']) and ($senha==$linha['senha'])) { 
       session_start();
       $_SESSION['email']= "usuario: adm";  
       header("location: ../views/dashboard.php");
  
       } else {
  
       //echo"Login inválido";

       echo  "<script>
      
       alert('Login inválido');
       window.location='../views/tela_de_login.php';
      
       </script>";
     
    }
 }    
      else {

      //echo"Login ou senha não foram encontrados ou inválido.";

      echo  "<script>
      
      alert('Login ou senha não foram encontrados ou inválido.');
      window.location='../views/tela_de_login.php';
      
      </script>";

  }
 }

      else {
   
      //echo "Nenhum resultado do banco";

      echo  "<script>
      
      alert('Nenhum resultado do banco');
      window.location='../views/tela_de_login.php';
      
      </script>";
   
   }
}

?>