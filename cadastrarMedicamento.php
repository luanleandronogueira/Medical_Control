<?php 
  include "controladores/Controller.php";
  include "controladores/Classes.php";

  $func = new Nomeclatura;
  $funcEstoque = new Estoque;

  $nomeclatura = $func->chamaNomeclatura();
  $nomeEstoque = $funcEstoque->chamaEstoque();

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

          <?php if(isset($_GET['cadastrar']) == 'sucesso') { ?>

          <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <i class="bi bi-check-circle me-1"></i>
                Inserido com Sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          <?php }?>

            <h5 class="card-title">Cadastrar Medicamento</h5>

            <form action="controladores/InserirMedicamento.php" method="$_REQUEST">

              <label class="form-label" for="">Nome do Medicamento:</label>
              <select name="nomeclatura" class="form-control" id="">

                <?php foreach($nomeclatura as $nome) { ?>

                  <option value="<?= $nome['nome_nomeclatura'] ?>"><?= $nome['nome_nomeclatura'] ?></option>

                <?php } ?>

              </select>

                </br>

              <label class="form-label">Unidade de Medida:</label>
              <input type="text" name="uni_medida_remedio" maxlength="220" required class="form-control">

              </br>

              <label class="form-label">Quantidade:</label>
              <input type="number" name="quantidade_remedio" maxlength="220" required class="form-control">

              </br>

              <label class="form-label">Data de Vencimento:</label>
              <input type="date" name="vencimento_remedio" required class="form-control">

              </br>

              <label class="form-label" for="">Inserir no Estoque:</label>
              <select name="estoque_remedio" class="form-control" id="">

                <?php foreach($nomeEstoque as $estoque) { ?>

                  <option value="<?= $estoque['id_estoque'] ?>" ><?= $estoque['nome_estoque'] ?></option>

                <?php } ?>

              </select>

                </br>

              <button type="submit" class="btn btn-success" >Cadastrar</button>

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