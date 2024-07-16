<?php
include "controladores/Controller.php";
include "controladores/Classes.php";

// Verifica se há sessão aberta.
verificarSessao();

// Instância os métodos
$func = new Nomeclatura;

// Chama as funções
$nomeclatura = $func->chamaNomeclatura();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php head() ?>
</head>
<style>
    .mostra-form {

        display: none;
    }
</style>

<script>
    function buscaRemedio() {

        const remedio = document.getElementById('remedio').value;
        var api = 'controladores/BuscaRemedio.php?remedio=' + remedio;
        const containerDados = document.getElementById('container-dados');
        const MensagemErro = document.getElementById('MensagemErro')


        fetch(api).then(response => {

            console.log('Response', response)
            return response.json()

        }).then(Dados => {

            if (Dados.error == 'VAZIO') {

                MensagemErro.style.display = 'block';
                containerDados.innerHTML = '';

            } else {

                MensagemErro.style.display = 'none';
                containerDados.innerHTML = '';

                Dados.forEach(dado => {

                    const remedioDiv = document.createElement('div')
                    remedioDiv.innerHTML = `<br>
                    <h5>Estoque : ${dado.nome_estoque}</h5>
                    <strong>Item: </strong><span>${dado.nome_remedio}</span><br>
                    <strong>Quantidade disponível: </strong><span><a href="">${dado.quantidade_remedio}</a></span><br>
                    <strong>Unidade de medida: </strong><span>${dado.uni_medida_remedio}</span><br>
                    <a href="transferenciasEntreEstoques.php?id=${
dado.id_estoque}&&nome=${dado.nome_estoque}"><span class="badge text-bg-secondary">Fazer Transferência</span></a>

                    <p><strong><hr></strong></p>
                    `;

                    containerDados.appendChild(remedioDiv);
                })

            }

            console.log('Dados', Dados)
            mostra.style.display = 'block'

        }).catch(error => {
            console.log(error)
        })


    }
</script>

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
                    <div class="card-body mt-3">
                        <div class="card-title">
                            <h5>Pesquisar Medicamentos Entre Estoques</h5>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-sm-12 col-md-12 mb-4">
                            <div class="input-group flex-nowrap">
                                <select class="form-control" name="" id="remedio">
                                    <?php foreach ($nomeclatura as $n) { ?>
                                        <option value="<?= $n['nome_nomeclatura'] ?>"><?= $n['nome_nomeclatura'] ?></option>
                                    <?php } ?>
                                </select>
                                <button class="input-group-text" onclick="buscaRemedio()" id="addon-wrapping"> <i class='bx bxs-search'></i></button>
                            </div>
                        </div>

                        <div id="mostra" class="mostra-form col-xl-12 col-lg-12 col-sm-12 col-md-12">
                            <center><span>Itens Disponíveis no estoques</span></center>

                            <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12" id="container-dados">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12" style="display: none;" id="MensagemErro">
                                <center>
                                    <h4>Não há nenhum remédio entre os estoques</h4>
                                </center>

                            </div>



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