<?php 
    //Permite o include de arquivos que não podem ser abertos no navegador
    define('__INCLUDED_BY_OTHER_FILE__', true);
    include 'Classes.php';

    // Verifica se há sessão aberta.
	verificarSessao();
    $func = new Remedio;
    $func2 = new AjusteInventario;
    $recebido = $_POST;

    $id_usuario = $_POST['id_usuario'];

    if(!empty($recebido)){
            //print_r($recebido);
            $remedio = $func->chamaUnidadeRemedio($recebido['id_remedio']);
            $subtraiRemedio = $recebido['quantidade_remedio'];

            //insere no banco a movimentação dos ajustes dos inventários
            $func2->insereObservacao($recebido['id_remedio'], $recebido['quantidade_remedio'], $id_usuario, $_POST['inventario_observacao'], date('Y-m-d'), $recebido['id_estoque']);

            //atualiza no banco
            $func->atualizaRemedioEstoque($recebido['id_remedio'], $subtraiRemedio);
            //header("Location: ../ajustaInventario.php?id=" . $recebido['id_estoque'] . "&&insercao=sucesso");

    } else {
        header("Location: ../index.php");
        die();

    } 
?>