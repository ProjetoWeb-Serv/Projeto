<?php

    if($acao == 'listar'){

        $acao = 'matriculas';

    }elseif($acao == 'cadastrar'){

        $acao = 'inserir_matricula';

    }elseif($acao == 'gravar'){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            require_once __DIR__ . '/../models/Curso.php';
            require_once __DIR__ . '/../models/Matricula.php';
    
            $id_curso = 0;
            foreach($_SESSION['cursos'] as $curso){
                if($curso->__get('nome_curso') == $_POST['nome_curso']){
                    $id_curso = $curso->__get('id');
                };
            }
    
            if(!isset($_SESSION['id_curso'])){
                $_SESSION['id_curso'] = $id_curso;
            };
    
            if(!isset($_SESSION['matricula_id'])){
                $_SESSION['matricula_id'] = 1;
            }
    
            $Matricula = new Matricula();
            $Matricula->__set('nome_aluno', $_POST['nome_aluno']);
            $Matricula->__set('id_curso', $_SESSION['id_curso']);
            $Matricula->__set('id', $_SESSION['matricula_id']);
            
            if($Matricula->__get('nome_aluno') != '' && $Matricula->__get('id_curso') != 0){
                   $_SESSION['matriculas'][] = $Matricula;
                   $_SESSION['matricula_id']++;
               }
        }

        header('Location: /matriculas');
    }else{

        $acao = '404';
    }

    require_once("views.php");