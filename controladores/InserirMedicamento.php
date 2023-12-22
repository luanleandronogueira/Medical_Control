<?php 

    include "Classes.php";

    $func = new Remedio;

    $remedio = $_REQUEST;

    extract($remedio);

    if(empty($remedio)){

        header("Location: index.php");
        die();

    } else {

        $uni_med_upper = strtoupper($uni_medida_remedio);
        $func->inserirRemedio($nomeclatura, $uni_med_upper, $quantidade_remedio, $vencimento_remedio, $estoque_remedio);

        header("Location: ../cadastrarMedicamento.php?cadastrar=sucesso");
        


    }

    



?>