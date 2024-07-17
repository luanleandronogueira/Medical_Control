<?php
//Permite o include de arquivos que não podem ser abertos no navegador
define('__INCLUDED_BY_OTHER_FILE__', true);

include '../controladores/Classes.php';

// Verifica se há sessão aberta.
verificarSessaoUsuario();

// instancia classes que serão usados
$func = new Remedio;
$func2 = new Saida;
$Data_Retirada = new Data_Retirada;
$data = $_POST['data_data_retirada'];

// echo '<pre>';
// var_dump($_POST);
// echo '</pre></br>';

// echo '<pre>';
// print_r($Ultima_Retirada);
// echo '</pre></br>';

// if ($data_data_retirada > $prox_retirada_data_retirada) {

//     echo 'A data que pegou e maior';
// } else {

//     echo 'a proxima data e maior';
// }

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

if (!empty($_POST)) {

    // separa as strings do post que trazem o id e nome
    $selecao_medicao = $_POST['nome_saida'];
    list($id_remedio, $nome_remedio) = explode('-', $selecao_medicao);

    // chama o método para trazer os remédios do setor
    $remedio = $func->chamaRemedioNomeEstoque($id_remedio, $nome_remedio, $_POST['setor_usuario']);

    // faz o abate do banco de dados referente a saída
    if ($remedio['quantidade_remedio'] < $_POST['quantidade_saida'] or  $remedio['quantidade_remedio'] == 0) {

        header("Location: ../usuario/saidaMedicamentos.php?valor=excedido&&SaidaMedicamentos");
        die();

    } else {

        $Ultima_Retirada = $Data_Retirada->consultaDataRetirada($id_remedio, $_POST['sus_saida']);

        if (!empty($Ultima_Retirada)) {

            $data_data_retirada = new DateTime($_POST['data_data_retirada']);
            $prox_retirada_data_retirada = new DateTime($Ultima_Retirada['prox_retirada_data_retirada']);

            // echo '<pre>';
            //     print_r($Ultima_Retirada);
            // echo '</pre></br>';

            if ($data_data_retirada >= $prox_retirada_data_retirada) {

                // Faz o abate dos valores do banco de dados com o valor de saída
                $abateParaSaida = $remedio['quantidade_remedio'] - $_POST['quantidade_saida'];

                if (empty($_POST['sem_receita'])) {

                    $_POST['sem_receita'] = 'Com Receita';
                }

                // Aqui método que atualiza a saída no banco de dados
                $func->atualizaRemedioEstoque($id_remedio, $abateParaSaida);

                //Salvar a saída no banco de dados
                $func2->inserirSaida(
                    $_POST['sem_receita'],
                    $id_remedio,
                    $nome_remedio,
                    $_POST['quantidade_saida'],
                    $_POST['sus_saida'],
                    ucwords($_POST['nome_paciente_saida']),
                    $_POST['n_receita_saida'],
                    $_POST['observacao_saida'],
                    $_SESSION['nome_usuario'],
                    $data,
                    $_POST['setor_usuario']
                );

                $Data_Retirada->inserirDataRetirada($id_remedio, $_POST['data_data_retirada'], $_POST['prox_retirada_data_retirada'], $_POST['sus_saida'], ucwords($_POST['nome_paciente_saida']));


                header("Location: ../usuario/saidaMedicamentos.php?baixa=sucesso&&SaidaMedicamentos");

            } else {

                header("Location: ../usuario/saidaMedicamentos.php?erro=ForaPrazo&&paciente=". $Ultima_Retirada['nome_data_retirada'] . "&&dataPrazo=" . $Ultima_Retirada['prox_retirada_data_retirada']);

            }
        } else {

            // Faz o abate dos valores do banco de dados com o valor de saída
            $abateParaSaida = $remedio['quantidade_remedio'] - $_POST['quantidade_saida'];

            if (empty($_POST['sem_receita'])) {

                $_POST['sem_receita'] = 'Com Receita';
            }

            // Aqui método que atualiza a saída no banco de dados
            $func->atualizaRemedioEstoque($id_remedio, $abateParaSaida);

            //Salvar a saída no banco de dados
            $func2->inserirSaida(
                $_POST['sem_receita'],
                $id_remedio,
                $nome_remedio,
                $_POST['quantidade_saida'],
                $_POST['sus_saida'],
                ucwords($_POST['nome_paciente_saida']),
                $_POST['n_receita_saida'],
                $_POST['observacao_saida'],
                $_SESSION['nome_usuario'],
                $data,
                $_POST['setor_usuario']
            );

            $Data_Retirada->inserirDataRetirada($id_remedio, $_POST['data_data_retirada'], $_POST['prox_retirada_data_retirada'], $_POST['sus_saida'], ucwords($_POST['nome_paciente_saida']));

            header("Location: ../usuario/saidaMedicamentos.php?baixa=sucesso&&SaidaMedicamentos");

        }
    }
} else {

    header("Location: ../index.php?acesso=negado&&SaidaMedicamentos");
    die();
}
