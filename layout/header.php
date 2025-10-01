<link rel="stylesheet" href="/css/style.css">

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Cursos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<header>
    <div class="container">
        <a href="/"><img src="/assets/dog.png" title="Logo" alt="Logo"></a>
        <div id="menu">
            <a href="/cursos">Cursos</a>
            <a href="/alunos">Alunos</a>
            <a href="/matriculas">Matrículas</a>
            <?php
                if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
                    echo '<a href="/logout">Sair</a>';
                }else{
                    echo '<a href="/login">Login</a>';
                }
            ?>
        </div>
    </div>
</header>