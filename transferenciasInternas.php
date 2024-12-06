<?php

include "controladores/Controller.php";
include "controladores/Classes.php";

// Verifica se há sessão aberta.
verificarSessao();

$func = new Estoque;
$estoques = $func->chamaEstoque();

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
        <h5 class="card-title">Estoques por unidade</h5>
      </center>
    </div>
    </div>

    <section class="section">
      <div class="row">

        <?php foreach ($estoques as $estoque) { ?>

          <div class="col-lg-12 col-md-12">
            <div class="card text-center">
              <div class="card-body">
                <h5 class="card-title"><?= $estoque['nome_estoque'] ?></h5>
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col"><a href="detalhaEstoque.php?id=<?= $estoque['id_estoque'] ?>">Ver Estoque</a></th>
                      <th scope="col">
                        <a href="realizarTransferenciaInterna.php?id=<?= $estoque['id_estoque'] ?>"># Realizar Transferência Interna</a>
                      </th>
                      </div>
                      <th scope="col"><a href="subsetor.php">+ Novo Subsetor</a></th>
                    </tr>

                  </thead>

                </table>

              </div>
            </div>
          </div>
        <?php } ?>



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

</body>

</html>