<?php

include "controladores/Controller.php";
include "controladores/Classes.php";

// Verifica se há sessão aberta.
verificarSessao();

$func = new Estoque;
$estoques = $func->chamaEstoque();

// echo '<pre>';
// print_r($estoques);
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
        <div class="card">
            <center>
                <h5 class="card-title">Cadastrar um Subsetor</h5>
            </center>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title  text-center">Setores</h5>
                            <table class="table table-sm">
                                <thead>
                                <?php foreach($estoques as $estoque) {?>
                                    <tr>                                  
                                        <th scope="col"><a href="cadastrarSubsetor.php?id=<?= $estoque['id_estoque'] ?>">(+ cadastrar subsetor)</a> -  
                                     <?=$estoque['nome_estoque'] ?></th>                                   
                                    </tr>
                                    <?php } ?>
                                </thead>

                            </table>
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

</body>

</html>