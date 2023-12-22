<?php 
  include "controladores/Controller.php";
  include "controladores/Classes.php";

  $id_estoque = $_GET['id'];

  $func = new Remedio;
  $remedio = $func->chamaRemedioPorEstoque($id_estoque);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php head()?>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span class="d-none d-lg-block">Medical Control</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

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
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Estoque da Unidade:</h5>

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
                        <?php if($r['quantidade_remedio'] == 0 ) {?>
                            <span type='button' class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#disablebackdrop<?= $r['id_remedio'] ?>">
                                <?php echo $r['quantidade_remedio'] ?>
                            </span>
                        <?php } else { ?>
                            <span type='button' class="badge bg-success" data-bs-toggle="modal" data-bs-target="#disablebackdrop<?= $r['id_remedio'] ?>">
                                <?php echo $r['quantidade_remedio'] ?></a>
                            </span>
                        <?php } ?>
    
                            <div class="modal fade" id="disablebackdrop<?= $r['id_remedio'] ?>" tabindex="-1" data-bs-backdrop="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Adicionar Quantidade no Estoque:</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="controladores/atualizaItemEstoque.php" method="post">
                                                <?php echo $r['nome_remedio'] ?>:
                                                <input type="number" name="" id=""> 
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="button" class="btn btn-primary">Adicionar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td><?= $r['vencimento_remedio'] ?></td>
                  </tr>
                  
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        <!-- <?php echo '<pre>'; print_r($remedio); '</pre>'; ?> -->



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