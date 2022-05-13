<?php

//para fazer esse terabalho precisa pegar os dados por uma conecxao 
//selecionar a tabela  e pegar os dados e passar por uma array

//criando o array com os dados
 $dados = array (

    //daos inseridos 
    'id' => 1, 
    'name' => 'gean',
    'email' => 'geandersonfds@gmail.com',

     );

     //retornando o json
     echo json_encode($dados);

?>