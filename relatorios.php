<?php
include "controladores/Controller.php";
include "controladores/Classes.php";

// Verifica se há sessão aberta.
verificarSessao();

$func = new Estoque;
$chamaEstoque = $func->chamaEstoque();


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
          <div class="card-body">
            <h5 class="card-title">Gerar Relatório de Saída Interna:</h5>
            <form action="controladores/RelatorioDeSaidaInterna.php" method="post">
              <div class="col-lg-5">
                Data Inicial:<input class="form-control" type="date" name="data_inicial" id="data_inicial">
                Data Final:<input class="form-control" type="date" name="data_final" id="data_final">
              </div>
              </br>
              <button class="btn btn-warning" name="rel_saida" type="submit">Gerar Relatório em PDF</button>
            </form>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gerar Relatório de Entrada:</h5>
            <form action="controladores/Relatorios.php" method="post">
              <div class="col-lg-5">
                Data Inicial:<input class="form-control" type="date" name="data_inicial" id="">
                Data Final:<input class="form-control" type="date" name="data_final" id="">
              </div>
              </br>
              <button class="btn btn-warning" name="rel_entrada" type="submit">Gerar Relatório em PDF</button>
            </form>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gerar Relatório de Saída Externa:</h5>
            <form action="controladores/RelatorioDeSaida.php" method="post">
              <div class="col-lg-5">
                <label>Selecione a Unidade:</label>
                <select required class="form-control" name="id_estoque" id="">
                  <?php foreach ($chamaEstoque as $Estoque) { ?>
                    <option value="<?= $Estoque['id_estoque'] ?>"><?= $Estoque['nome_estoque'] ?></option>
                  <?php } ?>
                </select>
                Data Inicial:<input class="form-control" type="date" name="data_inicial" id="">
                Data Final:<input class="form-control" type="date" name="data_final" id="">
              </div>
              </br>
              <button class="btn btn-warning" name="rel_saida" type="submit">Gerar Relatório em PDF</button>
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

</body>

</html>