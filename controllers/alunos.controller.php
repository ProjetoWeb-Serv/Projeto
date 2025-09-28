<?php
 
    if($acao == 'listar'){

        $acao = 'alunos';

    }else if($acao == 'cadastrar'){

        $acao = 'inserir_aluno';

    }else if($acao == 'gravar'){

        $nome_aluno = $_POST['nome_aluno'];
        $data_nascimento = $_POST['data_nascimento'];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if(!empty($nome_aluno) && !empty($data_nascimento)){
                $_SESSION['alunos'][] = [
                    'nome_aluno' => $nome_aluno,
                    'data_nascimento' => $data_nascimento
                ];
            }
        }

        echo 'Aluno inserido com sucesso!';
        echo $_SESSION['alunos'][0]['nome_aluno'];
        echo $_SESSION['alunos'][0]['data_nascimento'];

        header('Location: /alunos');
        $acao = 'alunos';
    }

    require_once("views.php");