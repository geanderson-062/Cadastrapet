<?php

//incluindo a conexao
include "../controller/conexao.php";

//vareavel que vai armazenar os dados para o array
$dados = array();

//selecionando a tabela
$sql = "SELECT * FROM `pets`";

//vareavel que vai armazenar a consulta do banco
$result = mysqli_query($conexao, $sql);

//me entregue os valores mairoes que nada
if (mysqli_num_rows($result) > 0) {

    //o que tiver dentro de result coloque dentro de user
    while ($user = mysqli_fetch_array($result)) {

        //traazendo os dados para o array
        $dados['animais']=array (

            //dados do banco que vao para o json
            //'id' => intval($user['id']), quando for passe assim

            'id' => intval($user['id']),
            'nome' => $user['nome'],
            'raca' => $user['raca'],
            'endereco' => $user['endereco'],
            'telefone' => $user['telefone'],
            'responsavel' => $user['responsavel'],

        );
    }
}   else { //se não tiver nada faça isso

    echo 'nenhum resultado';
    exit;//encerre agora
}

     //retornando o json
     echo json_encode($dados);

?>