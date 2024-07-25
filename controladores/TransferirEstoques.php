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
$func3 = new CarrinhoTransferencia;

//recebe o histórico da transferência
$historico = $_POST['historico_historico'];

echo '<pre>';
print_r($_POST);
echo '</pre>';

$_POST['quant_min_estoque_remedio'] = 0;

if (!empty($historico)) {

    $lote = $func3->chamaCarrinho($_POST['lote']);

    echo '<pre>';
    print_r($lote);
    echo '</pre>';
    foreach ($lote as $l) {

        //armazena a data da transferência em uma variável
        $data = $l['data_carrinho_transferencia'];

        // chama os remedio da unidade
        $chamaUnidadeRemedio = $func->chamaUnidadeRemedio($l['id_remedio_carrinho_transferencia']);

        // Faz o abatimento antes de atualizar no banco de dados a saida dos itens
        $AbateRemedio = $chamaUnidadeRemedio['quantidade_remedio'] - $l['quantidade_carrinho_transferencia'];

        // atualiza a saída do estoque atual
        $AtualizaRemedio = $func->atualizaRemedioEstoque($l['id_remedio_carrinho_transferencia'], $AbateRemedio);

        // Traz os dados do Estoque que está recebendo a atualização
        $chamaNomeRemedio = $func->chamaRemedioPorNome($l['estoque_destino_carrinho_transferencia'], $l['nome_carrinho_transferencia']);

        if ($chamaNomeRemedio == "") {

            // se no estoque ainda não tiver esse remedio, inserir um novo
            $inserirRemedio = $func->inserirRemedio(
                $l['nome_carrinho_transferencia'],
                $chamaUnidadeRemedio['uni_medida_remedio'],
                $l['quantidade_carrinho_transferencia'],
                $_POST['quant_min_estoque_remedio'],
                $chamaUnidadeRemedio['vencimento_remedio'],
                $l['estoque_enviado_carrinho_transferencia']
            );

            // inserir histórico da transferência
            $inserirHistorico = $func2->inserirHistorico(
                $historico,
                $data,
                $_SESSION['nome_usuario'],
                $l['nome_carrinho_transferencia'],
                $l['quantidade_carrinho_transferencia'],
                $l['estoque_enviado_carrinho_transferencia'],
                $l['estoque_destino_carrinho_transferencia']
            );

            header("Location: ../detalhaEstoque.php?id=" . $_POST['estoque'] . "&&insercao=sucesso");
        } else {

            // se já tiver, primeiro faz a soma dos itens já trazidos
            $somaAtualizada = $chamaNomeRemedio['quantidade_remedio'] + $l['quantidade_carrinho_transferencia'];

            // agora atualiza usando a função.
            $atualizandoValorRemedio = $func->atualizaRemedioEstoque($chamaNomeRemedio['id_remedio'], $somaAtualizada);

            // inserir histórico da transferência
            $inserirHistorico = $func2->inserirHistorico(
                $historico,
                $data,
                $_SESSION['nome_usuario'],
                $l['nome_carrinho_transferencia'],
                $l['quantidade_carrinho_transferencia'],
                $l['estoque_enviado_carrinho_transferencia'],
                $l['estoque_destino_carrinho_transferencia']
            );

            header("Location: ../detalhaEstoque.php?id=" . $l['estoque_destino_carrinho_transferencia'] . "&&insercao=sucesso");
        }
    }
} else {

    header("Location: index.php");
    die();
}
