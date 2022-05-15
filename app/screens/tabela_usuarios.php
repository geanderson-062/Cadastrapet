<?php 

    session_start();
    //include('verifica.php');

    //incluindo a conexao
    include('../controller/conexao.php');

    //pegando os dados das tabelas e transformando em vareaveis
    $sql = "SELECT * FROM `usuarios`";
    $dados= mysqli_query($conexao,$sql);
    
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--link css-->
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Tabela Usuários</title>

        <!--favicon-->
        <link rel="apple-touch-icon" sizes="57x57" href="../assets/img/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../assets/img/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../assets/img/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../assets/img/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../assets/img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../assets/img/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../assets/img/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../assets/img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="../assets/img/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#00a000">
        <meta name="msapplication-TileImage" content="../assets/img/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#00a000">
        <!--favicon-->

  </head>
  <body>
   

    <nav class="navbar navbar-light corPrimaria">
      <div class="container-fluid">
          <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-2 text-white" href="#">
          <img src="../assets/img/imgHome.png" alt="" width="50" height="50">
          Cadastrapet </a>
      </div>
    </nav>

<div>
  <br>
  <br>
  <br>
</div>

<section class="container">

    <div class="card text-center container corPrimaria" style="max-width: 350px; border-radius: 5px;">
 
        <div class="card-body">
      
          <p class="fs-1 text-white text-center">Usuários Cadastrados</p><br>
      
          <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
          <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_BfYiEt.json"  background="transparent"  speed="1" loop  autoplay></lottie-player>

      </div>
    </div>

<div>
  <br>
  <br>
  <br>
</div>


<table class="table bg-light">

  <thead>
    <tr>    
      <th scope="col">Email</th>
      <th scope="col">Senha</th>
      <th scope="col">Opções de edição</th>

    </tr>
  </thead>

  <tbody>
    
  <?php

//recebendo varevel dados 
while ($linha= mysqli_fetch_assoc ( $dados)) {
   
   //pegando os dados da vareavel dados e colocando em novas vareaveis e colocando na tabela

   $id= $linha ['id'];
   $email= $linha ['email'];
   $senha= $linha ['senha'];

    echo "
    
    <tr>
    <td>$email</td>
    <td>$senha</td>

    <td>
    <a href='tela_de_editar_usuario.php? id=$id' class='btn btn-success'> Editar </a>
    <a href='#' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirmar'
    onClick= " . '"' . "pegar_dados( $id )" . '"'. ">Excluir</a>
    </td>
    </tr> 
    
    ";
}

?>

<!-- Modal-->
<div class="modal fade" id="confirmar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="../controller/excluir_usuario.php" method="POST">
       <p> Realmente deseja EXCLUIR?</p>
      </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

           <input type="hidden" name="id" ID="codCDN_pessoa" value="">

           <input type="submit" class="btn btn-danger" value="Confirmar">
           
           <script>
           
           function pegar_dados(id){

            //document.getElementById("cod_pessoa2").value = nomeCDN;
            document.getElementById("codCDN_pessoa").value = id; 

           }

           </script>

      </form>
</div>

</table>
</section>

<div>
  <br>
  <br>
  <br>
</div>

 <!--preloader-->

 <div class="overlay">
  <div class="loader"></div>
</div>
<script src="../assets/js/preloader.js"></script> 
<link rel="stylesheet" href="../assets/css/preloader.css">

<!--preloader-->

<footer class="corPrimaria">

  <br>
  <p class="text-center text-white">© 2022 Cadastrapet Company, Inc</p>
  <p class="text-center text-white">Sistema web desenvolvido por Geanderson Ferreira & Viviane Raquel <br><br>
    <a href="Termos_de_uso.html" class="text-center text-white">Politica de Privacidade</a>
  </p>
  
  <br>

</footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>