<?php
//Permite o include de arquivos que não podem ser abertos no navegador
define('__INCLUDED_BY_OTHER_FILE__', true);

include 'Classes.php';

// verifica se há um POST válido
if (!empty($_POST)){

    // vê qual a condição do POST enviado
    if(isset($_POST['nota_pedido'])) {

        // Instância o método e dá um extract no POST dividindo o Array em variáveis
        $func = new Pedido;
        extract($_POST);

        // chama o método para incluir o pedido no banco de dados
        $inserirPedido = $func->inserirPedido($n_nota_fiscal_pedido, $chave_nota_pedido, $data_entrada_pedido);

        // faz o redirecionamento para a pagína passando os parâmetros 
        header("Location: ../emitirPedido.php?cadastrar=sucesso&&EmitirPedido");

    } else {

        // Instância o método e dá um extract no POST dividindo o Array em variáveis
        $func = new P_Emitido;
        extract($_POST);

        // chama o método para incluir o pedido no banco de dados
        $inserirPedido = $func->inserir_P_Emitido($n_p_emitido, 
                                                    $nomeclatura_p_emitido, 
                                                    $quantidade_p_emitido,
                                                    $data_val_p_emitido,
                                                    $lote_p_emitido,
                                                    $fabricante_p_emitido,
                                                    $estoque_p_emitido);

        // Instância o a classe Remédio                                            
        $func2 = new Remedio;

        // chama a função para vê se há a unidade do remédio no DB
        $chamaRemedio = $func2->chamaRemedioPorNome($estoque_p_emitido, $nomeclatura_p_emitido);

        // condição caso ñ seja vazio
        if(!empty($chamaRemedio)){

            // faz a soma do que há no banco com o valor do novo pedido
            $somaRemedio = $quantidade_p_emitido + $chamaRemedio['quantidade_remedio'];

            // echo '<pre>';
            //     print_r($chamaRemedio);
            // echo '</pre> </br>';

            // faz a atualização no banco da quantidade do item
            $atualizaRemedio = $func2->atualizaRemedioEstoque($chamaRemedio['id_remedio'], $somaRemedio);

            // faz o redirecionamento para a pagína passando os parâmetros 
            header("Location: ../emitirPedido.php?cadastrar=Sucessos&&EmitirPedido_P_Emitido");


        } else {

            // se for vazio ele insere o remédio novo com todos os dados no DB
            $inserirRemedio = $func2->inserirRemedio($nomeclatura_p_emitido, $uni_medida_nomeclatura, $quantidade_p_emitido, $data_val_p_emitido, $estoque_p_emitido);
            
            // faz o redirecionamento para a pagína passando os parâmetros 
            header("Location: ../emitirPedido.php?cadastrar=Sucessos&&EmitirPedido_P_Emitido");

        }
        
        // faz o redirecionamento para a pagína passando os parâmetros 
        header("Location: ../emitirPedido.php?cadastrar=Sucessos&&EmitirPedido_P_Emitido");
    }

    

} else {

    // faz o redirecionamento para a página passando os parâmetros 
    header("Location: ../emitirPedido.php");
    die();

}









?>