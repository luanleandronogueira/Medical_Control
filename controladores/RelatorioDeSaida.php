<?php 
//Permite o include de arquivos que não podem ser abertos no navegador
define('__INCLUDED_BY_OTHER_FILE__', true);

include "Classes.php";

include '../assets/lib/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$datas = $_POST;

extract($_POST);


if(!empty($_POST)){

    $func = new Saida;

    $chamaSaidaPorEstoque = $func->chamaSaidaPorEstoque($id_estoque, $data_inicial, $data_final);

    $options = new Options();

    $dompdf = new Dompdf(['enable_remote' => true]);

    $html = "";

    $html .= "<!doctype html>";
    $html .= "<html lang='pt-br'>";
    $html .= "<head>";
    $html .= "<meta charset='utf-8'>";
    $html .= "<meta name='viewport' content='width=device-width, initial-scale=1'>";
    $html .= "<title>Relatório de Saída</title>";
    $html .= "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>";
    $html .= "</head>";

    $html .= "<body>";

    $html .= "<center>";
    $html .= "<img width='200px' src='http://medicalcontrol.free.nf/assets/img/medical_control_vetor.png'>";
    $html .= "<p class='text-center small'>Seu Sistema de Controle de Medicamento</p>";
    $html .= " </center>";

    $html .= "<hr>";

    $html .= "<div class='mt-1'>";
    $html .= "<h4>Relatório de Saída</h4>";
    $html .= "<small><strong>Período " . date('d/m/Y', strtotime($datas['data_inicial'])) . " - " . date('d/m/Y', strtotime($datas['data_final'])) . "</strong></small>";
    //$html .= "</center>";
    $html .= "</div>";
    $html .= "</br>";

    $html .= "<table class='table'>";
    $html .= "<table class='table' style='margin-bottom: 10px;'>";
    $html .= "<thead>";
    $html .= "<tr>";

    $html .= "<th><small>Nome Paciente</small></th>";
    $html .= "<th><small>Data de Saída</small></th>";
    $html .= "<th><small>Nº SUS</small></th>";
    $html .= "<th><small>Item</small></th>";
    $html .= "<th><small>Quant</small></th>";
    $html .= "<th><small>Nº Receita</small></th>";
    $html .= "<th><small>Status Receita</small></th>";

    $html .= "</tr>";
    $html .= "</thead>";
    $html .= "<tbody>";

    foreach($chamaSaidaPorEstoque as $saida) {

        $html .= "<tr>";
            $html .= "<td><small>" . $saida['nome_paciente_saida'] . "</small></td>";
            $html .= "<td><small>" . date('d/m/Y', strtotime($saida['data_saida'])) . "</small></td>";
            $html .= "<td><small>" . $saida['sus_saida'] . "</small></td>";
            $html .= "<td><small>" . $saida['remedio_saida'] . "</small></td>";
            $html .= "<td><small>" . $saida['quantidade_saida'] . "</small></td>";
            $html .= "<td><small>" . $saida['n_receita_saida'] . "</small></td>";
            $html .= "<td><small>" . $saida['status_receita_saida'] . "</small></td>";
            // $html .= "<td><small>" . $pedido['fabricante_p_emitido'] . "</small></td>";
            // $html .= "<td><small>" . $pedido['nome_estoque'] . "</small></td>";
        $html .="</tr>";




    }    
    $html .= "</tbody></table> ";

    $html .= "</table> </br></br>";
    
    
    $html .= "Emitido dia " . $date_emissao = date('d/m/Y H:i:s');
        $html .="</body>";
        $html .="</html>";

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream("Relatório de Saída data " . $datas['data_inicial'] . "-" . $datas['data_final']);


} else {

    // echo 'Vazio';

}


?>