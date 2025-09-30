<?php
    if($acao != 'autenticar'){

        $acao = 'login';

    }else{

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if($nome === 'admin' && $senha === 'admin123'){
                $_SESSION['usuario'] = $nome;
                setcookie('mensagem_sucesso', 'Login efetuado!', time() + 5, '/');
                header('Location: /alunos');
                exit();
            }else{
                setcookie('mensagem_falha', 'Usuário ou senha incorretos!', time() + 5, '/');
                header('Location: /login');
                exit();
            }
        }
    }

    require_once("views.php");