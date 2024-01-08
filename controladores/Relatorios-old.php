<?php

// Inclua as classes e outras dependências necessárias
include "Classes.php";
require '../assets/vendor/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

extract($_POST);

// Cria uma instância da classe P_Emitido
$func = new P_Emitido;

// Consulta os pedidos emitidos por data
$chamaPedidoEmitido = $func->consultaPedidosEmitidosPorData($data_inicial, $data_final);

// Configurações do Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

// Cria uma instância do Dompdf
$dompdf = new Dompdf($options, ['enable_remote' => true]);

// HTML para o PDF
$html = '<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relatório de Entrada</title>
    <style>
        ' . file_get_contents('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css') . '
    </style>
</head>
<body>';

$html .= '<div class="container">
            <center>
                <img width="300px" src="data:image/png;base64,' . base64_encode(file_get_contents('http://localhost/Medical_Control/assets/img/medical_control_vetor.png')) . '" alt="Logo">
                <p class="text-center small">Seu Sistema de Controle de Medicamento</p>
            </center>
            <hr>
            <div class="mt-4">
                <center><h4>Relatório de Entrada</h4></center>
            </div>
            </br>

            <div class="row">
                <table class="table table-sm">';

$currentPedido = null;

foreach ($chamaPedidoEmitido as $pedido) {

    if ($currentPedido !== $pedido['n_p_emitido']) {

        // Se o número do pedido mudou, comece uma nova tabela

        if ($currentPedido !== null) {

            $html .= '</tbody></table>'; // Feche a tabela anterior

        }

        $html .= '<table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nº Nota Fiscal</th>
                            <th>Data de Entrada</th>
                            <th>Nº Pedido Emitido</th>
                            <th>Item</th>
                            <th>Quant</th>
                            <th>Data de Validade</th>
                            <th>Lote</th>
                            <th>Fabricante</th>
                            <th>Estoque de Entrada</th>
                        </tr>
                    </thead>
                    <tbody>';

        $currentPedido = $pedido['n_p_emitido'];

    }

    $html .= '<tr>
                <td>' . $pedido['n_nota_fiscal_pedido'] . '</td>
                <td>' . date('d/m/Y', strtotime($pedido['data_entrada_pedido'])) . '</td>
                <td>' . $pedido['n_p_emitido'] . '</td>
                <td>' . $pedido['nomeclatura_p_emitido'] . '</td>
                <td>' . $pedido['quantidade_p_emitido'] . '</td>
                <td>' . date('d/m/Y', strtotime($pedido['data_val_p_emitido'])) . '</td>
                <td>' . $pedido['lote_p_emitido'] . '</td>
                <td>' . $pedido['fabricante_p_emitido'] . '</td>
                <td>' . $pedido['nome_estoque'] . '</td>
              </tr>';

}

$html .= '</tbody></table></div></div>';

$html .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>';

// Carrega o HTML no Dompdf
$dompdf->loadHtml($html);

// (Opcional) Configure o tamanho e a orientação do papel
$dompdf->setPaper('A4', 'landscape');

// Renderiza o HTML como PDF
$dompdf->render();

// Saída do PDF para o navegador
$dompdf->stream();
