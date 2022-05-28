<?php

//Cabecalhos obrigatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Incluir a conexao
include_once 'conexao.php';

$query_pets = "SELECT * FROM `pets` ORDER BY id DESC";
$result_pets = $conn->prepare($query_pets);
$result_pets->execute();

if(($result_pets) AND ($result_pets->rowCount() != 0)){
    while($row_pets = $result_pets->fetch(PDO::FETCH_ASSOC)){
        extract($row_pets);

        $lista_produtos["pets"][$id] = [
           
            'id' => $id,
            'nome' => $nome,
            'raca' => $raca,
            'endereco' => $endereco,
            'telefone' => $telefone,
            'responsavel' => $responsavel,

        ];
    }

    //Resposta com status 200
    http_response_code(200);

    //Retornar os produtos em formato json
    echo json_encode($lista_pets);
}