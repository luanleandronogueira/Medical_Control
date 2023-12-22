<?php 

    include 'Classes.php';

    echo '<pre>';
        print_r($_POST);
    echo '</pre>';

    $func = new Remedio;

    $chamaRemedioPnome = $func->chamaRemedioPorNome($_POST['estoque'],$_POST['nome_remedio']);

    $quant_recebida = $_POST['quantidade_remedio'];
    $estoque_transferencia = $_POST['estoque'];

    $comparacao = strcmp($chamaRemedioPnome['nome_remedio'], $_POST['nome_remedio']);
    


    echo $quant_recebida . " " . $estoque_transferencia . '</br>';

    echo '<pre>';
        print_r($chamaRemedioPnome);
    echo '</pre>';
?>