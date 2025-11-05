<?php
    use Projeto\Models\Matricula;

    if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
        header('Location: /login');
        exit();
    }

    if($acao == 'listar'){

        $acao = 'matriculas';

    }elseif($acao == 'cadastrar'){

        $acao = 'inserir_matricula';

    }elseif($acao == 'gravar'){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
            if(!isset($_SESSION['matricula_id'])){
                $_SESSION['matricula_id'] = 4;
            }
    
            $Matricula = new Matricula();
            $Matricula->__set('id_aluno', $_POST['id_aluno']);
            $Matricula->__set('id_curso', $_POST['id_curso']);
            $Matricula->__set('id', $_SESSION['matricula_id']);
            
            if($Matricula->__get('id_aluno') != '' && $Matricula->__get('id_curso') != 0){
                $_SESSION['matriculas'][] = $Matricula;
                $_SESSION['matricula_id']++;
                setcookie('mensagem', 'matricula feita com Sucesso!', time() + 2, '/');
            }else{
                setcookie('mensagem_erro', 'Erro ao fazer matrícula. Verifique os dados e tente novamente.', time() + 2, '/');
            }
        }

        header('Location: /matriculas');
    }else if(str_contains($acao, 'deletar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            $deletado = false;

            foreach($_SESSION['matriculas'] as $index => $matricula){
                if($matricula->__get('id') == $_GET['id']){
                    
                    $_SESSION['matriculas'][$index] = null;
                    $_SESSION['matriculas'] = array_filter($_SESSION['matriculas']);
                    setcookie('mensagem', 'Matricula deletada com Sucesso!', time() + 2, '/');
                    $deletado = true;
                    break;
                }
            }

            if($deletado !== true){
                setcookie('mensagem_erro', 'Erro ao deletar Matricula.', time() + 2, '/');
            }
        }
        header('Location: /matriculas');
    }else if($acao == 'modificar' && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $deletado = false;

            foreach($_SESSION['matriculas'] as $index => $matricula){
                if($matricula->__get('id') == $_POST['id']){
                    $matricula->__set('id_aluno', $_POST['id_aluno']);
                    $matricula->__set('id_curso', $_POST['id_curso']);
                    $_SESSION['matriculas'][$index] = $matricula;
                    $deletado = true;
                    setcookie('mensagem', 'Matricula modificada com Sucesso!', time() + 2, '/');
                    break;
                }
            }

            if($deletado !== true){
                setcookie('mensagem_erro', 'Erro ao modificar Matricula. Verifique os dados e tente novamente.', time() + 2, '/');
            }
        }

        header('Location: /matriculas');
    }else if(str_contains($acao, 'editar') && $_SESSION['role'] == 'admin'){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            $Matricula = new Matricula();

            $acao = 'editar_matricula';
            
            foreach($_SESSION['matriculas'] as $matricula){
                if($matricula->__get('id') == $_GET['id']){
                    $Matricula = $matricula;
                    break;
                }
            }
        }
    }else{

        $acao = '404';
    }

    require_once("views.php");