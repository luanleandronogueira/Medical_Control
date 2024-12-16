<?php
include "../controladores/Controller.php";
include "../controladores/Classes.php";

// Verifica se há sessão aberta.
verificarSessaoUsuario();

$func = new TransferenciaInterna;
$func2 = new Subsetor;
$data = date('Y-m-d');
$revisao = $func->chamaTransferenciaInternaAberta($_GET['id'], $data);
$subsetor = $func2->chamaSetor();

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
                <?php echo PerfilUsuario()  ?>
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
                <h5 class="card-title">Transferências em Aberto</h5>
            </center>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="p-3">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Remédio</th>
                                <th>Unidade de Medida</th>
                                <th>Usuário</th>
                                <th>Revisar Quantidade</th>
                                <th>Setor de Envio</th>
                                <th></th>
                            </tr>
                            <?php foreach ($revisao as $R) { ?>
                                <tr>
                                    <td><?= $R['data_transferencia_interna'] ?></td>
                                    <td><?= $R['remedio_transferencia_interna'] ?></td>
                                    <td><?= $R['uni_transferencia_interna'] ?></td>
                                    <td><?= $R['usuario_transferencia_interna'] ?></td>
                                    <td>
                                        <!-- Associa a quantidade ao ID do remédio -->
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="quantidade_transferencia_interna[]"
                                            id="quantidade_transferencia_interna_"
                                            value="<?= $R['quant_transferencia_interna'] ?>">

                                    </td>
                                    <td>

                                    </td>
                                    <input type="hidden" name="id" value="<?= $R['id_transferencia_interna'] ?>">

                                    <td><button id="btnColeta" onclick="deletaInfo(this)" class="btn btn-warning btn-sm">Excluir</button></td>

                                </tr>
                            <?php } ?>
                        </thead>
                    </table>
                </div>

                <form action="../controladores/TransferirRevisaoUsuario.php" method="post">
                    <div>
                        <center>
                            <h6 class="card-title" for="">Selecione o setor e subsetor</h6>
                        </center>
                        <select name="subsetor_transferencia" class="form-control" id="subsetor_transferencia">
                            <?php foreach ($subsetor as $s) { ?>
                                <option value="<?= $s['id_subsetor'] . '-' . $s['nome_subsetor'] ?>"><?= $s['nome_estoque'] . ' - ' . $s['nome_subsetor'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="data_transferencia" value="<?= $data ?>">
                        <input type="hidden" name="id_estoque" value="<?= $_GET['id'] ?>">
                        </br>
                        <center><button type="submit" class="btn btn-success">Transferir para Subsetor</button></center>
                    </div>
                </form>
                <hr>
                <center>
                    <h4><a href=''>Ver Transferências Não Realizadas</a></h4>
                </center>
            </div>
        </div>
    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span></span></strong>
        </div>
    </footer><!-- End Footer -->

    <script>
        function deletaInfo(button) {

            // Localiza a linha do botão clicado
            const row = button.closest('tr');
            const id = row.querySelector('input[name="id"]').value;
            const btn = row.querySelector('button[id="btnColeta"]');
            const API = `../controladores/DeletaRevisao.php?id=${id}`;

            if (id) {
                btn.disabled = false
                btn.classList.remove('btn-warning')
                btn.classList.add('btn-danger')
                btn.textContent = ''
                btn.textContent = "Excluido"
                // Exibe os valores para teste (ou processa conforme sua lógica)
                console.log(`ID do Remédio: ${id}`);
                fetch(API)
                    .then(response => {
                        console.log('Response', response)
                        return response.json()
                    }).then(Dados => {
                        console.log('Dados', Dados)
                        if (Dados.message == 'Sucesso') {
                            row.classList.add('d-none')
                        }
                    }).catch(error => {
                        console.log(error)
                    })
            } else {
                alert('Não foi possível excluir, tente mais tarde!')
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