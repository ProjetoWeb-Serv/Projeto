<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Cursos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
      
      <?php 

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
</body>
</html>
