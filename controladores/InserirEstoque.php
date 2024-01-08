<?php 
    //Permite o include de arquivos que não podem ser abertos no navegador
    define('__INCLUDED_BY_OTHER_FILE__', true);
    
    include 'Classes.php';

    $func = new Estoque;
    $nome_estoque = strtoupper($_POST['nome_estoque']);


    if (!empty($nome_estoque)){

       $func->inserirEstoque($nome_estoque);
       header("Location: ../cadastrarEstoque.php?insercao=sucesso");


    } else {

        header("Location: index.php");
        die();

    }


  

    


?>