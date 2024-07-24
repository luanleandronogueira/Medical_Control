<?php
include "controladores/Controller.php";
include "controladores/Classes.php";

// Verifica se há sessão aberta.
verificarSessao();

$func = new Remedio;
$chamaRemedio = $func->chamaRemedioPorEstoque($_GET['id']);

$func2 = new Estoque;
$chamaEstoque = $func2->chamaEstoque();

$func3 = new CarrinhoTransferencia;

$lote = date('Hms');

$loteAberto = $func3->verificaLoteAberto();

// echo '<pre>';
//     print_r($loteAberto);
// echo '</pre>';

if ($loteAberto) {

    foreach ($loteAberto as $l) {
        $func3->fechaLote($l['numero_lote']);
    }
} else {

    $func3->criaLote($lote, 'A');
}

$nomeEstoque = $_GET['nome'];

// echo '<pre>';
// print_r($chamaRemedio);
// echo '</pre>';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php head() ?>
</head>


<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <?php logoBar() ?>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>


                <!-- Perfil -->
                <?php echo Perfil() ?>

            </ul>
        </nav>

    </header>

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <?php echo sideBar() ?>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <section class="section">
            <div class="row">

                <div class="col-lg-12 col-md-12">

                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Transferências Entre Estoques (<?php echo $nomeEstoque ?>)</h5>

                                <h4 class="card-title">Para:
                                    <select name="estoque" id="estoque">
                                        <?php foreach ($chamaEstoque as $E) { ?>
                                            <option value="<?= $E['id_estoque'] ?>"><?= $E['nome_estoque'] ?></option>
                                        <?php } ?>
                                    </select>
                                </h4>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>#Id</th>
                                            <th>Remédio</th>
                                            <th>Estoque</th>
                                            <th>Unidade de Medida</th>
                                            <th>Quantidade p/ Transferência</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($chamaRemedio as $remedio) { ?>
                                            <tr>
                                                <td><?= $remedio['id_remedio'] ?></td>
                                                <td><?= $remedio['nome_remedio'] ?></td>
                                                <td class="quantRemedio"><?= $remedio['quantidade_remedio'] ?></td>
                                                <td class="uni_medida_remedio"><?= $remedio['uni_medida_remedio'] ?></td>
                                                <td><input name="valor" class="form-control" type="number"></td>
                                                <td style="display:none;"><input type="hidden" name="id_remedio" value="<?= $remedio['id_remedio'] ?>"></td>
                                                <td style="display:none;"><input type="hidden" name="nome_remedio" value="<?= $remedio['nome_remedio'] ?>"></td>
                                                <td style="display:none;"><input type="hidden" name="quant_min_estoque_remedio" value="<?= $remedio['quant_min_estoque_remedio'] ?>"></td>
                                                <td style="display:none;"><input type="hidden" name="estoque_enviando" value="<?= $_GET['id'] ?>"></td>
                                                <td style="display:none;"><input type="hidden" name="data_" value="<?= date('Y-m-d') ?>"></td>
                                                <td style="display:none;"><input type="hidden" name="lote" value="<?= $lote ?>"></td>
                                                <td><button onclick="addCarrinho(event)" name="butn" class="btn btn-warning ">+</button></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>



                                </table>
                                <button type="submit" class="btn btn-success">Transferir</button>

                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span></span></strong>
        </div>
        <div class="credits">

        </div>
    </footer><!-- End Footer -->

    <script>
        function addCarrinho(event) {
            event.preventDefault();

            // Obtém a linha da tabela que contém o botão clicado
            const linha = event.target.closest('tr');
            var API = 'controladores/InserirCarrinho.php'

            // Verifica se a linha foi encontrada
            if (!linha) {
                console.error('Linha não encontrada');
                return;
            }

            try {
                // Tenta obter os elementos de input dentro da linha
                const idRemedioInput = linha.querySelector('input[name="id_remedio"]');
                const nomeRemedioInput = linha.querySelector('input[name="nome_remedio"]');
                const quantMinEstoqueInput = linha.querySelector('input[name="quant_min_estoque_remedio"]');
                const estoqueEnviandoInput = linha.querySelector('input[name="estoque_enviando"]');
                const loteInput = linha.querySelector('input[name="lote"]');
                const valorInput = linha.querySelector('input[name="valor"]');
                const dataInput = linha.querySelector('input[name="data_"]');
                const btnButton = linha.querySelector('button[name="butn"]');
                const estoqueRecebicoInput = document.getElementById('estoque');

                // Verifica se os inputs foram encontrados e obtém os valores
                const id_remedio = idRemedioInput ? idRemedioInput.value : 'Não encontrado';
                const nome_remedio = nomeRemedioInput ? nomeRemedioInput.value : 'Não encontrado';
                const quant_min_estoque_remedio = quantMinEstoqueInput ? quantMinEstoqueInput.value : 'Não encontrado';
                const estoque_enviando = estoqueEnviandoInput ? estoqueEnviandoInput.value : 'Não encontrado';
                const lote = loteInput ? loteInput.value : 'Não encontrado';
                const estoque_recebido = estoqueRecebicoInput ? estoqueRecebicoInput.value : 'Não encontrado';
                const quantidade_carrinho_transferencia = valorInput ? valorInput.value : 'Não encontrado';
                const data = dataInput ? dataInput.value : 'Não encontrado';
                const btn = btnButton ? btnButton : 'Não encontrado';

                // Exibe os valores no console
                // console.log('ID Remédio:', id_remedio);
                // console.log('Nome Remédio:', nome_remedio);
                // console.log('Quantidade Mínima Estoque Remédio:', quant_min_estoque_remedio);
                // console.log('Estoque Enviando:', estoque_enviando);
                // console.log('Estoque Recebido:', estoque_recebido);
                // console.log('Data', data);
                // console.log('Lote:', lote);
                // console.log('Btn:', btn);
                // console.log('Quantidade Carrinho Transferência:', quantidade_carrinho_transferencia);

                btn.classList.remove('btn-warning')
                btn.classList.add('btn-success')
                btn.textContent = ''
                btn.textContent = "Add"

                const dados = {

                    id_remedio: id_remedio,
                    nome_remedio: nome_remedio,
                    quantidade_carrinho_transferencia: quantidade_carrinho_transferencia,
                    estoque_enviando: estoque_enviando,
                    estoque_recebido: estoque_recebido,
                    data: data,
                    lote: lote,
                    status: 'A',
                    enviado: 'S'
                }

                console.log(dados)
                fetch(API, {

                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }, 
                    body:JSON.stringify(dados)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Sucesso', data)
                })
                .catch((error) => {
                    console.error('Erro:', error);
                })

            } catch (error) {
                console.error('Erro ao obter os valores:', error);
            }
        }
    </script>



    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>