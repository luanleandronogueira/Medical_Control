<?php 

  include "controladores/Controller.php";
  include "controladores/Classes.php";

  $func = new Estoque;
  $estoques = $func->chamaEstoque();
  
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
    </nav>

  </header>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <?php echo sideBar()?>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
         <div class="card">
            <center><h5 class="card-title">Estoques por unidade</h5></center>
          </div>
        </div>
  
        <section class="section">
          <div class="row">

                <?php foreach($estoques as $estoque) { ?>

                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title"><?= $estoque['nome_estoque'] ?></h5>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col"><a href="detalhaEstoque.php?id=<?=$estoque['id_estoque'] ?>">Ver Estoque</a></th>
                                <th scope="col"><a href="transferenciasEntreEstoques.php?id=<?=$estoque['id_estoque'] ?>"># Transferir Itens deste Estoque</a></th>
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