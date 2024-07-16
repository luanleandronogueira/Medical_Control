<?php 
   //Permite o include de arquivos que não podem ser abertos no navegador
//    define('__INCLUDED_BY_OTHER_FILE__', true);
    
   include 'Classes.php';

   $remedio = new Remedio;

   $T_Remedios = $remedio->chamaRemedioNome($_GET['remedio']);

//    echo '<pre>';
//         print_r($T_Remedios);
//    echo '</pre>';

    if(!empty($T_Remedios)){

        header('Content-Type: application/json');

        echo json_encode($T_Remedios);

    } else {

        echo json_encode(['error' => 'VAZIO']);

    }

   

?>