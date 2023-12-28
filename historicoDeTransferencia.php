<?php 
  include "controladores/Controller.php";
  include "controladores/Classes.php";

  // Verifica se há sessão aberta.
	verificarSessao();

    $func = new Historico;
    $retorno = $func->chamaHistorico();  

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php head()?>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <?php logoBar()?>

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

    <?php echo sideBar()?>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <section class="section">
      <div class="row">
        <!-- <?php echo '<pre>'; print_r($retorno); echo '</pre>';?> -->
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Histórico de Transferências</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Histórico</th>
                    <th>Data Transferência</th>
                    <th>Gestor</th>
                    <th>Item</th>
                    <th>Quantidade</th>
                    <th>Enviado</th>
                    <th>Recebido</th>
                    <th></th>

                  </tr>
                </thead>
                <tbody>

                <!-- <?php foreach ($retorno as $r) { ?> -->

                  <tr>
                    <td><?=$r['id_historico'] ?></td>
                    <td><?=$r['historico_historico'] ?></td>
                    <td><?=$r['data_historico'] ?></td>
                    <td><?=$r['sessao_historico'] ?></td>
                    <td><?=$r['item_tras_historico'] ?></td>
                    <td><?=$r['quantidade_historico'] ?></td>
                    <td><?=$r['nome_enviado'] ?></td>
                    <td><?=$r['nome_recebido'] ?></td>
                    <td></td>
                  </tr>

                 <!-- <?php } ?>  -->
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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