<?php 
session_start();
include 'Classes.php';
$func = new TransferenciaInterna;
$func2 = new Remedio;

if(!empty($_GET)){

    header('Content-Type: application/json'); // Define o cabeçalho de tipo de conteúdo como JSON

    $remedio = $func2->chamaUnidadeRemedio($_GET['id_remedio']);
    
    $data_transferencia_interna = date('Y-m-d');

    $func->insereTransferenciaInterna($data_transferencia_interna, $_GET['id_remedio'], $remedio['nome_remedio'],  $_GET['uni_medida'], $_GET['id_estoque'], $_GET['quantidade'], '', $_SESSION['nome_usuario'], 'A');


    echo json_encode(['message' => 'Sucesso']);

} else {

    echo json_encode(['message' => 'Sucesso']);
}
