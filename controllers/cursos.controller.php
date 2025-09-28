<?php

    if($acao == 'listar'){

        $acao = 'cursos';
    }else if($acao == 'cadastrar'){

        $acao = 'inserir_curso';
    }else if($acao == 'gravar'){

        $nome_curso = $_POST['nome_curso'];
        $carga_horaria = $_POST['carga_horaria'];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if(!empty($nome_curso) && !empty($carga_horaria)){
                $_SESSION['cursos'][] = [
                    'nome_curso' => $nome_curso,
                    'carga_horaria' => $carga_horaria
                ];
            }
        }

        header('Location: /cursos');
    }

    require_once("views.php");