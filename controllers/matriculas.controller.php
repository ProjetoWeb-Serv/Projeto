<?php

    if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
        header('Location: /login');
        exit();
    }

    if($acao == 'listar'){

        $acao = 'matriculas';

    }elseif($acao == 'cadastrar'){

        $acao = 'inserir_matricula';

    }elseif($acao == 'gravar'){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            require_once __DIR__ . '/../models/Curso.php';
            require_once __DIR__ . '/../models/Matricula.php';
    
            if(!isset($_SESSION['matricula_id'])){
                $_SESSION['matricula_id'] = 1;
            }
    
            $Matricula = new Matricula();
            $Matricula->__set('id_aluno', $_POST['id_aluno']);
            $Matricula->__set('id_curso', $_POST['id_curso']);
            $Matricula->__set('id', $_SESSION['matricula_id']);
            
            if($Matricula->__get('id_aluno') != '' && $Matricula->__get('id_curso') != 0){
                $_SESSION['matriculas'][] = $Matricula;
                $_SESSION['matricula_id']++;
                setcookie('mensagem', 'matricula feita com Sucesso!', time() + 2, '/');
            }else{
                setcookie('mensagem_erro', 'Erro ao fazer matrícula. Verifique os dados e tente novamente.', time() + 2, '/');
            }
        }

        header('Location: /matriculas');
    }else{

        $acao = '404';
    }

    require_once("views.php");