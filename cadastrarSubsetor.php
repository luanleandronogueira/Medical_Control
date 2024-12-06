<?php
include "controladores/Controller.php";
include "controladores/Classes.php";

// Verifica se há sessão aberta.
verificarSessao();

$func = new Subsetor;
$funcEstoque = new Estoque;

$subsetores = $func->chamaSubsetorEspecifico($_GET['id']);
$nomeEstoque = $funcEstoque->chamaEstoqueEspecifico($_GET['id']);

//   echo '<pre>';
// print_r($subsetores);
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
        <div class="card">
            <center>
                <h5 class="card-title">Setor <?= $nomeEstoque['nome_estoque'] ?></h5>
            </center>
        </div>

        <?php if (isset($_GET['insercao']) == 'sucesso') { ?>

            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                Feito com Sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php } ?>

        <div class="card">
            <div class="card-body">
                <form action="controladores/CadastrarSubsetor.php" method="post">
                    <div class="m-3">
                        <label for="nome_subsetor">Nome do Subsetor</label>
                        <input type="text" class="form-control" name="nome_subsetor" id="nome_subsetor">
                        </br>
                        <input type="hidden" name="estoque_subsetor" value="<?= $nomeEstoque['id_estoque'] ?>">
                        <button class="btn btn-success" type="submit">Cadastrar</button>
                    </div>

                    <hr>

                </form>

                <div class="m-3">

                <h5 for="nome_subsetor">Subsetores Cadastrados</h5></br>
                    <?php foreach($subsetores as $sub) {?>
                            
                        <span><?=$sub['nome_subsetor']?></span>
                        <hr>

                    <?php } ?>
                </div>


            </div>
        </div>







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

</body>

</html>