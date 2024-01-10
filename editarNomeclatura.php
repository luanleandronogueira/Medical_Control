<?php 
  include "controladores/Controller.php";
  include "controladores/Classes.php";

  // Verifica se há sessão aberta.
	verificarSessao();

if(!empty($_GET)){

    $id = $_GET['id'];
    $func = new Nomeclatura;

    $chamaNomeclaturaEspecifica = $func->chamaNomeclaturaEspecifica($id);

} else {

    header("Location: index.php");
    die();

}

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
       
      <div class="card">
            <div class="card-body">
                <h5 class="card-title">Atualizar Item</h5>


                <form class="row g-3" action="controladores/EditarNomeclatura.php" method="post">

                    <!-- <div class="col-12"> -->
                        <label class="form-label">Nome do Item:</label>
                        <input type="text" name="nome_nomeclatura" value="<?=$chamaNomeclaturaEspecifica['nome_nomeclatura'] ?>" maxlength="220" required class="form-control">

                        <label class="form-label">Unidade de Medida:</label>
                        <input type="text" value="<?=$chamaNomeclaturaEspecifica['uni_medida_nomeclatura'] ?>" name="uni_medida_nomeclatura" maxlength="220" required class="form-control">
                        <input type="hidden" name="id_nomeclatura" value="<?=$chamaNomeclaturaEspecifica['id_nomeclatura'] ?>">
                    <!-- </div> -->
        
                    <!-- <div class="text-center"> -->
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    <!-- </div> -->

                </form>

                </br> 



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