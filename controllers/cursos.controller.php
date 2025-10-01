<?php
    
    if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
        header('Location: /login');
        exit();
    }

    if($acao == 'listar'){

        $acao = 'cursos';
    }else if($acao == 'cadastrar'){

        $acao = 'inserir_curso';
    }else if($acao == 'gravar'){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            require_once __DIR__ . '/../models/Curso.php'; 
            
            if(!isset($_SESSION['cursos'])){
                $_SESSION['cursos'] = [];
            }
            if(!isset($_SESSION['curso_id'])){
                $_SESSION['curso_id'] = 1;
            }
            
            $Curso = new Curso();
            $Curso->__set('nome_curso', $_POST['nome_curso']);
            $Curso->__set('carga_horaria', $_POST['carga_horaria']);
            $Curso->__set('id', $_SESSION['curso_id']);
            if($Curso->__get('nome_curso') != '' && $Curso->__get('carga_horaria') != 0){
                $_SESSION['cursos'][] = $Curso;
                $_SESSION['curso_id']++;
                setcookie('mensagem', 'Curso cadastrado com Sucesso!', time() + 2, '/');
            }else{
                setcookie('mensagem_erro', 'Erro ao cadastrar curso. Verifique os dados e tente novamente.', time() + 2, '/');
            }
        }


        header('Location: /cursos');
    }else{

        $acao = '404';
    }

    require_once("views.php");