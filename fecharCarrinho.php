<?php
include "controladores/Controller.php";
include "controladores/Classes.php";

// Verifica se há sessão aberta.
verificarSessao();
$func = new CarrinhoTransferencia;
$Carrinho = $func->chamaCarrinho($_GET['lote']);

// echo '<pre>';
// print_r($Carrinho);
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
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <?php echo sideBar() ?>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-12">

                    <?php if (!empty($Carrinho)) { ?>

                        <div class="card">
                            <div class="card-header">
                                <h4>Fechar Transferência #<?= $Carrinho[0]['lote_carrinho_transferencia'] ?></h4>
                            </div>
                            <div class="card-body">
                                <?php foreach ($Carrinho as $C) { ?>
                                    <div id="linha<?= $C['id_carrinho_transferencia'] ?>" class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <input type="hidden" name="id_carrinho_transferencia" value="<?= $C['id_carrinho_transferencia'] ?>">
                                            <strong>Item:</strong> <?= $C['nome_carrinho_transferencia'] ?>
                                            <strong>Quantidade:</strong> <input type="number" value="<?= $C['quantidade_carrinho_transferencia'] ?>" name="" id="">
                                        </div>
                                        <div>
                                            <strong>De: </strong> <?= $C['nome_estoque_origem'] ?>
                                            <strong>Para:</strong> <?= $C['nome_estoque_destino'] ?>
                                        </div><br><br>
                                        <button id="btn<?= $C['id_carrinho_transferencia'] ?>" onclick="deletaLinha(<?= $C['id_carrinho_transferencia'] ?>)" class="btn btn-warning"><i class='bi bi-trash'></i></button>
                                    </div>
                                <?php } ?>
                                <form action="controladores/TransferirEstoques.php" method="post">
                                    <input type="hidden" name="lote" value="<?= $_GET['lote'] ?>">
                                    <div class="card-body mt-4">
                                        <label for="">Histórico da Transferência: </label>
                                        <textarea name="historico_historico" class="form-control" id=""></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-3">Transferir Lote</button>
                                    <a href="administrarEstoque.php" class="btn btn-warning mt-3">Cancelar</a>
                                </form>
                                
                            </div>
                        </div>

                    <?php } else { ?>
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <p>
                                    <center><strong>
                                            <h3>LOTE ESTÁ VAZIO</h3>
                                        </strong>
                                        <a href="administrarEstoque.php">Retornar</a>
                                    </center>
                                </p>
                            </div>
                        </div>

                    <?php } ?>


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
        function deletaLinha(id) {

            var linha = document.getElementById('linha' + id);
            // var buttonBtn = document.querySelector('button[name="btn"]');
            var buttonBtn = document.getElementById('btn' + id)

            let API = 'controladores/DeletarItemCarrinho.php?id=' + id;
            fetch(API)
                .then(response => {
                    console.log(response)
                    return response.json()
                })
                .then(Dados => {

                    if (Dados.Status == 'OK') {
                        // linha.style.display = 'none'; 

                        buttonBtn.textContent = ""
                        buttonBtn.classList.remove('btn-warning')

                        buttonBtn.textContent = "Excluído"
                        buttonBtn.classList.add('btn-danger')
                        console.log(buttonBtn);
                    }
                    console.log(Dados)
                })

            console.log(id);

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