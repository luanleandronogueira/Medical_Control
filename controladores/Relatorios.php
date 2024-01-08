<?php 

//Permite o include de arquivos que não podem ser abertos no navegador
define('__INCLUDED_BY_OTHER_FILE__', true);

include "Classes.php";

include '../assets/lib/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$datas = $_POST;

if(!empty($_POST)) {

    $func = new P_Emitido;

    $chamaPedidoEmitido = $func->consultaPedidosEmitidosPorData($datas['data_inicial'], 
                                                                $datas['data_final']); 

    $options = new Options();

    $dompdf = new Dompdf(['enable_remote' => true]);

    $html = "";

    $html .= "<!doctype html>";
    $html .= "<html lang='pt-br'>";
    $html .= "<head>";
    $html .= "<meta charset='utf-8'>";
    $html .= "<meta name='viewport' content='width=device-width, initial-scale=1'>";
    $html .= "<title>Relatório de Entrada</title>";
    $html .= "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>";
    $html .= "</head>";

    $html .= "<body>";

    $html .= "<center>";
    $html .= "<img width='200px' src='http://localhost/Medical_Control/assets/img/medical_control_vetor.png'>";
    $html .= "<p class='text-center small'>Seu Sistema de Controle de Medicamento</p>";
    $html .= " </center>";

    $html .= "<hr>";

    $html .= "<div class='mt-1'>";
    $html .= "<h4>Relatório de Entrada</h4>";
    $html .= "<small><strong>Período " . date('d/m/Y', strtotime($datas['data_inicial'])) . " - " . date('d/m/Y', strtotime($datas['data_final'])) . "</strong></small>";
    //$html .= "</center>";
    $html .= "</div>";
    $html .= "</br>";

    // $html .= "<div class='container'>";
    // $html .= "<div class='row'>";
    $html .= "<table class='table'>";

    // Lógica PHP para listar corretamente
    $currentPedido = null;
    foreach ($chamaPedidoEmitido as $pedido) {
    if ($currentPedido !== $pedido['n_p_emitido']) {
        // Se o número do pedido mudou, comece uma nova tabela

        if ($currentPedido !== null) {
            $html .= "</tbody></table>"; 
        }
        
        $html .= "<table class='table' style='margin-bottom: 10px;'>";
        $html .= "<thead>";
        $html .= "<tr>";
        $html .= "<th><small>Nº N. Fiscal</small></th>";
        $html .= "<th><small>Entrada</small></th>";
        $html .= "<th><small>Nº Pedido</small></th>";
        $html .= "<th><small>Item</small></th>";
        $html .= "<th><small>Quant</small></th>";
        $html .= "<th><small>Validade</small></th>";
        $html .= "<th><small>Lote</small></th>";
        $html .= "<th><small>Fabricante</small></th>";
        $html .= "<th><small>Estoque</small></th>";
        $html .= "</tr>";
        $html .= "</thead>";
        $html .= "<tbody>";

        $currentPedido = $pedido['n_p_emitido'];
        }

    // Exibir os dados da tabela

        $html .= "<tr>";
            $html .= "<td><small>" . $pedido['n_nota_fiscal_pedido'] . "</small></td>";
            $html .= "<td><small>" . date('d/m/Y', strtotime($pedido['data_entrada_pedido'])) . "</small></td>";
            $html .= "<td><small>" . $pedido['n_p_emitido'] . "</small></td>";
            $html .= "<td><small>" . $pedido['nomeclatura_p_emitido'] . "</small></td>";
            $html .= "<td><small>" . $pedido['quantidade_p_emitido'] . "</small></td>";
            $html .= "<td><small>" . date('d/m/Y', strtotime($pedido['data_val_p_emitido'])) . "</small></td>";
            $html .= "<td><small>" . $pedido['lote_p_emitido'] . "</small></td>";
            $html .= "<td><small>" . $pedido['fabricante_p_emitido'] . "</small></td>";
            $html .= "<td><small>" . $pedido['nome_estoque'] . "</small></td>";
        $html .="</tr>";
    }
        $html .= "</tbody></table> ";

        $html .= "</table> </br></br>";
        // $html .= "</div>";
        // $html .= "</div>";

        // $html .="<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL' crossorigin='anonymous'></script>";

        $html .= "Emitido dia " . $date_emissao = date('d/m/Y H:i:s');
        $html .="</body>";
        $html .="</html>";

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();


    $dompdf->stream("Relatório de Entrada data " . $datas['data_inicial'] . "-" . $datas['data_final']);

} else {

    header("Location: ../dashboard.php?&&acesso=negado");
    die();
}



?>
