<?php

    if($acao == 'listar'){

        $acao = 'matriculas';

    }elseif($acao == 'cadastrar'){

        $acao = 'inserir_matricula';

    }elseif($acao == 'gravar'){

        $nome_aluno = $_POST['nome_aluno'];
        $nome_curso = $_POST['nome_curso'];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if(!empty($nome_aluno) && !empty($nome_curso)){
                $_SESSION['matriculas'][] = [
                    'nome_aluno' => $nome_aluno,
                    'nome_curso' => $nome_curso
                ];
            }
        }

        header('Location: /matriculas');
    }else{

        $acao = '404';
    }

    require_once("views.php");