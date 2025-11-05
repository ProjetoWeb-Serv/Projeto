<?php

    use Projeto\models\Usuario;
    use Projeto\models\dao\UsuarioDAO;

    if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
        setcookie('mensagem', 'Você já está logado!', time() + 2, '/');
        header('Location: /alunos');
        exit();
    }

    if($acao != 'autenticar'){

        $acao = 'login';

    }else{

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            require_once('src/models/Usuario.php');
            require_once('src/models/dao/UsuarioDAO.php');

            $nome = $_POST['nome'] ?? '';
            $senha = $_POST['senha'] ?? '';
            
            if(UsuarioDAO::login($nome, $senha)){
                setcookie('mensagem', 'Login realizado com sucesso!', time() + 2, '/');
                header('Location: /alunos');

            }else{
                setcookie('mensagem_erro', 'Nome ou senha inválidos!', time() + 2, '/');
                header('Location: /login');
            }
        }
    }

    require_once("views.php");