<?php 

    //Permite o include de arquivos que não podem ser abertos no navegador
    define('__INCLUDED_BY_OTHER_FILE__', true);


    include 'Classes.php';

    // Verifica se há sessão aberta.
	verificarSessao();

    $func = new Remedio;

    $recebido = $_POST;

    if(!empty($recebido)){

            print_r($recebido);
       

            $remedio = $func->chamaUnidadeRemedio($recebido['id_remedio']);

            $subtraiRemedio = ($remedio['quantidade_remedio']) + $recebido['quantidade_remedio'];

            $func->atualizaRemedioEstoque($recebido['id_remedio'], $subtraiRemedio);

            header("Location: ../detalhaEstoque.php?id=" . $recebido['id_estoque']);


    } else {

        header("Location: ../index.php");
        die();

    } 
?>