<?php 

include "Classes.php";
$Carrinho = new CarrinhoTransferencia;

// header('Content-Type: application/json');
$postData = file_get_contents('php://input');

// Verifica se há dados no POST
if ($postData) {

    // Decodifica o JSON recebido
    $data = json_decode($postData, true);

    // Verifica se a decodificação foi bem-sucedida
    if ($data) {

        $Carrinho->inserirCarrinhoTransferencia($data['id_remedio'], $data['nome_remedio'], $data['quantidade_carrinho_transferencia'], $data['estoque_enviando'], $data['estoque_recebido'], $data['data'], $data['lote'], $data['status']);
        // Aqui você pode adicionar o código para manipular os dados, como salvar no banco de dados, etc.

        $response = [
            'status' => 'success',
            'message' => 'Dados recebidos com sucesso',
            'data' => $data // Opcional: Retornar os dados recebidos para confirmação
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Erro ao decodificar os dados JSON'
        ];
    }
} else {
    $response = [
        'status' => 'error',
        'message' => 'Nenhum dado recebido'
    ];
}

// Retorna a resposta JSON
echo json_encode($response);
?>

