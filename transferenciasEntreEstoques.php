<?php 
  include "controladores/Controller.php";
  include "controladores/Classes.php";

  // Verifica se há sessão aberta.
	verificarSessao();

  $func = new Remedio;
  $chamaRemedio = $func->chamaRemedioPorEstoque($_GET['id']);

  $func2 = new Estoque;
  $chamaEstoque = $func2->chamaEstoque();

  $nomeEstoque = $_GET['nome'];

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
       
      <div class="col-lg-12 col-md-12">

                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title">Transferências Entre Estoques (<?php echo $nomeEstoque?>)</h5>
                                        <h4 class="card-title">De:</h4>
                                        <table class="table table-sm">
                                            <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Quantidade Disponível</th>
                                                <th scope="col">Unidade de Medida</th>
                                            </tr>
                                            </thead>
                                            <?php foreach($chamaRemedio as $remedio) { ?>
                                            <tbody>
                                                <td><?=$remedio['id_remedio'] ?></td>
                                                <td><?=$remedio['nome_remedio']?></td>
                                                <td>
                                                <?php if($remedio['quantidade_remedio'] <= 0 ) {?>
                                                    <span type='button' class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#disablebackdrop<?= $remedio['id_remedio'] ?>">
                                                        <?php echo $remedio['quantidade_remedio'] ?>
                                                    </span>
                                                <?php } else { ?>
                                                    <span type='button' class="badge bg-success" data-bs-toggle="modal" data-bs-target="#disablebackdrop<?= $remedio['id_remedio'] ?>">
                                                        <?php echo $remedio['quantidade_remedio'] ?></a>
                                                    </span>
                                                <?php } ?>
    
                                                <div class="modal fade" id="disablebackdrop<?= $remedio['id_remedio'] ?>" tabindex="-1" data-bs-backdrop="false">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Atualizar Quantidade no Estoque:</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="controladores/TransferirEntreEstoques.php" method="post">
                                                            <div class="modal-body">
                                                                De: </br>
                                                                <label for=""><span type='button' class="badge bg-success" data-bs-toggle="modal" data-bs-target="#disablebackdrop<?= $remedio['id_remedio'] ?>">
                                                        <?php echo $remedio['quantidade_remedio'] ?></a>
                                                    </span>:</label>
                                                                <input type="number" name="quantidade_remedio" id="">
                                                                <input type="hidden" name="id_remedio" value="<?=$remedio['id_remedio']?>">
                                                                <input type="hidden" name="nome_remedio" value="<?=$remedio['nome_remedio']?>">
                                                                <input type="hidden" name="estoque_enviando" value="<?=$_GET['id'] ?>">
                                                                </br></br>
                                                                <label for="">Para:</label>
                                                                <select name="estoque" id="">
                                                                
                                                                <?php foreach($chamaEstoque as $Estoque) {?>

                                                                    <option value="<?= $Estoque['id_estoque']?>"><?= $Estoque['nome_estoque']?></option>
                                                                 <?php } ?>   

                                                                </select></br></br>

                                                                <label for="">Histórico da Transferência (descreva o motivo):</label>
                                                                <textarea name="historico_historico" maxlength="300" class="form-control" id="" cols="10" rows="5"></textarea>
                                                                <small>Até 300 caracteres</small>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                                <button type="submit" class="btn btn-primary">Adicionar</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                                <td><?=$remedio['uni_medida_remedio'] ?></td>
                                            </tbody>
                                            
                                            <?php } ?>

                                        </table>

                                        </div>
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