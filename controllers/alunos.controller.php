<?php
    require_once('models/Aluno.php');

    if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
        header('Location: /login');
        exit();
    }

    if($acao == 'listar'){

        $acao = 'alunos';
        
    }else if($acao == 'cadastrar'){

        $acao = 'inserir_aluno';

    }else if($acao == 'gravar'){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if (!isset($_SESSION['aluno_id'])) {
                $_SESSION['aluno_id'] = 1;
            }

            $Aluno = new Aluno();
            $Aluno->__set('nome_aluno', $_POST['nome_aluno']);
            $Aluno->__set('data_nascimento', $_POST['data_nascimento']);
            $Aluno->__set('id', $_SESSION['aluno_id']);

            if($Aluno->__get('nome_aluno') != '' && $Aluno->__get('data_nascimento') != ''){
                $_SESSION['alunos'][] = $Aluno;
            }
            $_SESSION['aluno_id']++;
        }

        header('Location: /alunos');
    }else if(str_contains($acao, 'deletar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            foreach($_SESSION['alunos'] as $index => $aluno){
                if($aluno->__get('id') == $_GET['id']){
                    $_SESSION['alunos'][$index] = null;
                    break;
                }
            }
        }
        header('Location: /alunos');
    }else if($acao == 'modificar' && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            foreach($_SESSION['alunos'] as $index => $aluno){
                if($aluno->__get('id') == $_POST['id']){
                    $aluno->__set('nome_aluno', $_POST['nome_aluno']);
                    $aluno->__set('data_nascimento', $_POST['data_nascimento']);
                    $_SESSION['alunos'][$index] = $aluno;
                    break;
                }
            }
        }

        header('Location: /alunos');
    }else if(str_contains($acao, 'editar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            $Aluno = new Aluno();

            $acao = 'editar_aluno';

            foreach($_SESSION['alunos'] as $aluno){
                if($aluno->__get('id') == $_GET['id']){
                    $Aluno = $aluno;
                    break;
                }
            }
        }
    }else{

        $acao = '404';
    }


    require_once("views.php");