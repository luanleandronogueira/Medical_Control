<?php 
    //Permite o include de arquivos que não podem ser abertos no navegador
    define('__INCLUDED_BY_OTHER_FILE__', true);
    
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
        $funcao->inserirNomeclatura($RemedioUpper, strtoupper($uni_medida_nomeclatura), $quant_minima_nomeclatura);
        header("Location: ../Nomeclatura.php?insercao=sucesso");
    }

    


   
?>
    

