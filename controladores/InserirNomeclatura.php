<?php 

    include 'Classes.php';
    
    $funcao = new Nomeclatura;

    $nome = $_POST;

    extract($nome);

    //echo $remedio;
    //print_r($nome);

    if(empty($remedio)) {

        header("Location: index.php");
        exit();

    } else {

        $RemedioUpper = strtoupper($remedio);
        $funcao->inserirNomeclatura($RemedioUpper);
        header("Location: ./Nomeclatura.php?insercao=sucesso");
    }

    


   
?>
    

