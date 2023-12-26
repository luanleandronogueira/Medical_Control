<?php 
  include "controladores/Controller.php";
  include "controladores/Classes.php";

  // Verifica se há sessão aberta.
	verificarSessao();

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
              <h5 class="card-title">Cadastrar Novo Usuário</h5>

              <!-- Vertical Form -->
              <form class="row g-3">
                <div class="col-12">
                  <label class="form-label">Nome do Usuário</label>
                  <input type="text" class="form-control" name="nome_usuario">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">CPF</label>
                  <input type="text" maxlength="14" class="form-control" name="cpf_usuario">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Senha do Usuário</label>
                  <input type="password" class="form-control" name="senha_usuario">
                </div>
                <div class="col-12">
                    <label class="form-label">Tipo de Usuário</label>
                      <div class="col-md-12 col-lg-12">
                        <select class="form-control" name="tipo_usuario" id="">
                          <option value="a">Administrador</option>
                          <option value="u">Usuário</option>
                        </select>
                      </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                  <button type="reset" class="btn btn-secondary">Resetar</button>
                </div>
              </form><!-- Vertical Form -->

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