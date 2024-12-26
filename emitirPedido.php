<?php
include "controladores/Controller.php";
include "controladores/Classes.php";
include "assets/vendor/autoload.php";

// Verifica se há sessão aberta.
verificarSessao();

// Instância os métodos
$func = new Nomeclatura;
$funcEstoque = new Estoque;
$funcPedido = new Pedido;

// Chama as funções
$nomeclatura = $func->chamaNomeclatura();
$nomeEstoque = $funcEstoque->chamaEstoque();
$nomePedido = $funcPedido->chamaPedido();


// echo '<pre>';
// print_r($nomeclatura);
// echo '</pre>';
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
        <?php echo Perfil() ?>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <?php echo sideBar() ?>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <section class="section">
      <div class="row">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Emitir Pedido</h5>

            <form action="controladores/EmitirPedido.php" method="post">

              <?php if (isset($_GET['cadastrar']) == 'sucesso') { ?>

                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                  <i class="bi bi-check-circle me-1"></i>
                  Nota/Pedido Inserido com Sucesso!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

              <?php } ?>

              <div class="col-lg-4">
                <label for="">Nº Nota/Pedido</label>
                <input class="form-control" type="text" name="n_nota_fiscal_pedido" id="">
              </div>

              <!-- <div class="col-lg-12">
                    <label for="">Chave de Acesso:</label>
                    <input class="form-control" type="text" name="chave_nota_pedido" id="">
                </div> -->

              <div class="col-lg-4">
                <label for="">Data Entrada:</label>
                <input class="form-control" type="date" name="data_entrada_pedido" id="">
              </div>

              </br>

              <div>
                <button type="submit" name="nota_pedido" class="btn btn-success">Cadastrar Pedido</button>
              </div>


            </form>

          </div>
        </div>

        <form action="controladores/EmitirPedido.php" method="post">
          <div class="row">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Entrada de Medicamentos</h5>

                <?php if (isset($_GET['cadastrar']) == 'Sucessos') { ?>

                  <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    Nota Inserida com Sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>

                <?php } ?>

                <label>Selecione o nº da Nota Fiscal:</label>
                <select required class="form-control" name="n_p_emitido" id="">
                  <?php foreach ($nomePedido as $Pedido) { ?>
                    <option value="<?= $Pedido['id_pedido'] ?>"><?= $Pedido['n_nota_fiscal_pedido'] ?></option>
                  <?php } ?>
                </select>

                <label>Selecione o Item:</label>
                <select class="form-control" required name="nomeclatura_p_emitido" id="">
                  <?php foreach ($nomeclatura as $n) { ?>
                    <option value="<?= $n['nome_nomeclatura'] . ' - ' . $n['quant_minima_nomeclatura'] ?>"><?= $n['nome_nomeclatura'] . " -  " . $n['uni_medida_nomeclatura'] ?></option>
                  <?php } ?>
                </select>

                <!-- Input escondido -->
                <input type="hidden" value="<?= $n['uni_medida_nomeclatura'] ?>" name="uni_medida_nomeclatura">

                <div class="col-lg-4">
                  <label for="quantidade_p_emitido">Quantidade:</label>
                  <input class="form-control" type="number" name="quantidade_p_emitido" required>
                </div>

                <div class="col-lg-4">
                  <label for="data_val_p_emitido">Data Validade:</label>
                  <input class="form-control" type="date" name="data_val_p_emitido">
                </div>

                <div class="col-lg-4">
                  <label for="lote_p_emitido">Lote:</label>
                  <input class="form-control" type="text" name="lote_p_emitido" required>
                </div>

                <div class="col-lg-12">
                  <label for="fabricante_p_emitido">Fabricante:</label>
                  <input class="form-control" type="text" name="fabricante_p_emitido" required>
                </div>

                <div class="col-lg-4">
                  <label for="data_preco_pedido">Data Da Nota:</label>
                  <input class="form-control" type="date" name="data_preco_pedido">
                </div>

                <div class="col-lg-4">
                  <label for="valor_preco">Valor da Medicação:</label>
                  <input class="form-control money" type="text" name="valor_preco" id="valor_preco" required>
                </div>

                <label>Selecione o Estoque de Entrada:</label>
                <select class="form-control" required name="estoque_p_emitido" id="">
                  <?php foreach ($nomeEstoque as $Estoque) { ?>
                    <option value="<?= $Estoque['id_estoque'] ?>"><?= $Estoque['nome_estoque'] ?></option>
                  <?php } ?>
                </select>

                </br>

                <div>
                  <button type="submit" name="medicacao_pedido" class="btn btn-success">Cadastrar Pedido</button>
                </div>
              </div>
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
  <script src='https://code.jquery.com/jquery-3.7.1.slim.js' integrity='sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=' crossorigin='anonymous'></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/jquery.mask.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.date').mask('00/00/0000');
      $('.time').mask('00:00:00');
      $('.date_time').mask('00/00/0000 00:00:00');
      $('.cep').mask('00000-000');
      $('.phone').mask('0000-0000');
      $('.phone_with_ddd').mask('(00) 0000-0000');
      $('.phone_us').mask('(000) 000-0000');
      $('.mixed').mask('AAA 000-S0S');
      $('.cpf').mask('000.000.000-00', {
        reverse: true
      });
      $('.cnpj').mask('00.000.000/0000-00', {
        reverse: true
      });
      $('.money').mask('000.000.000.000.000,00', {
        reverse: true
      });
      $('.money2').mask("#.##0,00", {
        reverse: true
      });
      $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
          'Z': {
            pattern: /[0-9]/,
            optional: true
          }
        }
      });
      $('.ip_address').mask('099.099.099.099');
      $('.percent').mask('##0,00%', {
        reverse: true
      });
      $('.clear-if-not-match').mask("00/00/0000", {
        clearIfNotMatch: true
      });
      $('.placeholder').mask("00/00/0000", {
        placeholder: "__/__/____"
      });
      $('.fallback').mask("00r00r0000", {
        translation: {
          'r': {
            pattern: /[\/]/,
            fallback: '/'
          },
          placeholder: "__/__/____"
        }
      });
      $('.selectonfocus').mask("00/00/0000", {
        selectOnFocus: true
      });
    });
  </script>

</body>

</html>