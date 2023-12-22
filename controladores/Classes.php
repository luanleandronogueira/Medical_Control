<?php

    include "Conexao.php";
    $conexao = new Conexao();

class Nomeclatura {

    private $id;
    private $conexao;
    private $nomeclatura;

    // Adicione um construtor para inicializar a conexão
    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function inserirNomeclatura($nomeclatura){

        $conn = $this->conexao->Conectar();

        $query = "INSERT INTO tb_nomeclatura (nome_nomeclatura) VALUES (:nomeclatura)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nomeclatura", $nomeclatura);

        $stmt->execute();

    }

    public function chamaNomeclatura(){

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_nomeclatura";

        $stmt = $conn->prepare($query);

        $stmt->execute(); 

        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)){

            $r[] = $retorno;

        };

        return $r;
    }

    public function analisaNomeclatura($nomeclatura) {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_nomeclatura WHERE nome_nomeclatura = :nomeclatura";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nome_nomeclatura', $nomeclatura);

        $stmt->execute(); 

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }


}

class Estoque {

    private $id;
    private $conexao;
    private $nome_estoque;


    public function __construct()
    {
        $this->conexao = new Conexao();
    }


    public function inserirEstoque($nome_estoque){

        $conn = $this->conexao->Conectar();

        $query = "INSERT INTO tb_estoques (nome_estoque) VALUES (:nome_estoque)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nome_estoque", $nome_estoque);

        $stmt->execute();

    }

    public function chamaEstoque(){

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_estoques";

        $stmt = $conn->prepare($query);

        $stmt->execute(); 

        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)){

            $r[] = $retorno;

        };

        return $r;
    }

}

class Remedio {


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

    public function inserirRemedio($nome_remedio, $uni_medida_remedio, $quantidade_remedio, $vencimento_remedio, $estoque_remedio){

        $conn = $this->conexao->Conectar();

        $query = "INSERT INTO tb_remedio (nome_remedio, uni_medida_remedio, quantidade_remedio, vencimento_remedio, estoque_remedio ) VALUES (:nome_remedio, :uni_medida_remedio, :quantidade_remedio, :vencimento_remedio, :estoque_remedio)";

        $stmt = $conn->prepare($query);
        $stmt->bindValue('nome_remedio', $nome_remedio);
        $stmt->bindValue('uni_medida_remedio', $uni_medida_remedio);
        $stmt->bindValue('quantidade_remedio', $quantidade_remedio);
        $stmt->bindValue('vencimento_remedio', $vencimento_remedio);
        $stmt->bindValue('estoque_remedio', $estoque_remedio);

        $stmt->execute();
    }

    public function chamaRemedio() {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_remedio";

        $stmt = $conn->prepare($query);

        $stmt->execute(); 

        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)){

            $r[] = $retorno;

        };

        return $r;

    }

    public function chamaRemedioPorEstoque($idEstoque){

        // Consulta SQL para obter os remédios associados ao estoque atual
        $query = "SELECT * FROM tb_remedio WHERE estoque_remedio = :idEstoque";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":idEstoque", $idEstoque);
        $stmt->execute();
        $r = [];

        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)){

            $r[] = $retorno;

        };

        return $r;

    }


}