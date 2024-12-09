<?php 
//Permite o include de arquivos que não podem ser abertos no navegador
define('__INCLUDED_BY_OTHER_FILE__', true);

include "Classes.php";
$TransferenciaInterna = new TransferenciaInterna;
include '../assets/lib/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if(!empty($_POST)){
    $datas = $_POST;

    // Chama todas as informações por data
    $saidas = $TransferenciaInterna->ChamaSaidaInterna($datas['data_inicial'], $datas['data_final']);

    $options = new Options();
    $dompdf = new Dompdf(['enable_remote' => true]);

    echo '<pre>';
    print_r($saidas);
    echo '</pre>';

    // $html = "";

    // $html .= "<!doctype html>";
    // $html .= "<html lang='pt-br'>";
    // $html .= "<head>";
    // $html .= "<meta charset='utf-8'>";
    // $html .= "<meta name='viewport' content='width=device-width, initial-scale=1'>";
    // $html .= "<title>Relatório de Saída</title>";
    // $html .= "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>";
    // $html .= "</head>";

    // $html .= "<body>";

    // $html .= "<center>";
    // $html .= "<img width='200px' src='http://medicalcontrol.free.nf/assets/img/medical_control_vetor.png'>";
    // $html .= "<p class='text-center small'>Seu Sistema de Controle de Medicamento</p>";
    // $html .= " </center>";

    // $html .= "<hr>";

    // $html .= "<div class='mt-1'>";
    // $html .= "<h4>Relatório de Saída</h4>";
    // $html .= "<small><strong>Período " . date('d/m/Y', strtotime($datas['data_inicial'])) . " - " . date('d/m/Y', strtotime($datas['data_final'])) . "</strong></small>";
    // //$html .= "</center>";
    // $html .= "</div>";
    // $html .= "</br>";

    // $html .= "<table class='table'>";
    // $html .= "<table class='table' style='margin-bottom: 10px;'>";
    // $html .= "<thead>";
    // $html .= "<tr>";

    // $html .= "<th><small>Data de Saída</small></th>";
    // $html .= "<th><small>Remédio</small></th>";
    // $html .= "<th><small>Unidade</small></th>";
    // $html .= "<th><small>Estoque Saída</small></th>";
    // $html .= "<th><small>Quantidade</small></th>";
    // $html .= "<th><small>Estoque Recebido</small></th>";
    // $html .= "<th><small>Usuário</small></th>";

    // $html .= "</tr>";
    // $html .= "</thead>";
    // $html .= "<tbody>";

    // foreach($saidas as $saida) {

    //     $nome_usu = explode(" ", $saida['usuario_transferencia_interna']);

    //     $html .= "<tr>";
    //         $html .= "<td><small>" . date('d/m/Y', strtotime($saida['data_transferencia_interna'])) . "</small></td>";
    //         $html .= "<td><small>" . $saida['remedio_transferencia_interna'] . "</small></td>";
    //         $html .= "<td><small>" . $saida['uni_transferencia_interna'] . "</small></td>";
    //         $html .= "<td><small>" . $saida['nome_estoque'] . "</small></td>";
    //         $html .= "<td><small>" . $saida['quant_transferencia_interna'] . "</small></td>";
    //         $html .= "<td><small>" . $saida['nome_subsetor'] . "</small></td>";
    //         $html .= "<td><small>" . $nome_usu[0] . "</small></td>";
    //         // $html .= "<td><small>" . $pedido['nome_estoque'] . "</small></td>";
    //     $html .="</tr>";

    // }    
    // $html .= "</tbody></table> ";

    // $html .= "</table> </br></br>";

    // $html .= "Emitido dia " . $date_emissao = date('d/m/Y H:i:s');
    //     $html .="</body>";
    //     $html .="</html>";

    // $dompdf->loadHtml($html);

    // // (Optional) Setup the paper size and orientation
    // $dompdf->setPaper('A4', 'landscape');

    // $dompdf->render();

    // $dompdf->stream("Relatório de Saída data " . $datas['data_inicial'] . "-" . $datas['data_final']);


} else {

    header("Location: index.php");
    die();

}



