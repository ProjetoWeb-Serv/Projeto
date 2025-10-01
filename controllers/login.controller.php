<?php

    if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
        setcookie('mensagem', 'Você já está logado!', time() + 2, '/');
        header('Location: /alunos');
        exit();
    }


    if($acao != 'autenticar'){

        $acao = 'login';

    }else{

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $Usuario_encontrado = false;
            require_once('models/Usuario.php');

            foreach($Usuarios[0] as $usuario){
                if($usuario->__get('nome') === $nome && $usuario->__get('senha') === $senha){
                    $_SESSION['logado'] = true;
                    $_SESSION['usuario'] = $usuario->__get('nome');
                    $_SESSION['role'] = $usuario->__get('role');
                    setcookie('mensagem', 'Login efetuado!', time() + 2, '/');
                    $Usuario_encontrado = true;
                    header('Location: /alunos');
                    exit();
                }
            }

            if(!$Usuario_encontrado){
                setcookie('mensagem', 'Usuário ou senha incorretos!', time() + 2, '/');
                header('Location: /login');
                exit();
            }
        }
    }

    require_once("views.php");