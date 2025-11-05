<?php 

    require 'vendor/autoload.php';
    
    session_start();
    
    $pagina = substr($_SERVER['REQUEST_URI'], 1);  
    $rotas = explode('/', $pagina);
        
    $recurso = empty($rotas[0]) ? 'home' : $rotas[0];

    $acao = $rotas[1] ?? 'listar';

    $controller = "src/controllers/$recurso.controller.php";

    if(file_exists($controller)){
        require($controller);
    } else {
        require("src/controllers/404.controller.php");
    }
?>
