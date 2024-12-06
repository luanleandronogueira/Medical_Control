<?php 
session_start();
include 'Classes.php';
$func = new TransferenciaInterna;
$func2 = new Remedio;

if(!empty($_GET)){

    header('Content-Type: application/json'); // Define o cabeçalho de tipo de conteúdo como JSON
    
    $func->DeletaTransferenciaAberta($_GET['id']);
    echo json_encode(['message' => 'Sucesso']);

} else {

    echo json_encode(['message' => 'Falhou']);
}
