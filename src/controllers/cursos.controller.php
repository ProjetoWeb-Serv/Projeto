<?php
    use Projeto\Models\Curso;
    use Projeto\Models\dao\CursoDAO;

    if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
        header('Location: /login');
        exit();
    }

    if($acao == 'listar'){

        try 
        {
            $cursos = CursoDAO::listAll();
        } catch (\Throwable $th) 
        {
            setcookie('mensagem_erro', 'Erro ao listar cursos. Tente novamente mais tarde.', time() + 2, '/');
            $cursos = [];
        }

        $acao = 'cursos';
    }else if($acao == 'cadastrar'){

        $acao = 'inserir_curso';
    }else if($acao == 'gravar'){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $Curso = new Curso();
            $Curso->__set('nome_curso', $_POST['nome_curso']);
            $Curso->__set('carga_horaria', $_POST['carga_horaria']);
            $Curso->__set('id', $_SESSION['curso_id']);
            
            if($Curso->__get('nome_curso') != '' && $Curso->__get('carga_horaria') != 0){
                
                CursoDAO::save($Curso);
                setcookie('mensagem', 'Curso cadastrado com Sucesso!', time() + 2, '/');
            }else{
                setcookie('mensagem_erro', 'Erro ao cadastrar curso. Verifique os dados e tente novamente.', time() + 2, '/');
            }
        }


        header('Location: /cursos');
    }else if(str_contains($acao, 'deletar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            try {
                $curso = CursoDAO::findById($_GET['id']);
                if($curso){
                    CursoDAO::delete($_GET['id']);
                    setcookie('mensagem', 'Curso deletado com Sucesso!', time() + 2, '/');
                }
              
            } catch (\Throwable $th) {
                    setcookie('mensagem_erro', 'Curso inexistente ou já deletado!', time() + 2, '/');
            }
        }
        header('Location: /cursos');
    }else if($acao == 'modificar' && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            try {
                $curso = CursoDAO::findById($_POST['id']);
    
                if($curso){

                    $curso->__set('nome_curso', $_POST['nome_curso']);
                    $curso->__set('carga_horaria', $_POST['carga_horaria']);
                    
                    CursoDAO::update($curso);

                    setcookie('mensagem', 'Curso modificado com Sucesso!', time() + 2, '/');
                }
            } catch (\Throwable $th) {
                setcookie('mensagem_erro', 'Curso inexistente!', time() + 2, '/');
            }

            
        }

        header('Location: /cursos');
    }else if(str_contains($acao, 'editar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            try {
                $Curso = CursoDAO::findById($_GET['id']);
                if($Curso){
                    $acao = 'editar_curso';
                }
            } catch (\Throwable $th) {
                setcookie('mensagem_erro', 'Curso inexistente ou já deletado!', time() + 2, '/');
            }
        }
    
    }else{

        $acao = '404';
    }

    require_once("views.php");