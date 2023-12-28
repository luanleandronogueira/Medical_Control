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

class Usuario {

    private $id;
    private $conexao;
    private $nome_usuario;
    private $cpf_usuario;
    private $senha_usuario;
    private $tipo_usuario;


    // Adicione um construtor para inicializar a conexão
    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function consultarUsuario($login, $senha){

        $query = "SELECT * FROM tb_usuario WHERE cpf_usuario = :login LIMIT 1";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);  
        $stmt->bindParam(':login', $login);
        // $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        return $usuario;
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

    public function chamaEstoqueEspecifico($id_estoque){

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_estoques WHERE id_estoque = :id_estoque";

        $stmt = $conn->prepare($query);
        $stmt->bindParam('id_estoque', $id_estoque);

        $stmt->execute(); 

        $r = $stmt->fetch(PDO::FETCH_ASSOC);

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
        $stmt->bindValue(':nome_remedio', $nome_remedio);
        $stmt->bindValue(':uni_medida_remedio', $uni_medida_remedio);
        $stmt->bindValue(':quantidade_remedio', $quantidade_remedio);
        $stmt->bindValue(':vencimento_remedio', $vencimento_remedio);
        $stmt->bindValue(':estoque_remedio', $estoque_remedio);

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

    public function chamaRemedioPorNome($id_estoque, $nome_remedio) {
        
        $conn = $this->conexao->Conectar();
    
        $query = "SELECT * FROM tb_remedio WHERE estoque_remedio = :estoque_remedio AND nome_remedio = :nome_remedio";
    
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':estoque_remedio', $id_estoque);
        $stmt->bindParam(':nome_remedio', $nome_remedio);
    
        $stmt->execute(); 
    
        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $retorno;
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

    public function chamaUnidadeRemedio($id_remedio) {

        $conn = $this->conexao->Conectar();

        $query = "SELECT * FROM tb_remedio WHERE id_remedio = :id_remedio";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_remedio', "$id_remedio");

        $stmt->execute(); 

        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

        return $retorno;

    }

    public function atualizaRemedioEstoque($id_remedio, $soma_remedio) {

        $conn = $this->conexao->Conectar();

        $query = "UPDATE tb_remedio SET quantidade_remedio = :soma_remedio WHERE id_remedio = :id_remedio";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':soma_remedio', "$soma_remedio");
        $stmt->bindValue(':id_remedio', "$id_remedio");
        
        $stmt->execute(); 

    }

    

}


class Historico {

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


    public function inserirHistorico($historico_historico, $data_historico, $sessao_historico, $item_tras_historico, $quantidade_historico, $id_estoque_enviado_historico, $id_estoque_recebido_historico){

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

    public function chamaHistorico() {
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
    
        while ($retorno = $stmt->fetch(PDO::FETCH_ASSOC)){
            $historico[] = $retorno;
        }
    
        return $historico;
    }
    
    



}



// Função para verificar se há uma sessão aberta
function verificarSessao() {
    session_start();
    // ob_start(); // Se necessário, descomente esta linha

    if ((!isset($_SESSION['id_usuario'])) AND (!isset($_SESSION['nome_usuario']))) {
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página! </p>";
        header("Location: index.php?usuario=negado");
        exit(); // Importante para evitar execução adicional após o redirecionamento
    }
}