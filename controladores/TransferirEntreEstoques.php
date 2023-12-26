<?php 

    include 'Classes.php';

    // instancia a classe Remedio
    $func = new Remedio;

    // chama os remedio da unidade
    $chamaUnidadeRemedio = $func->chamaUnidadeRemedio($_POST['id_remedio']);

    // Faz o abatimento antes de atualizar no banco de dados a saida dos itens
    $AbateRemedio = $chamaUnidadeRemedio['quantidade_remedio'] - $_POST['quantidade_remedio'];

    // atualiza a saída do estoque atual
    $AtualizaRemedio = $func->atualizaRemedioEstoque($_POST['id_remedio'], $AbateRemedio);

    // Traz os dados do Estoque que está recebendo a atualização
    $chamaNomeRemedio = $func->chamaRemedioPorNome($_POST['estoque'], $_POST['nome_remedio']);


    if($chamaNomeRemedio == ""){

        // se no estoque ainda não tiver esse remedio, inserir um novo
        $inserirRemedio = $func->inserirRemedio($_POST['nome_remedio'],              
                                                $chamaUnidadeRemedio['uni_medida_remedio'], 
                                                $_POST['quantidade_remedio'], 
                                                $chamaUnidadeRemedio['vencimento_remedio'], 
                                                $_POST['estoque']);

        header("Location: ../detalhaEstoque.php?id=".$_POST['estoque']."&&insercao=sucesso");

    } else {

        // se já tiver, primeiro faz a soma dos itens já trazidos
        $somaAtualizada = $chamaNomeRemedio['quantidade_remedio'] + $_POST['quantidade_remedio'];

        // agora atualiza usando a função.
        $atualizandoValorRemedio = $func->atualizaRemedioEstoque($chamaNomeRemedio['id_remedio'], $somaAtualizada);

       header("Location: ../detalhaEstoque.php?id=".$_POST['estoque']."&&insercao=sucesso"); 


    }

