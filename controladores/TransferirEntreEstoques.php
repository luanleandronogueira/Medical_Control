<?php

//Permite o include de arquivos que não podem ser abertos no navegador
define('__INCLUDED_BY_OTHER_FILE__', true);

include 'Classes.php';

// Verifica se há sessão aberta.
verificarSessao();

// define horário do Brasil
date_default_timezone_set('America/Sao_Paulo');

// instancia a classe Remedio & Historico
$func = new Remedio;
$func2 = new Historico;

//recebe o histórico da transferência
$historico = $_POST['historico_historico'];


if (!empty($historico)) {

    //armazena a data da transferência em uma variável
    $data = $_POST['data'];

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    // chama os remedio da unidade
    $chamaUnidadeRemedio = $func->chamaUnidadeRemedio($_POST['id_remedio']);

    // Faz o abatimento antes de atualizar no banco de dados a saida dos itens
    $AbateRemedio = $chamaUnidadeRemedio['quantidade_remedio'] - $_POST['quantidade_remedio'];

    // atualiza a saída do estoque atual
    $AtualizaRemedio = $func->atualizaRemedioEstoque($_POST['id_remedio'], $AbateRemedio);

    // Traz os dados do Estoque que está recebendo a atualização
    $chamaNomeRemedio = $func->chamaRemedioPorNome($_POST['estoque'], $_POST['nome_remedio']);



    if ($chamaNomeRemedio == "") {

        // se no estoque ainda não tiver esse remedio, inserir um novo
        $inserirRemedio = $func->inserirRemedio(
            $_POST['nome_remedio'],
            $chamaUnidadeRemedio['uni_medida_remedio'],
            $_POST['quantidade_remedio'],
            $_POST['quant_min_estoque_remedio'],
            $chamaUnidadeRemedio['vencimento_remedio'],
            $_POST['estoque']
        );

        // inserir histórico da transferência
        $inserirHistorico = $func2->inserirHistorico(
            $historico,
            $data,
            $_SESSION['nome_usuario'],
            $_POST['nome_remedio'],
            $_POST['quantidade_remedio'],
            $_POST['estoque_enviando'],
            $_POST['estoque']
        );

        header("Location: ../detalhaEstoque.php?id=" . $_POST['estoque'] . "&&insercao=sucesso");
        
    } else {

        // se já tiver, primeiro faz a soma dos itens já trazidos
        $somaAtualizada = $chamaNomeRemedio['quantidade_remedio'] + $_POST['quantidade_remedio'];

        // agora atualiza usando a função.
        $atualizandoValorRemedio = $func->atualizaRemedioEstoque($chamaNomeRemedio['id_remedio'], $somaAtualizada);

        // inserir histórico da transferência
        $inserirHistorico = $func2->inserirHistorico(
            $historico,
            $data,
            $_SESSION['nome_usuario'],
            $_POST['nome_remedio'],
            $_POST['quantidade_remedio'],
            $_POST['estoque_enviando'],
            $_POST['estoque']
        );

        header("Location: ../detalhaEstoque.php?id=" . $_POST['estoque'] . "&&insercao=sucesso");
    }
} else {

    header("Location: index.php");
    die();
}
