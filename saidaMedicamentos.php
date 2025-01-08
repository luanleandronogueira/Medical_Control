<?php
include "controladores/Controller.php";
include "controladores/Classes.php";
// Verifica se há sessão aberta.
verificarSessao();
$func2 = new Usuario;
$chamaUsuario = $func2->chamaUsuario($_SESSION['id_usuario']);
$func = new Remedio;
$remedio = $func->chamaEstoqueUsuario($chamaUsuario['setor_usuario']);

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
        </nav><!-- End Icons Navigation -->
    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <?php echo sideBar() ?>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="card">
                    <center>
                        <h5 class="card-title">Dar Saída em Medicamentos</h5>
                    </center>
                    <div class="card-body">
                        <?php if (isset($_GET['valor']) == 'excedido') { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                Você não tem essa quantidade no estoque!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['erro']) == 'ForaPrazo') { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                O paciente <strong><?= $_GET['paciente'] ?></strong> só poderá receber o medicamento no próximo dia <strong><?= $_GET['dataPrazo'] ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['baixa']) == 'sucesso') { ?>
                            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                Feito com Sucesso!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>
                        <form action="controladores/SaidaInterna.php" method="post">
                            <center>
                                <input class="form-check-input" name="sem_receita" value="Sem Receita" type="checkbox">
                                <label class="form-check-label">Distribuição <strong>Sem</strong> Receita</label>
                            </center><br>
                            <div class="row">
                                <div class="col-lg-6 col-xxl-6 col-xl-6">
                                    <label for="nome_paciente_saida">Nome Paciente:</label>
                                    <input type="text" class="form-control" name="nome_paciente_saida" id="nome_paciente_saida">
                                </div>
                                <div class="col-lg-6 col-xxl-6 col-xl-6">
                                    <label for="sus_saida">Cartão do SUS:</label>
                                    <input type="text" class="form-control" name="sus_saida" id="sus_saida">
                                </div>
                                <div class="col-lg-3 col-xxl-3 col-xl-3">
                                    <label for="data_data_retirada">Data de Distribuição:</label>
                                    <input type="date" class="form-control" required name="data_data_retirada" id="DataAtual">
                                </div>
                                <div class="col-lg-3 col-xxl-3 col-xl-3">
                                    <label for="prox_retirada_data_retirada">Data de Abastecimento:</label>
                                    <input type="date" class="form-control" required name="prox_retirada_data_retirada" id="prox_retirada_data_retirada">
                                </div>
                                <div class="col-lg-6 col-xxl-6 col-xl-6">
                                    <label for="n_receita_saida">Nº da Receita:</label>
                                    <input type="text" class="form-control" name="n_receita_saida" id="n_receita_saida">
                                </div>
                            </div>
                            <hr>
                            <div class="row">

                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <h5 class="card-title">Estoque Disponível</h5>
                                        </center>
                                        <table class="table table-sm datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Remédio</th>
                                                    <th>Unidade de Medida</th>
                                                    <th>Disponível</th>
                                                    <th>Quantidade</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($remedio as $R) { ?>
                                                    <tr>
                                                        <td><?= $R['id_remedio'] ?></td>
                                                        <td><?= $R['nome_remedio'] ?></td>
                                                        <td><?= $R['uni_medida_remedio'] ?></td>
                                                        <td><?= $R['quantidade_remedio'] ?></td>
                                                        <td>
                                                            <!-- Associa a quantidade ao ID do remédio -->
                                                            <input type="number" class="form-control" name="quantidade_transferencia_interna[<?= $R['id_remedio'] ?>]" id="quantidade_transferencia_interna_<?= $R['id_remedio'] ?>">
                                                        </td>
                                                        <td></td>
                                                        <input type="hidden" name="id_estoque_saida" value="<?= $R['estoque_remedio'] ?>">
                                                        

                                                    </tr>
                                                <?php } ?>
                                            
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <label for="observacao_saida">Observações:</label>
                                <textarea class="form-control" name="observacao_saida" id="observacao_saida"></textarea>
                                <input type="hidden" name="setor_usuario" value="<?= $chamaUsuario['setor_usuario'] ?>">
                                <button type="submit" class="btn btn-success mt-3">Dar Saída</button>
                            </div>
                        </form>
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

    <script>
        const API = 'http://worldtimeapi.org/api/timezone/America/Recife';

        const DataAtual = document.getElementById('DataAtual');

        fetch(API)
            .then(Response => {
                // console.log('Response', Response);
                return Response.json();
            })
            .then(dados => {
                console.log('dados', dados);
                // Agora você define o valor do campo DataAtual
                DataAtual.value = dados.datetime.slice(0, 10);
                // console.log(DataAtual);
            })
            .catch(error => {
                console.log(error);
            });
    </script>
</body>

</html>