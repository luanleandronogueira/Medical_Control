<?php 
  include "controladores/Controller.php";
  include "controladores/Classes.php";

  // Verifica se há sessão aberta.
	verificarSessao();

  $func = new Saida;

  $retorno = $func->chamaSaida();
  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';
  
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
    </nav>

  </header>

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
              <h5 class="card-title">Histórico de Distribuição de Medicamentos</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Detalhar</th>
                    <th>Status</th>
                    <th>Data Transferência</th>
                    <th>Item</th>
                    <th>Quantidade</th>
                    <!-- <th>Cartão do SUS</th> -->
                    <th>Nome do Paciente</th>
                    <!-- <th>Observação</th> -->
                    <th>Unidade</th>

                  </tr>
                </thead>
                <tbody>

                 <?php foreach ($retorno as $r) { ?>

                  <tr>
                    <td>
                      <strong>
                        <a href="detalhaSaida.php?id=<?=$r['id_saida']?>"><?=$r['id_saida'] ?></a>
                      </strong>
                    </td>
                    <td><?=$r['status_receita_saida'] ?></td>
                    <td><?= date('d/m/Y H:i:s' , strtotime($r['data_saida'])) ?></td>
                    <td><?=$r['remedio_saida'] ?></td>
                    <td><?=$r['quantidade_saida'] ?></td>
                    <!-- <td><?=$r['sus_saida'] ?></td> -->
                    <td>
                      <strong><?=$r['nome_paciente_saida'] ?></strong>
                    </td>
                    <!-- <td><?=$r['observacao_saida'] ?></td> -->
                    <td><?=$r['nome_estoque']?></td>
                  </tr>

                 <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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