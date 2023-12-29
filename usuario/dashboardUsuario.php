<?php 
  include "../controladores/Controller.php";
  include "../controladores/Classes.php";

  // Verifica se há sessão aberta.
	verificarSessaoUsuario();

  $func2 = new Usuario;

  $chamaUsuario = $func2->chamaUsuario($_SESSION['id_usuario']);


  $func = new RemedioUsuario;
  $remedio = $func->chamaEstoqueUsuario($chamaUsuario['setor_usuario']);



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
        <?php echo PerfilUsuario() ?>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <?php echo sideBarUsuario()?>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <section class="section">
      <div class="row">

       <div class="card">
            <center><h5 class="card-title">Bem Vindo, <?= $_SESSION['nome_usuario']?></h5></center>
          </div>
      <h5 class="card-title"># <?php echo $chamaUsuario['setor_usuario']?> Unidade em Estoque :</h5>

              <table class="table datatable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Unidade de Medida</th>
                    <th>Quantidade</th>
                    <th>Data de Vencimento</th>
                  </tr>
                </thead>
                <tbody>
                   <?php foreach($remedio as $r) { ?>

                  <tr>
                    <td><?= $r['id_remedio']; ?></td>
                    <td><?= $r['nome_remedio']; ?></td>
                    <td><?= $r['uni_medida_remedio'] ?></td>
                    <td>
                        <?php if($r['quantidade_remedio'] <= 0 ) {?>
                            <span class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#disablebackdrop<?= $r['id_remedio'] ?>">
                                <?php echo $r['quantidade_remedio'] ?>
                            </span>
                        <?php } else { ?>
                            <span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#disablebackdrop<?= $r['id_remedio'] ?>">
                                <?php echo $r['quantidade_remedio'] ?></a>
                            </span>
                        <?php } ?>
  
                      </td>

                        <td><?= $r['vencimento_remedio'] ?></td>
                  </tr>
                  
                  <?php } ?> 
                </tbody>
              </table>


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