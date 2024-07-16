<?php 

include 'Classes.php';

// Verifica se há sessão aberta.
verificarSessao();

if(!empty($_POST)){

    $func = new Nomeclatura;

    $atualizarNomeclatura = $func->atualizarNomeclatura(trim($_POST['nome_nomeclatura']), trim($_POST['uni_medida_nomeclatura']),  $_POST['quant_minima_nomeclatura'], $_POST['id_nomeclatura']);

    header('Location: ../Nomeclatura.php?atualizado=sucesso&&EditarNomeclatura');
    
    // echo '<pre>';
    //     print_r($_POST);
    // echo '</pre>';


} else {

    header('Location: ../Nomeclatura.php?atualizado=erro&&EditarNomeclatura');
    die();

}






?>