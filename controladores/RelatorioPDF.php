<?php 
include "Classes.php";

$datas = $_POST;

$func = new P_Emitido;

$chamaPedidoEmitido = $func->consultaPedidosEmitidosPorData($datas['data_inicial'], 
                                                            $datas['data_final']); ?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relatório de Entrada <?php echo $datas['data_inicial'] . "- " . $datas['data_final']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body>

    <!-- <div class="container">
      <div class="row">
        <div class="float-end">
        <a href="Relatorios.php?dataI=<?= $datas['data_inicial'] ?>&dataF=<?= $datas['data_final'] ?>" class="btn btn-warning mt-3">Baixar Relatório em PDF</a>

        </div>
      </div>
    </div> -->

    <div>
        <center>
            <img width="300px" src="http://localhost/Medical_Control/assets/img/medical_control_vetor.png" 
>           <p class="text-center small">Seu Sistema de Controle de Medicamento</p>
        </center>
    </div>

    <hr>

    <div class="mt-4">
        <center><h4>Relatório de Entrada</h4>
        <small><strong>Período <?= date('d/m/Y', strtotime($datas['data_inicial'])) . " - " . date('d/m/Y', strtotime($datas['data_final'])) ?></strong></small>
      
      </center>
    </div>
</br>

    <div class="container">
      <div class="row">

           <table class="table table-sm">
      <?php
      $currentPedido = null;
      foreach ($chamaPedidoEmitido as $pedido) {
        if ($currentPedido !== $pedido['n_p_emitido']) {
          // Se o número do pedido mudou, comece uma nova tabela
          if ($currentPedido !== null) {
            echo '</tbody></table>'; // Feche a tabela anterior
          }
          echo '<table class="table table-sm">
                <thead>
                  <tr>
                    <th>Nº Nota Fiscal</th>
                    <th>Data de Entrada</th>
                    <th>Nº Pedido Emitido</th>
                    <th>Item</th>
                    <th>Quant</th>
                    <th>Data de Validade</th>
                    <th>Lote</th>
                    <th>Fabricante</th>
                    <th>Estoque de Entrada</th>
                  </tr>
                </thead>
                <tbody>';
          $currentPedido = $pedido['n_p_emitido'];
        }
    // Exibir os dados da tabela
              echo '<tr>
              <td>' . $pedido['n_nota_fiscal_pedido'] . '</td>
              <td>' . date('d/m/Y', strtotime($pedido['data_entrada_pedido'])) . '</td>
              <td>' . $pedido['n_p_emitido'] . '</td>
              <td>' . $pedido['nomeclatura_p_emitido'] . '</td>
              <td>' . $pedido['quantidade_p_emitido'] . '</td>
              <td>' . date('d/m/Y', strtotime($pedido['data_val_p_emitido'])) . '</td>
              <td>' . $pedido['lote_p_emitido'] . '</td>
              <td>' . $pedido['fabricante_p_emitido'] . '</td>
              <td>' . $pedido['nome_estoque'] . '</td>
              </tr>';
    }
    echo '</tbody></table> </br>'; // Feche a última tabela
      ?>
</table>

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

