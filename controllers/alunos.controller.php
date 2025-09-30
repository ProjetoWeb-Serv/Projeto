<?php

    if($acao == 'listar'){

        $acao = 'alunos';
        
    }else if($acao == 'cadastrar'){

        $acao = 'inserir_aluno';

    }else if($acao == 'gravar'){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            require_once('models/Aluno.php');

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
    }

    require_once("views.php");