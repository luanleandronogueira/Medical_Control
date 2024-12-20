<?php 
include '../controladores/Classes.php';
// Verifica se há sessão aberta.

verificarSessaoUsuario();
// instancia classes que serão usados
$func = new Remedio;
$func2 = new Saida;
$Data_Retirada = new Data_Retirada;
$data = $_POST['data_data_retirada'];

if (empty($_POST['sem_receita'])) {
    $_POST['sem_receita'] = 'Com Receita';
}

// exclui as posições que estão zeradas
$remedio_id = array_filter($_POST['quantidade_transferencia_interna'], function($valor) {
    return $valor !== '';
});

foreach($remedio_id as $ID => $quant_saida){
    $r_nome = $func->chamaNomeRemedio($ID);
    // echo $r_nome['nome_remedio'] . ' ' . $ID . ' = ' . $quant_saida . '<br>';

    // chama o método para trazer os remédios do setor
    $remedio = $func->chamaRemedioNomeEstoque($ID, $r_nome['nome_remedio'], $_POST['setor_usuario']);

    // faz o abate do banco de dados referente a saída
    if ($remedio['quantidade_remedio'] < $quant_saida or  $remedio['quantidade_remedio'] == 0) {
        header("Location: ../usuario/saidaMedicamentos.php?valor=excedido&&SaidaMedicamentos");
        die();
        //echo 'caiu aqui';

    } else {
        $Ultima_Retirada = $Data_Retirada->consultaDataRetirada($ID, $_POST['sus_saida']);

        if(!empty($Ultima_Retirada)){
            $data_data_retirada = new DateTime($_POST['data_data_retirada']);
            $prox_retirada_data_retirada = new DateTime($Ultima_Retirada['prox_retirada_data_retirada']);

            if ($data_data_retirada >= $prox_retirada_data_retirada) {
                // Faz o abate dos valores do banco de dados com o valor de saída
                $abateParaSaida = $remedio['quantidade_remedio'] - intval($quant_saida);

                // Aqui método que atualiza a saída no banco de dados
                $func->atualizaRemedioEstoque($ID, $abateParaSaida);

                // Inserir saída 
                $func2->inserirSaida(
                    $_POST['sem_receita'],
                    $ID,
                    $remedio['nome_remedio'],
                    $quant_saida,
                    $_POST['sus_saida'],
                    ucwords($_POST['nome_paciente_saida']),
                    $_POST['n_receita_saida'],
                    $_POST['observacao_saida'],
                    $_SESSION['nome_usuario'],
                    $data,
                    $_POST['setor_usuario']
                );

                $Data_Retirada->inserirDataRetirada($ID, $_POST['data_data_retirada'], $_POST['prox_retirada_data_retirada'], $_POST['sus_saida'], ucwords($_POST['nome_paciente_saida']));

                header("Location: ../usuario/saidaMedicamentos.php?baixa=sucesso&&SaidaMedicamentos");

            } else {
                header("Location: ../usuario/saidaMedicamentos.php?erro=ForaPrazo&&paciente=". $Ultima_Retirada['nome_data_retirada'] . "&&dataPrazo=" . $Ultima_Retirada['prox_retirada_data_retirada']);
            }
        } else {
            // Faz o abate dos valores do banco de dados com o valor de saída
            $abateParaSaida = $remedio['quantidade_remedio'] - intval($quant_saida);

            if (empty($_POST['sem_receita'])) {
                $_POST['sem_receita'] = 'Com Receita';
            }

            // // Aqui método que atualiza a saída no banco de dados
            $func->atualizaRemedioEstoque($ID, $abateParaSaida);

            // // Inserir saída 
            $func2->inserirSaida(
                $_POST['sem_receita'],
                $ID,
                $r_nome['nome_remedio'],
                $quant_saida,
                $_POST['sus_saida'],
                ucwords($_POST['nome_paciente_saida']),
                $_POST['n_receita_saida'],
                $_POST['observacao_saida'],
                $_SESSION['nome_usuario'],
                $data,
                $_POST['setor_usuario']
            );

            $Data_Retirada->inserirDataRetirada($ID, $_POST['data_data_retirada'], $_POST['prox_retirada_data_retirada'], $_POST['sus_saida'], ucwords($_POST['nome_paciente_saida']));

            header("Location: ../usuario/saidaMedicamentos.php?baixa=sucesso&&SaidaMedicamentos");

        }
    }

}
    
?>