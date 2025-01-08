<?php

  include "controladores/Controller.php";
  include "controladores/Classes.php";

  // Verifica se há sessão aberta.
	verificarSessao();

  $func = new Nomeclatura;

  // Chama dados do banco
  $retorno = $func->chamaNomeclatura();

?>

<!DOCTYPE html>
<html lang="pt-br">
<title>Nomeclatura - Medical Control</title>

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
                <h5 class="card-title">Inserir Novo Item</h5>

                <?php if(isset($_GET['atualizado']) == 'sucesso') { ?>

                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                    Feito com Sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php }?>
                
                <form class="row g-3" action="controladores/InserirNomeclatura.php" method="post">

                    <!-- <div class="col-12"> -->
                        <label class="form-label">Nome do Novo Item:</label>
                        <input type="text" name="remedio" maxlength="220" required class="form-control">

                        <label class="form-label">Unidade de Medida:</label>
                        <input type="text" name="uni_medida_nomeclatura" maxlength="220" required class="form-control">

                        <label class="form-label">Quantidade Minima no Estoque:</label>
                        <input type="number" name="quant_minima_nomeclatura"  required class="form-control">
                    <!-- </div> -->
        
                    <!-- <div class="text-center"> -->
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <!-- </div> -->

                </form>

                </br> 

                
                <!-- <label class="col-sm-2 col-form-label">Inserir via Planilha</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div> -->
                
            </div>
          </div>
       </div>


       <div class="card">
            <div class="card-body">
              <h5 class="card-title">Nome dos Itens Cadastrados</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Unidade de Medida</th>
                    <th>Quant Minima</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($retorno as $r) { ?>

                  <tr>
                    <td><?= $r['id_nomeclatura'] ?></td>
                    <td><?= $r['nome_nomeclatura'] ?></td>
                    <td><?= $r['uni_medida_nomeclatura']?></td>
                    <td><?=$r['quant_minima_nomeclatura']?></td>
                    <td><a href="editarNomeclatura.php?id=<?=$r['id_nomeclatura']?>">Editar</a></td>
                    
                  </tr>

                 <?php } ?> 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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