<?php 
    require_once 'models/Curso.php';
    require_once 'models/Aluno.php';
    require_once 'models/Matricula.php';
    require_once 'models/Usuario.php';
    require_once 'data/usuarios.php';

    session_start();
    
    $pagina = substr($_SERVER['REQUEST_URI'], 1);  
    $rotas = explode('/', $pagina);
        
    $recurso = empty($rotas[0]) ? 'home' : $rotas[0];

    $acao = $rotas[1] ?? 'listar';

    $controller = "controllers/$recurso.controller.php";

    if(file_exists($controller)){
        require($controller);
    } else {
        require("controllers/404.controller.php");
    }
?>
