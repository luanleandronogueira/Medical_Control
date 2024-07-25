<?php 

include 'Classes.php';

$func = new CarrinhoTransferencia;

if(!empty($_GET['id'])){

    header('Content-Type: application/json');

    $func->DeletaItemCarinnho($_GET['id']);

    echo json_encode($resposta = ['Status' => 'OK']);

} else {

    header('Location: ../index.php');
    die();

}