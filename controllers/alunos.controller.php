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
                setcookie('mensagem', 'Aluno cadastrado com Sucesso!', time() + 2, '/');
                $_SESSION['aluno_id']++;
            }else{
                setcookie('mensagem_erro', 'Erro ao cadastrar aluno. Verifique os dados e tente novamente.', time() + 2, '/');
            }

        }

        header('Location: /alunos');
    }else if(str_contains($acao, 'deletar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            foreach($_SESSION['alunos'] as $index => $aluno){
                if($aluno->__get('id') == $_GET['id']){
                    $_SESSION['alunos'][$index] = null;
                    $_SESSION['alunos'] = array_filter($_SESSION['alunos']);
                    setcookie('mensagem', 'Aluno deletado com Sucesso!', time() + 2, '/');
                    break;
                }else{
                    setcookie('mensagem_erro', 'Erro ao deletar aluno.', time() + 2, '/');
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
                    setcookie('mensagem', 'Aluno modificado com Sucesso!', time() + 2, '/');
                    break;
                }else{
                    setcookie('mensagem_erro', 'Erro ao modificar aluno. Verifique os dados e tente novamente.', time() + 2, '/');
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