<?php 

    include 'Classes.php';


    $func = new Estoque;
    $nome_estoque = strtoupper($_POST['nome_estoque']);


    if (!empty($nome_estoque)){

       $func->inserirEstoque($nome_estoque);
       header("Location: ../cadastrarEstoque.php?insercao=sucesso");


    } else {

        echo 'Vazio';

    }


  

    


?>