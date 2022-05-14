<?php

//se tentar entrar pela url sem o login vai redirecionar para index
//session_start();
if(!$_SESSION['usuario']) {

    header('Location: ../screens/tela_de_login.php');
    exit();
    
}