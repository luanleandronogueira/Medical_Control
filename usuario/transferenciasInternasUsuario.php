<?php
include "../controladores/Controller.php";
include "../controladores/Classes.php";

// Verifica se há sessão aberta.
verificarSessaoUsuario();
$func2 = new Usuario;
$chamaUsuario = $func2->chamaUsuario($_SESSION['id_usuario']);

$func = new RemedioUsuario;
$Remedios = $func->chamaEstoqueUsuario($chamaUsuario['setor_usuario']);

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
                <?php echo PerfilUsuario() ?>
            </ul>
        </nav><!-- End Icons Navigation -->
    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <?php echo sideBarUsuario() ?>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="card">
            <center>
                <h5 class="card-title">Transferência para um Subsetor</h5>
            </center>
        </div>
        <!-- <section class="section">
            <?php echo '<pre>';
            print_r($Remedios);
            echo '</pre>'; ?>

        </section> -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title  text-center">Estoque disponível</h5>

                            <?php if (isset($_GET['insercao']) == 'sucesso') { ?>

                                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Feito com Sucesso!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                            <?php } ?>
                            <!-- <form action="controladores/RevisaTransferencia.php" method="post"> -->
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Remédio</th>
                                        <th>Unidade de Medida</th>
                                        <th>Disponível</th>
                                        <th>Quantidade</th>
                                        <th></th>
                                    </tr>
                                    <?php foreach ($Remedios as $R) { ?>
                                        <tr>
                                            <td>
                                                <!-- Atribui o ID do remédio como valor do checkbox -->
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    name="remedios_selecionados[]"
                                                    value="<?= $R['id_remedio'] ?>">
                                            </td>
                                            <td><?= $R['id_remedio'] ?></td>
                                            <td><?= $R['nome_remedio'] ?></td>
                                            <td><?= $R['uni_medida_remedio'] ?></td>
                                            <td><?= $R['quantidade_remedio'] ?></td>
                                            <td>
                                                <!-- Associa a quantidade ao ID do remédio -->
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    name="quantidade_transferencia_interna[<?= $R['id_remedio'] ?>]"
                                                    id="quantidade_transferencia_interna_<?= $R['id_remedio'] ?>">
                                            </td>
                                            <input type="hidden" name="id_estoque_saida" value="<?= $R['estoque_remedio'] ?>">
                                            <input type="hidden" name="id_remedio" value="<?= $R['id_remedio'] ?>">
                                            <input type="hidden" name="uni_medida" value="<?= $R['uni_medida_remedio'] ?>">
                                            <td><button id="btnColeta" onclick="coletaInfo(this)" class="btn btn-info btn-sm">+ Add</button></td>


                                        </tr>
                                    <?php } ?>
                                </thead>
                            </table>
                            <center>
                                <a href="revisarTransferenciaInternaUsuario.php?id=<?= $R['estoque_remedio'] ?>" class="btn btn-success">Revisar</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
            function coletaInfo(button) {

            // Localiza a linha do botão clicado
            const row = button.closest('tr');

            // Captura o ID do remédio do checkbox
            const idRemedio = row.querySelector('input[type="checkbox"]').value;

            // Captura a quantidade informada no campo numérico
            const quantidadeInput = row.querySelector('input[type="number"]');
            const quantidade = quantidadeInput ? quantidadeInput.value : 0;

            // Captura o valor do campo hidden (id_estoque_saida)
            const idEstoqueSaida = row.querySelector('input[name="id_estoque_saida"]').value;
            const uniMedida = row.querySelector('input[name="uni_medida"]').value;
            const id_remedio = row.querySelector('input[name="id_remedio"]').value;

            const btn = row.querySelector('button[id="btnColeta"]');

            const API = `../controladores/InsereRevisao.php?id_estoque=${idEstoqueSaida}&&quantidade=${quantidade}&&id_remedio=${idRemedio}&&uni_medida=${uniMedida}&&id_remedio=${id_remedio}`;

            if (quantidade <= 0) {

                alert('Insira a quantidade')

            } else {

                btn.disabled = false
                btn.classList.remove('btn-info')
                btn.classList.add('btn-success')
                btn.textContent = ''
                btn.textContent = "Ok"

                // Exibe os valores para teste (ou processa conforme sua lógica)
                console.log(`ID do Remédio: ${idRemedio}`);
                console.log(`Quantidade: ${quantidade}`);
                console.log(`ID Estoque Saída: ${idEstoqueSaida}`);
                console.log(`Unidade Medida: ${uniMedida}`);
                console.log(`id_remedio: ${id_remedio}`)

                fetch(API)
                    .then(response => {
                        console.log('Response', response)
                        return response.json()

                    }).then(Dados => {
                        console.log('Dados', Dados)
                        if (Dados.message == 'Sucesso') {
                            btn.disabled = true
                        }

                    }).catch(error => {
                        console.log(error)
                    })
            }
        }
    </script>
</body>

</html>