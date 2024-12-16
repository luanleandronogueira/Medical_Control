<?php 
session_start();
include 'Classes.php';

$TransferenciaInterna = new TransferenciaInterna;
$Remedios = new Remedio;

echo '<pre>';
                print_r($_POST);
                echo '</pre>';

if(!empty($_POST)){

    // Separa os dados enviados por post
    $dados = explode('-', $_POST['subsetor_transferencia']);

    // Chama todas as transferencias em aberto
    $Aberta = $TransferenciaInterna->chamaTransferenciaInternaAberta($_POST['id_estoque'], $_POST['data_transferencia']);

    // Faz a transferencia e atualização
    foreach($Aberta as $transferencia_aberta){
        
        // Chama todos os remedios nos estoques
        $AtualizaEstoque = $Remedios->chamaUnidadeRemedio($transferencia_aberta['id_remedio_transferencia_interna']);
       
        //Atualiza a tabela de transferencia aberta
        $TransferenciaInterna->AtualizaTransferenciaInterna($transferencia_aberta['id_transferencia_interna'], $dados[0], 'F');

        // abate o valor do estoque
        $ValorAbatido = $AtualizaEstoque['quantidade_remedio'] - $transferencia_aberta['quant_transferencia_interna'];

        // Atualiza o remédio no estoque que está saindo
        $Remedios->atualizaRemedioEstoque($transferencia_aberta['id_remedio_transferencia_interna'], $ValorAbatido);

        header("Location: ../usuario/transferenciasInternasUsuario.php?insercao=sucesso&&id=" . $_POST['id_estoque']);

    }

} else {

    header("Location: ../index.php");
    die();
}

?>