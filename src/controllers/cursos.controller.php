<?php
    use Projeto\Models\Curso;

    if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
        header('Location: /login');
        exit();
    }

    if($acao == 'listar'){

        $acao = 'cursos';
    }else if($acao == 'cadastrar'){

        $acao = 'inserir_curso';
    }else if($acao == 'gravar'){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            if(!isset($_SESSION['cursos'])){
                $_SESSION['cursos'] = [];
            }
            if(!isset($_SESSION['curso_id'])){
                $_SESSION['curso_id'] = 6;
            }
            
            $Curso = new Curso();
            $Curso->__set('nome_curso', $_POST['nome_curso']);
            $Curso->__set('carga_horaria', $_POST['carga_horaria']);
            $Curso->__set('id', $_SESSION['curso_id']);
            if($Curso->__get('nome_curso') != '' && $Curso->__get('carga_horaria') != 0){
                $_SESSION['cursos'][] = $Curso;
                $_SESSION['curso_id']++;
                setcookie('mensagem', 'Curso cadastrado com Sucesso!', time() + 2, '/');
            }else{
                setcookie('mensagem_erro', 'Erro ao cadastrar curso. Verifique os dados e tente novamente.', time() + 2, '/');
            }
        }


        header('Location: /cursos');
    }else if(str_contains($acao, 'deletar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            $deletado = false;

            foreach($_SESSION['cursos'] as $index => $curso){
                if($curso->__get('id') == $_GET['id']){
                    foreach($_SESSION['matriculas'] as $matricula){
                        if($matricula->__get('id_curso') == $curso->__get('id')){
                            setcookie('mensagem_erro', 'Erro ao deletar curso. Existem matrículas vinculadas a este curso.', time() + 2, '/');
                            header('Location: /cursos');
                            $deletado = true;
                            exit();
                        }
                    }
                    $_SESSION['cursos'][$index] = null;
                    $_SESSION['cursos'] = array_filter($_SESSION['cursos']);
                    setcookie('mensagem', 'Curso deletado com Sucesso!', time() + 2, '/');
                    break;
                }
            }

            if($deletado !== true){
                setcookie('mensagem_erro', 'Erro ao deletar Curso.', time() + 2, '/');
            }
        }
        header('Location: /cursos');
    }else if($acao == 'modificar' && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $deletado = false;

            foreach($_SESSION['cursos'] as $index => $curso){
                if($curso->__get('id') == $_POST['id']){
                    $curso->__set('nome_curso', $_POST['nome_curso']);
                    $curso->__set('carga_horaria', $_POST['carga_horaria']);
                    $_SESSION['cursos'][$index] = $curso;
                    setcookie('mensagem', 'Curso modificado com Sucesso!', time() + 2, '/');
                    $deletado = true;
                    break;
                }
            }

            if($deletado !== true){
                setcookie('mensagem_erro', 'Erro ao modificar Curso. Verifique os dados e tente novamente.', time() + 2, '/');
            }
        }

        header('Location: /cursos');
    }else if(str_contains($acao, 'editar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            $Curso = new Curso();

            $acao = 'editar_curso';

            foreach($_SESSION['cursos'] as $curso){

                if($curso->__get('id') == $_GET['id']){
                    $Curso = $curso;
                    break;
                }
            }
        }
    
    }else{

        $acao = '404';
    }

    require_once("views.php");