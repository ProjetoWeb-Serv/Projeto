<?php

    use Projeto\Models\Matricula;
    use Projeto\Models\dao\MatriculaDAO;
    use Projeto\Models\dao\AlunoDAO;
    use Projeto\Models\dao\CursoDAO;

    if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
        header('Location: /login');
        exit();
    }

    if($acao == 'listar'){

        try{

            $matriculas = MatriculaDAO::listarTodos();

        }catch(Exception $e){

            setcookie('mensagem_erro', 'Erro ao listar matriculas. Erro:'. $e->getMessage(), time() + 2, '/');
            $matriculas = [];

        }


        $acao = 'matriculas';

    }elseif($acao == 'cadastrar'){

        try{
            $alunos = AlunoDAO::listarTodos();
            $cursos = CursoDAO::listAll();

        }catch(Exception $e){

            setcookie('mensagem_erro', 'Erro ao carregar formulário de matrícula. Erro:'. $e->getMessage(), time() + 2, '/');
            header('Location: /matriculas');
        }

        $acao = 'inserir_matricula';

    }elseif($acao == 'gravar'){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $Matricula = new Matricula();
            $Matricula->__set('aluno_id', $_POST['aluno_id']);
            $Matricula->__set('curso_id', $_POST['curso_id']);

            if($Matricula->__get('aluno_id') != 0 && $Matricula->__get('curso_id') != 0){

                try{

                    MatriculaDAO::inserir($Matricula);

                    setcookie('mensagem', 'matricula feita com Sucesso!', time() + 2, '/');

                }catch(Exception $e){

                    setcookie('mensagem_erro', 'Erro ao fazer matrícula. Erro:'. $e->getMessage(), time() + 2, '/');

                }

            }else{
                setcookie('mensagem_erro', 'Erro ao fazer matrícula. Verifique os dados e tente novamente.', time() + 2, '/');
            }
        }

        header('Location: /matriculas');

    }else if(str_contains($acao, 'deletar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            try{

                $matricula = MatriculaDAO::buscarPorId($_GET['id']);

                MatriculaDAO::excluir($matricula->__get('id'));

                setcookie('mensagem', 'Matrícula deletada com Sucesso!', time() + 2, '/');

            }catch(Exception $e){

                setcookie('mensagem_erro', 'Erro ao deletar matrícula. Erro:'. $e->getMessage(), time() + 2, '/');

                header('Location: /matriculas');
            }
        }

        header('Location: /matriculas');

    }else if($acao == 'modificar' && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            try{

                $matricula = MatriculaDAO::buscarPorId($_POST['id']);
                
                $matricula->__set('aluno_id', $_POST['id_aluno']);
                $matricula->__set('curso_id', $_POST['id_curso']);
                
                MatriculaDAO::atualizar($matricula);

                setcookie('mensagem', 'Matrícula modificada com Sucesso!', time() + 2, '/');

            }catch(Exception $e){

                setcookie('mensagem_erro', 'Erro ao modificar matrícula. Erro:'. $e->getMessage(), time() + 2, '/');

            }

        }

        header('Location: /matriculas');

    }else if(str_contains($acao, 'editar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            $acao = 'editar_matricula';
            
            try{

                $Matricula = MatriculaDAO::buscarPorId($_GET['id']);

                $alunos = AlunoDAO::listarTodos();
                $cursos = CursoDAO::listAll();

            }catch(Exception $e){

                setcookie('mensagem_erro', 'Erro ao buscar matrícula. Erro:'. $e->getMessage(), time() + 2, '/');

                header('Location: /matriculas');
            }
        }
    }else{

        $acao = '404';
    }

    require_once("views.php");