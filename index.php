<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Cursos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div id="conteudo" class="container">
        <?php 

        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';

        switch ($pagina) {
            case 'home':
                include 'views/home.php';
                break;

            case 'cursos':
                include 'views/cursos.php';
                break;

            case 'inserir_curso':
                include 'views/inserir_curso.php';
                break;

            case 'alunos':
                include 'views/alunos.php';
                break;

            case 'inserir_aluno':
                include 'views/inserir_aluno.php';
                break;

            case 'matriculas':
                include 'views/matriculas.php';
                break;

            default:
                echo "<h2>Página não encontrada!</h2>";
                break;
        }
        ?>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
