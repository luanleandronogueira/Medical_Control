<?php 
    include 'Classes.php';

    $func = new Remedio;

    $recebido = $_POST;

    if(!empty($recebido)){

            print_r($recebido);
       

            $remedio = $func->chamaUnidadeRemedio($recebido['id_remedio']);

            $subtraiRemedio = ($remedio['quantidade_remedio']) + $recebido['quantidade_remedio'];

            $func->atualizaRemedioEstoque($recebido['id_remedio'], $subtraiRemedio);

            header("Location: ../detalhaEstoque.php?id=" . $recebido['id_estoque']);


    } else {

        header("Location: ../detalhaEstoque.php?id=" . $recebido['id_estoque']);
        die();

    } 
?>