<?php 
    //Permite o include de arquivos que não podem ser abertos no navegador
    define('__INCLUDED_BY_OTHER_FILE__', true);
    
    include 'Classes.php';

    $func = new Subsetor;
    $nome_estoque = strtoupper($_POST['nome_subsetor']);


    if (!empty($nome_estoque)){

       $func->inserirSubsetor($nome_estoque, $_POST['estoque_subsetor']);
       header("Location: ../cadastrarSubsetor.php?insercao=sucesso&&id=" . $_POST['estoque_subsetor']);


    } else {

        header("Location: index.php");
        die();

    }

?>