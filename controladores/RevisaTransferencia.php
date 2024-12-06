<?php 
include 'Classes.php';
$Remedios =  new Remedio;

$Remedio = [];

while($_POST['remedios_selecionados']) {

    $Remedio = $Remedios->chamaRemedioPorNome($_POST['id_estoque_saida'], $_POST['']);
}

echo '<pre>';
print_r($_POST);
echo '</pre>';



// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Obtém os IDs dos remédios selecionados
//     $remediosSelecionados = $_POST['remedios_selecionados'] ?? [];
    
//     // Obtém as quantidades associadas
//     $quantidades = $_POST['quantidade_transferencia_interna'] ?? [];


//     if (!empty($remediosSelecionados)) {
//         foreach ($remediosSelecionados as $idRemedio) {
//             // Verifica se há quantidade associada ao ID do remédio
//             $quantidade = $quantidades[$idRemedio] ?? 0;

//             // Exibe ou processa os dados
//             echo "ID do Remédio: $idRemedio - Quantidade: $quantidade<br>";
//         }
//     } else {
//         echo "Nenhum remédio foi selecionado.";
//     }
// }


















?>