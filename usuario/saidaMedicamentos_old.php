<?php
include "../controladores/Controller.php";
include "../controladores/Classes.php";

// Verifica se há sessão aberta.
verificarSessaoUsuario();

$func2 = new Usuario;
$chamaUsuario = $func2->chamaUsuario($_SESSION['id_usuario']);

$func = new Remedio;
$remedio = $func->chamaEstoqueUsuario($chamaUsuario['setor_usuario']);


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
        <?php echo PerfilUsuario() ?>
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <?php echo sideBarUsuario() ?>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="card">
          <center>
            <h5 class="card-title">Dar Saída em Medicamentos</h5>
          </center>
        </div>
        <form action="../controladores/SaidaMedicamentos.php" method="post">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

                  <?php if (isset($_GET['valor']) == 'excedido') { ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                      <i class="bi bi-check-circle me-1"></i>
                      Você não tem essa quantidade no estoque!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php } ?>

                  <?php if (isset($_GET['erro']) == 'ForaPrazo') { ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                      <i class="bi bi-check-circle me-1"></i>
                      O paciente <strong><?=$_GET['paciente']?></strong> só poderá receber o medicamento no próximo dia <strong><?=$_GET['dataPrazo'] ?></strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php } ?>

                  <?php if (isset($_GET['baixa']) == 'sucesso') { ?>
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                      <i class="bi bi-check-circle me-1"></i>
                      Feito com Sucesso!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php } ?>

                  <div class="mt-3">
                    <center>
                      <input class="form-check-input" name="sem_receita" value="Sem Receita" type="checkbox">
                      <label class="form-check-label">Distribuição <strong>Sem</strong> Receita</label>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <div class="mt-3">
                    <label>Data de Distribuíção:</label>
                    <input class="form-control" required readonly name="data_data_retirada" type="date" id="DataAtual">
                    </br>
                    <label>Selecione a Medicação:</label>
                    <select class="form-control" name="nome_saida" id="nome_saida">
                      <?php foreach ($remedio as $r) { ?>
                        <option value="<?= $r['id_remedio'] . '-' . $r['nome_remedio'] ?>"><?= $r['nome_remedio'] ?></option>
                      <?php } ?>
                    </select>
                    </br>
                    <label>Quantidade Distribuída:</label>
                    <input class="form-control" required name="quantidade_saida" type="number" name="" id="">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <div class="mt-3">
                    <label>Data de Reabastecimento:</label>
                    <input class="form-control" required name="prox_retirada_data_retirada" type="date">
                    </br>
                    <label for="sus_saida">Nº do CPF:</label>
                    <input type="text" required name="sus_saida" class="form-control">
                    </br>
                    <label for="nome_paciente_saida">Nome Completo:</label>
                    <input type="text" required name="nome_paciente_saida" class="form-control">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="mt-3">
                    <label for="">Nº da Receita:</label>
                    <input type="number" required name="n_receita_saida" class="form-control">
                    </br>
                    <label for="observacao_saida">Observações:</label>
                    <textarea class="form-control" name="observacao_saida" id="observacao_saida" cols="8" rows="5"></textarea>
                    <small>Máximo 300 caracteres</small>
                  </div>

                </div>
              </div>
            </div>

            <input type="hidden" name="setor_usuario" value="<?= $chamaUsuario['setor_usuario'] ?>">
            <button class="btn btn-block btn-primary" type="submit">Finalizar</button>


          </div>
        </form>
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

  <script>
    const API = 'http://worldtimeapi.org/api/timezone/America/Recife';

    const DataAtual = document.getElementById('DataAtual');

    fetch(API)
      .then(Response => {
        // console.log('Response', Response);
        return Response.json();
      })
      .then(dados => {
        console.log('dados', dados);

        // Agora você define o valor do campo DataAtual
        DataAtual.value = dados.datetime.slice(0, 10);

        // console.log(DataAtual);
      })
      .catch(error => {
        console.log(error);
      });
  </script>

</body>

</html>