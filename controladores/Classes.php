<?php

// if (!defined('__INCLUDED_BY_OTHER_FILE__')) {
//     // Se a constante não estiver definida, encerre a execução
//     header('HTTP/1.0 403 Forbidden');
//     header("Location: ./index.php?acesso=proibido");
//     exit('Acesso proibido');
// }

include "Conexao.php";
$conexao = new Conexao();
date_default_timezone_set('America/Sao_Paulo');

class Nomeclatura
{

    private $id;
    private $conexao;
    private $nomeclatura;
    private $quant_minima_nomeclatura;

    // Adicione um construtor para inicializar a conexão
    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserirNomeclatura($nomeclatura, $uni_medida_nomeclatura, $quant_minima_nomeclatura)
    {

        $conn = $this->conexao->Conectar();

        $query = "INSERT INTO tb_nomeclatura (nome_nomeclatura, uni_medida_nomeclatura, quant_minima_nomeclatura) VALUES (:nomeclatura, :uni_medida_nomeclatura, :quant_minima_nomeclatura)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nomeclatura", $nomeclatura);
        $stmt->bindParam(":uni_medida_nomeclatura", $uni_medida_nomeclatura);
        $stmt->bindParam(":quant_minima_nomeclatura", $quant_minima_nomeclatura);

        $stmt->execute();
    }

    public function chamaNomeclatura()
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_nomeclatura";

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $r[] = $retorno;
        };

        return $r;
    }

    public function analisaNomeclatura($nomeclatura)
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_nomeclatura WHERE nome_nomeclatura = :nomeclatura";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nome_nomeclatura', $nomeclatura);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function chamaNomeclaturaEspecifica($id_nomeclatura)
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_nomeclatura WHERE id_nomeclatura = :id_nomeclatura LIMIT 1";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_nomeclatura', $id_nomeclatura);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarNomeclatura($nome_nomeclatura, $uni_medida_nomeclatura, $quant_minima_nomeclatura,  $id_nomeclatura)
    {

        $conn = $this->conexao->Conectar();

        $query = "UPDATE tb_nomeclatura SET nome_nomeclatura = :nome_nomeclatura, uni_medida_nomeclatura = :uni_medida_nomeclatura, quant_minima_nomeclatura = :quant_minima_nomeclatura WHERE id_nomeclatura = :id_nomeclatura";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':nome_nomeclatura', "$nome_nomeclatura");
        $stmt->bindValue(':uni_medida_nomeclatura', "$uni_medida_nomeclatura");
        $stmt->bindValue(':quant_minima_nomeclatura', "$quant_minima_nomeclatura");
        $stmt->bindValue(':id_nomeclatura', $id_nomeclatura);

        $stmt->execute();
    }
}

class Usuario
{

    private $id;
    private $conexao;
    private $nome_usuario;
    private $cpf_usuario;
    private $senha_usuario;
    private $tipo_usuario;


    // Adicione um construtor para inicializar a conexão
    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function consultarUsuario($login, $senha)
    {

        $query = "SELECT * FROM tb_usuario WHERE cpf_usuario = :login LIMIT 1";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':login', $login);
        // $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        return $usuario;
    }

    public function consultarUsuarioCadastrado($cpf)
    {

        $query = "SELECT cpf_usuario FROM tb_usuario WHERE cpf_usuario = :cpf LIMIT 1";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':cpf', $cpf);
        // $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        return $usuario;
    }

    public function inserirUsuario($nome_usuario, $cpf_usuario, $senha_usuario, $tipo_usuario, $setor_usuario)
    {

        $query = "INSERT INTO tb_usuario (nome_usuario, cpf_usuario, senha_usuario, tipo_usuario, setor_usuario) VALUES (:nome_usuario, :cpf_usuario, :senha_usuario, :tipo_usuario, :setor_usuario)";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nome_usuario', $nome_usuario);
        $stmt->bindParam(':cpf_usuario', $cpf_usuario);
        $stmt->bindParam(':senha_usuario', $senha_usuario);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
        $stmt->bindParam(':setor_usuario', $setor_usuario);

        $stmt->execute();
    }

    public function atualizarUsuario($id, $nome_usuario, $tipo_usuario)
    {

        $conn = $this->conexao->Conectar();

        $query = "UPDATE tb_usuario SET nome_usuario = :nome_usuario, tipo_usuario = :tipo_usuario WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':nome_usuario', "$nome_usuario");
        $stmt->bindValue(':tipo_usuario', "$tipo_usuario");
        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }

    public function atualizarSenhaUsuario($id, $senha)
    {

        $conn = $this->conexao->Conectar();

        $query = "UPDATE tb_usuario SET senha_usuario = :senha_usuario WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':senha_usuario', "$senha");
        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }

    public function chamaUsuario($id)
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_usuario WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam('id', $id);

        $stmt->execute();

        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r;
    }
}

class Estoque
{

    private $id;
    private $conexao;
    private $nome_estoque;


    public function __construct()
    {
        $this->conexao = new Conexao();
    }


    public function inserirEstoque($nome_estoque)
    {

        $conn = $this->conexao->Conectar();

        $query = "INSERT INTO tb_estoques (nome_estoque) VALUES (:nome_estoque)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nome_estoque", $nome_estoque);

        $stmt->execute();
    }

    public function chamaEstoque()
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_estoques";

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $r[] = $retorno;
        };

        return $r;
    }

    public function chamaEstoqueEspecifico($id_estoque)
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_estoques WHERE id_estoque = :id_estoque";

        $stmt = $conn->prepare($query);
        $stmt->bindParam('id_estoque', $id_estoque);

        $stmt->execute();

        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r;
    }
}

class Remedio
{

    private $id;
    private $conexao;
    private $nome_remedio;
    private $uni_medida_remedio;
    private $quantidade_remedio;
    private $quant_min_estoque_remedio;
    private $vencimento_remedio;
    private $estoque_remedio;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserirRemedio($nome_remedio, $uni_medida_remedio, $quantidade_remedio, $quant_min_estoque_remedio, $vencimento_remedio, $estoque_remedio)
    {

        $conn = $this->conexao->Conectar();

        $query = "INSERT INTO tb_remedio (nome_remedio, uni_medida_remedio, quantidade_remedio, quant_min_estoque_remedio, vencimento_remedio, estoque_remedio ) VALUES (:nome_remedio, :uni_medida_remedio, :quantidade_remedio, :quant_min_estoque_remedio, :vencimento_remedio, :estoque_remedio)";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':nome_remedio', $nome_remedio);
        $stmt->bindValue(':uni_medida_remedio', $uni_medida_remedio);
        $stmt->bindValue(':quantidade_remedio', $quantidade_remedio);
        $stmt->bindValue(':quant_min_estoque_remedio', $quant_min_estoque_remedio);
        $stmt->bindValue(':vencimento_remedio', $vencimento_remedio);
        $stmt->bindValue(':estoque_remedio', $estoque_remedio);

        $stmt->execute();
    }

    public function chamaRemedio()
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_remedio";

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $r[] = $retorno;
        };

        return $r;
    }

    public function chamaRemedioNome($nome_remedio)
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT *
        FROM tb_remedio AS r
        INNER JOIN tb_estoques AS e ON r.estoque_remedio = e.id_estoque
        WHERE r.nome_remedio = :nome_remedio";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':nome_remedio', $nome_remedio);

        $stmt->execute();

        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $r[] = $retorno;
        };

        return $r;
    }

    public function chamaRemedioPorNome($id_estoque, $nome_remedio)
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_remedio WHERE estoque_remedio = :estoque_remedio AND nome_remedio = :nome_remedio";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':estoque_remedio', $id_estoque);
        $stmt->bindParam(':nome_remedio', $nome_remedio);

        $stmt->execute();

        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

        return $retorno;
    }


    public function chamaRemedioPorEstoque($idEstoque)
    {

        // Consulta SQL para obter os remédios associados ao estoque atual
        $query = "SELECT * FROM tb_remedio WHERE estoque_remedio = :idEstoque";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":idEstoque", $idEstoque);
        $stmt->execute();
        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $r[] = $retorno;
        };

        return $r;
    }

    public function chamaUnidadeRemedio($id_remedio)
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_remedio WHERE id_remedio = :id_remedio";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_remedio', "$id_remedio");

        $stmt->execute();

        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

        return $retorno;
    }

    public function chamaEstoqueUsuario($id_estoque)
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_remedio WHERE estoque_remedio = :id_estoque";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_estoque', "$id_estoque");

        $stmt->execute();

        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $r[] = $retorno;
        };

        return $r;
    }

    public function chamaRemedioNomeEstoque($id_remedio, $nome_remedio, $estoque_remedio)
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_remedio WHERE id_remedio = :id_remedio AND nome_remedio = :nome_remedio AND estoque_remedio = :estoque_remedio LIMIT 1";


        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_remedio', $id_remedio);
        $stmt->bindValue(':nome_remedio', $nome_remedio);
        $stmt->bindValue(':estoque_remedio', "$estoque_remedio");

        $stmt->execute();

        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

        $r = $retorno;

        return $r;
    }

    public function atualizaRemedioEstoque($id_remedio, $soma_remedio)
    {

        $conn = $this->conexao->Conectar();

        $query = "UPDATE tb_remedio SET quantidade_remedio = :soma_remedio WHERE id_remedio = :id_remedio";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':soma_remedio', "$soma_remedio");
        $stmt->bindValue(':id_remedio', "$id_remedio");

        $stmt->execute();
    }
}


class Historico
{

    private $id_historico;
    private $conexao;
    private $historico_historico;
    private $data_historico;
    private $sessao_historico;
    private $item_tras_historico;
    private $quantidade_historico;
    private $id_estoque_historico;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }


    public function inserirHistorico($historico_historico, $data_historico, $sessao_historico, $item_tras_historico, $quantidade_historico, $id_estoque_enviado_historico, $id_estoque_recebido_historico)
    {

        $conn = $this->conexao->Conectar();

        $query = "INSERT INTO tb_historico (historico_historico, data_historico, sessao_historico, item_tras_historico, quantidade_historico, id_estoque_enviado_historico, id_estoque_recebido_historico) VALUES (:historico_historico, :data_historico, :sessao_historico, :item_tras_historico, :quantidade_historico, :id_estoque_enviado_historico, :id_estoque_recebido_historico)";

        $stmt = $conn->prepare($query);

        $stmt->bindValue(':historico_historico', "$historico_historico");
        $stmt->bindValue(':data_historico', "$data_historico");
        $stmt->bindValue(':sessao_historico', "$sessao_historico");
        $stmt->bindValue(':item_tras_historico', "$item_tras_historico");
        $stmt->bindValue(':quantidade_historico', "$quantidade_historico");
        $stmt->bindValue(':id_estoque_enviado_historico', "$id_estoque_enviado_historico");
        $stmt->bindValue(':id_estoque_recebido_historico', "$id_estoque_recebido_historico");

        $stmt->execute();
    }

    public function chamaHistorico()
    {

        $conn = $this->conexao->Conectar();

        $query = "
            SELECT 
                h.*, 
                e_enviado.nome_estoque AS nome_enviado, 
                e_recebido.nome_estoque AS nome_recebido
            FROM 
                tb_historico h
            LEFT JOIN 
                tb_estoques e_enviado ON h.id_estoque_enviado_historico = e_enviado.id_estoque
            LEFT JOIN 
                tb_estoques e_recebido ON h.id_estoque_recebido_historico = e_recebido.id_estoque
            ORDER BY 
                h.id_historico DESC
        ";

        $stmt = $conn->prepare($query);
        $stmt->execute();

        $historico = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $historico[] = $retorno;
        }

        return $historico;
    }
}

class Saida
{

    private $id;
    private $conexao;
    private $status_receita_saida;
    private $id_remedio_saida;
    private $remedio_saida;
    private $quantidade_saida;
    private $sus_saida;
    private $nome_paciente_saida;
    private $n_receita_saida;
    private $observacao_saida;
    private $sessao_saida;
    private $data_saida;
    private $estoque_saida;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserirSaida(
        $status_receita_saida,
        $id_remedio_saida,
        $remedio_saida,
        $quantidade_saida,
        $sus_saida,
        $nome_paciente_saida,
        $n_receita_saida,
        $observacao_saida,
        $sessao_saida,
        $data_saida,
        $estoque_saida
    ) {

        $conn = $this->conexao->Conectar();
        $query = "INSERT INTO tb_saida (status_receita_saida, id_remedio_saida, remedio_saida, quantidade_saida, sus_saida, nome_paciente_saida, n_receita_saida, observacao_saida, sessao_saida, data_saida, estoque_saida) VALUES (:status_receita_saida, :id_remedio_saida, :remedio_saida, :quantidade_saida, :sus_saida, :nome_paciente_saida, :n_receita_saida, :observacao_saida, :sessao_saida, :data_saida, :estoque_saida)";

        $stmt = $conn->prepare($query);

        $stmt->bindValue(':status_receita_saida', $status_receita_saida);
        $stmt->bindValue(':id_remedio_saida', $id_remedio_saida);
        $stmt->bindValue(':remedio_saida', $remedio_saida);
        $stmt->bindValue(':quantidade_saida', $quantidade_saida);
        $stmt->bindValue(':sus_saida', $sus_saida);
        $stmt->bindValue(':nome_paciente_saida', $nome_paciente_saida);
        $stmt->bindValue(':n_receita_saida', $n_receita_saida);
        $stmt->bindValue(':observacao_saida', $observacao_saida);
        $stmt->bindValue(':sessao_saida', $sessao_saida);
        $stmt->bindValue(':data_saida', $data_saida);
        $stmt->bindValue(':estoque_saida', $estoque_saida);

        $stmt->execute();
    }

    public function chamaSaida()
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT 
        s.id_saida,
        s.status_receita_saida,
        s.id_remedio_saida,
        s.remedio_saida,
        s.quantidade_saida,
        s.sus_saida,
        s.nome_paciente_saida,
        s.n_receita_saida,
        s.observacao_saida,
        s.sessao_saida,
        s.data_saida,
        s.estoque_saida,
        e.nome_estoque
    FROM 
        tb_saida s
    JOIN 
        tb_estoques e ON s.estoque_saida = e.id_estoque
    ORDER BY 
        s.id_saida DESC ";

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $r[] = $retorno;
        };

        return $r;
    }

    public function chamaPessoaSaida($id_saida)
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_saida WHERE id_saida = :id_saida LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_saida', $id_saida);

        $stmt->execute();

        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r;
    }

    public function chamaSaidaPorEstoque($estoque_saida, $data_inicial, $data_final)
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_saida WHERE estoque_saida = :estoque_saida AND data_saida BETWEEN :data_inicial AND :data_final";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':estoque_saida', $estoque_saida);
        $stmt->bindValue(':data_inicial', $data_inicial);
        $stmt->bindValue(':data_final', $data_final);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro durante a execução da consulta: " . $e->getMessage();
            die;
        }

        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $r[] = $retorno;
        }

        return $r;
    }
}


class RemedioUsuario extends Remedio
{

    private $id;
    private $conexao;
    private $nome_remedio;
    private $uni_medida_remedio;
    private $quantidade_remedio;
    private $vencimento_remedio;
    private $estoque_remedio;


    public function __construct()
    {
        $this->conexao = new Conexao();
    }


    public function chamaEstoqueUsuario($id_estoque)
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_remedio WHERE estoque_remedio = :id_estoque";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_estoque', "$id_estoque");

        $stmt->execute();

        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $r[] = $retorno;
        };

        return $r;
    }
}

class Pedido
{

    private $id_pedido;
    private $conexao;
    private $n_nota_fiscal_pedido;
    private $chave_nota_pedido;
    private $data_entrada_pedido;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserirPedido($n_nota_fiscal_pedido, $chave_nota_pedido, $data_entrada_pedido)
    {

        $conn = $this->conexao->Conectar();

        $query = "INSERT INTO tb_pedido (n_nota_fiscal_pedido, chave_nota_pedido, data_entrada_pedido) VALUES (:n_nota_fiscal_pedido, :chave_nota_pedido, :data_entrada_pedido)";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':n_nota_fiscal_pedido', $n_nota_fiscal_pedido);
        $stmt->bindValue(':chave_nota_pedido', $chave_nota_pedido);
        $stmt->bindValue(':data_entrada_pedido', $data_entrada_pedido);

        $stmt->execute();
    }

    public function chamaPedido()
    {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_pedido ORDER BY id_pedido DESC";

        $stmt = $conn->prepare($query);
        $stmt->execute();

        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $r[] = $retorno;
        };

        return $r;
    }
}

class P_Emitido
{

    private $id_p_emitido;
    private $conexao;
    private $n_p_emitido;
    private $nomeclatura_p_emitido;
    private $quantidade_p_emitido;
    private $data_val_p_emitido;
    private $lote_p_emitido;
    private $fabricante_p_emitido;
    private $estoque_p_emitido;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir_P_Emitido(
        $n_p_emitido,
        $nomeclatura_p_emitido,
        $quantidade_p_emitido,
        $data_val_p_emitido,
        $lote_p_emitido,
        $fabricante_p_emitido,
        $estoque_p_emitido
    ) {

        $conn = $this->conexao->Conectar();

        $query = "INSERT INTO tb_p_emitido (n_p_emitido, 
                                            nomeclatura_p_emitido, 
                                            quantidade_p_emitido,
                                            data_val_p_emitido,
                                            lote_p_emitido,
                                            fabricante_p_emitido,
                                            estoque_p_emitido) VALUES (:n_p_emitido, 
                                                                       :nomeclatura_p_emitido, 
                                                                       :quantidade_p_emitido,
                                                                       :data_val_p_emitido,
                                                                       :lote_p_emitido,
                                                                       :fabricante_p_emitido,
                                                                       :estoque_p_emitido)";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':n_p_emitido', $n_p_emitido);
        $stmt->bindValue(':nomeclatura_p_emitido', $nomeclatura_p_emitido);
        $stmt->bindValue(':quantidade_p_emitido', $quantidade_p_emitido);
        $stmt->bindValue(':data_val_p_emitido', $data_val_p_emitido);
        $stmt->bindValue(':lote_p_emitido', $lote_p_emitido);
        $stmt->bindValue(':fabricante_p_emitido', $fabricante_p_emitido);
        $stmt->bindValue(':estoque_p_emitido', $estoque_p_emitido);

        $stmt->execute();
    }

    public function consultaPedidosEmitidosPorData($dataInicial, $dataFinal)
    {

        $conn = $this->conexao->Conectar();

        try {
            $query = "SELECT
                pedido.id_pedido,
                pedido.n_nota_fiscal_pedido,
                pedido.chave_nota_pedido,
                pedido.data_entrada_pedido,
                p_emitido.n_p_emitido,
                p_emitido.nomeclatura_p_emitido,
                p_emitido.quantidade_p_emitido,
                p_emitido.data_val_p_emitido,
                p_emitido.lote_p_emitido,
                p_emitido.fabricante_p_emitido,
                estoques.nome_estoque
            FROM
                tb_pedido AS pedido
            JOIN
                tb_p_emitido AS p_emitido ON pedido.id_pedido = p_emitido.n_p_emitido
            JOIN
                tb_estoques AS estoques ON p_emitido.estoque_p_emitido = estoques.id_estoque
            WHERE
                pedido.data_entrada_pedido BETWEEN :dataInicial AND :dataFinal";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':dataInicial', $dataInicial);
            $stmt->bindParam(':dataFinal', $dataFinal);
            $stmt->execute();

            // Verifique se há resultados
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            // Trate exceções PDO, por exemplo, imprima a mensagem de erro
            echo "Erro: " . $e->getMessage();
        } catch (Exception $e) {
            // Trate outras exceções, se necessário
            echo "Erro: " . $e->getMessage();
        }
    }
}

class Data_Retirada
{

    private $id_data_retirada;
    private $conexao;
    private $id_remedio_data_retirada;
    private $data_data_retirada;
    private $prox_retirada_data_retirada;
    private $cpf_paciente_data_retirada;
    private $nome_data_retirada;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserirDataRetirada($id_remedio_data_retirada, $data_data_retirada, $prox_retirada_data_retirada, $cpf_paciente_data_retirada, $nome_data_retirada)
    {

        $conn = $this->conexao->Conectar();

        $query = "INSERT INTO tb_data_retirada (id_remedio_data_retirada, data_data_retirada, prox_retirada_data_retirada, cpf_paciente_data_retirada, nome_data_retirada) VALUES (:id_remedio_data_retirada, :data_data_retirada, :prox_retirada_data_retirada, :cpf_paciente_data_retirada, :nome_data_retirada)";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_remedio_data_retirada', $id_remedio_data_retirada);
        $stmt->bindValue(':data_data_retirada', $data_data_retirada);
        $stmt->bindValue(':prox_retirada_data_retirada', $prox_retirada_data_retirada);
        $stmt->bindValue(':cpf_paciente_data_retirada', $cpf_paciente_data_retirada);
        $stmt->bindValue(':nome_data_retirada', $nome_data_retirada);

        $stmt->execute();
    }

    public function consultaDataRetirada($id_remedio_data_retirada, $cpf_paciente_data_retirada){

        $query = "SELECT prox_retirada_data_retirada, nome_data_retirada, cpf_paciente_data_retirada FROM tb_data_retirada WHERE id_remedio_data_retirada = :id_remedio_data_retirada AND cpf_paciente_data_retirada = :cpf_paciente_data_retirada ORDER BY prox_retirada_data_retirada DESC";

        $conn = $this->conexao->Conectar();
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_remedio_data_retirada', $id_remedio_data_retirada);
        $stmt->bindValue(':cpf_paciente_data_retirada', $cpf_paciente_data_retirada);

        $stmt->execute();
        
        $r = [];

        return $r = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

class CarrinhoTransferencia {

    private $id_carrinho_transferencia;
    private $conexao;
    private $id_remedio_carrinho_transferencia;
    private $nome_carrinho_transferencia;
    private $quantidade_carrinho_transferencia;
    private $estoque_enviado_carrinho_transferencia;
    private $estoque_destino_carrinho_transferencia;
    private $data_carrinho_transferencia;
    private $lote_carrinho_transferencia;
    private $status_carrinho_transferencia;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function criaLote($numero_lote, $status_lote){

        $conn = $this->conexao->Conectar();

        $query = "INSERT INTO tb_lote (numero_lote, status_lote) VALUES (:numero_lote, :status_lote)";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':numero_lote', $numero_lote);
        $stmt->bindValue(':status_lote', $status_lote);

        $stmt->execute();
    
    }

    public function verificaLoteAberto(){

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_lote WHERE status_lote = 'A' ";
        $stmt = $conn->prepare($query);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fechaLote($numero_lote){

        $conn = $this->conexao->Conectar();

        $query = "DELETE FROM tb_lote WHERE numero_lote = :numero_lote AND status_lote = 'A'";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':numero_lote', $numero_lote);

        $stmt->execute();
    }

    public function inserirCarrinhoTransferencia($id_remedio_carrinho_transferencia,
$nome_carrinho_transferencia, $quantidade_carrinho_transferencia, $estoque_enviado_carrinho_transferencia, $estoque_destino_carrinho_transferencia, $data_carrinho_transferencia, $lote_carrinho_transferencia, $status_carrinho_transferencia)
    {

        $conn = $this->conexao->Conectar();

        $query = "INSERT INTO tb_carrinho_transferencia (id_remedio_carrinho_transferencia, nome_carrinho_transferencia, quantidade_carrinho_transferencia, estoque_enviado_carrinho_transferencia, estoque_destino_carrinho_transferencia, data_carrinho_transferencia, lote_carrinho_transferencia, status_carrinho_transferencia) VALUES (:id_remedio_carrinho_transferencia, :nome_carrinho_transferencia, :quantidade_carrinho_transferencia, :estoque_enviado_carrinho_transferencia, :estoque_destino_carrinho_transferencia, :data_carrinho_transferencia, :lote_carrinho_transferencia, :status_carrinho_transferencia)";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_remedio_carrinho_transferencia', $id_remedio_carrinho_transferencia);
        $stmt->bindValue(':nome_carrinho_transferencia', $nome_carrinho_transferencia);
        $stmt->bindValue(':quantidade_carrinho_transferencia', $quantidade_carrinho_transferencia);
        $stmt->bindValue(':estoque_enviado_carrinho_transferencia', $estoque_enviado_carrinho_transferencia);
        $stmt->bindValue(':estoque_destino_carrinho_transferencia', $estoque_destino_carrinho_transferencia);
        $stmt->bindValue(':data_carrinho_transferencia', $data_carrinho_transferencia);
        $stmt->bindValue(':lote_carrinho_transferencia', $lote_carrinho_transferencia);
        $stmt->bindValue(':status_carrinho_transferencia', $status_carrinho_transferencia);

        $stmt->execute();
    }


}

// Função para verificar se há uma sessão aberta
function verificarSessao()
{
    session_start();
    // ob_start(); // Se necessário, descomente esta linha

    if ($_SESSION['tipo_usuario'] === 'u') {

        header("Location: index.php?usuario=negado");
        exit(); // Importante para evitar execução adicional após o redirecionamento

    } else {

        if ((!isset($_SESSION['id_usuario'])) and (!isset($_SESSION['nome_usuario']))) {
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página! </p>";
        }
    }
}


// Função para verificar se há uma sessão aberta
function verificarSessaoUsuario()
{
    session_start();
    // ob_start(); // Se necessário, descomente esta linha

    if ($_SESSION['tipo_usuario'] != 'u') {

        header("Location: index.php?usuario=negado");
        exit(); // Importante para evitar execução adicional após o redirecionamento

    } else {

        if ((!isset($_SESSION['id_usuario'])) and (!isset($_SESSION['nome_usuario']))) {
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página! </p>";
            header("Location: index.php?usuario=negado");
            exit(); // Importante para evitar execução adicional após o redirecionamento
        }
    }
}
