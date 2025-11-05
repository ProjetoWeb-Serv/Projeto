<?php
    use Projeto\Models\Aluno;
    use Projeto\Models\dao\AlunoDAO;
    use Projeto\Models\dao\MatriculaDAO;

    if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
        header('Location: /login');
        exit();
    }

    if($acao == 'listar'){

        try{

            $alunos = AlunoDAO::listarTodos();

        }catch(Exception $e){

            setcookie('mensagem_erro', 'Erro ao listar alunos. Erro: '. $e->getMessage(), time() + 2, '/');
            $alunos = [];

        }

        $acao = 'alunos';
        
    }else if($acao == 'cadastrar'){

        $acao = 'inserir_aluno';

    }else if($acao == 'gravar'){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $Aluno = new Aluno();
            $Aluno->__set('nome_aluno', $_POST['nome_aluno']);
            $Aluno->__set('data_nascimento', $_POST['data_nascimento']);

            if($Aluno->__get('nome_aluno') != '' && $Aluno->__get('data_nascimento') != ''){

                try{

                    AlunoDAO::inserir($Aluno);
                    setcookie('mensagem', 'Aluno cadastrado com Sucesso!', time() + 2, '/');

                }catch(Exception $e){
                    setcookie('mensagem_erro', 'Erro ao cadastrar aluno. Erro: '. $e->getMessage(), time() + 2, '/');
                }
            }else{
                setcookie('mensagem_erro', 'Erro ao cadastrar aluno. Verifique os dados e tente novamente.', time() + 2, '/');
            }

        }

        header('Location: /alunos');
    }else if(str_contains($acao, 'deletar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            try{

                $aluno = AlunoDAO::buscarPorId($_GET['id']);

                if($aluno === null){
                    throw new Exception('Aluno não encontrado.');
                }

                if(MatriculaDAO::buscarMatriculaPorAluno($aluno->__get('id')) != null){
                    throw new Exception('Não é possível deletar o aluno pois ele possui matrículas vinculadas.');
                }

                AlunoDAO::excluir($aluno->__get('id'));

                setcookie('mensagem', 'Aluno deletado com Sucesso!', time() + 2, '/');


            }catch(Exception $e){
                setcookie('mensagem_erro', 'Erro ao deletar aluno. Erro: '. $e->getMessage(), time() + 2, '/');
            }
            
        }

        header('Location: /alunos');

    }else if($acao == 'modificar' && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            try{

                $aluno = AlunoDAO::buscarPorId($_POST['id']);

                if($aluno === null){
                    throw new Exception('Aluno não encontrado.');
                }

                $aluno->__set('nome_aluno', $_POST['nome_aluno']);
                $aluno->__set('data_nascimento', $_POST['data_nascimento']);
                        
                if($aluno->__get('nome_aluno') == '' || strlen($aluno->__get('data_nascimento')) > 10 || strlen($aluno->__get('data_nascimento')) < 10){

                    setcookie('mensagem_erro', 'Erro ao modificar aluno. Verifique os dados e tente novamente.', time() + 2, '/');

                    header('Location: /alunos');
                }

                AlunoDAO::atualizar($aluno);

                setcookie('mensagem', 'Aluno modificado com Sucesso!', time() + 2, '/');

            }catch(Exception $e){
                setcookie('mensagem_erro', 'Erro ao modificar aluno. Erro: '. $e->getMessage(), time() + 2, '/');
            }
        }

        header('Location: /alunos');

    }else if(str_contains($acao, 'editar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            $Aluno = new Aluno();

            $acao = 'editar_aluno';

            try{
                $aluno = AlunoDAO::buscarPorId($_GET['id']);

                if($aluno === null){
                        throw new Exception('Aluno não encontrado.');
                }

                $Aluno = $aluno;

            }catch(Exception $e){
                setcookie('mensagem_erro', 'Erro ao buscar aluno. Erro: '. $e->getMessage(), time() + 2, '/');
                header('Location: /alunos');
            }

        }
    }else{

        $acao = '404';
    }


    require_once("views.php");