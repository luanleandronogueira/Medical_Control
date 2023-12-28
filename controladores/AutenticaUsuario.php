<?php 
session_start();

//Permite o include de arquivos que não podem ser abertos no navegador
// define('__INCLUDED_BY_OTHER_FILE__', true);

include 'Classes.php';

$login_recebido = $_POST['nome_usuario'];

$login = filter_input(INPUT_POST, 'nome_usuario', FILTER_SANITIZE_NUMBER_INT);
$senha = trim($_POST['senha_usuario']); 


if (!empty($login) and !empty($senha)) {

    $func = new Usuario();
    
    $usuario = $func->consultarUsuario($login, $senha);

    echo '<pre>';
        print_r($usuario);
    echo '</pre>';
   
    if (empty($_POST['enviar_requisicao'])) {


        $login_salvo = $usuario['cpf_usuario'];
        $senha_salva = $usuario['senha_usuario'];
    
        if (password_verify($senha, $senha_salva)) {

            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
            $_SESSION['cpf_usuario'] = $usuario['cpf_usuario'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
            header('Location: ../dashboard.php');
                // echo '<pre>';
                //     print_r($usuario);
                // echo '</pre>';
        } else {
    
            header('Location: ../index.php?erro=3');
            //  echo '<pre>';
            //     var_dump($usuario);
            // echo '</pre>';
            exit();
        }
       
    } else {

        header('Location: ../index.php?erro=1');
        exit();
    }

} else {

    header('Location: ../index.php?erro=2');
    exit();
}
?>