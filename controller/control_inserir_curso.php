<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Curso Inserido</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div id="conteudo" class="container">
        <?php
        $nome_curso = $_POST['nome_curso'] ?? '';
        $carga_horaria = $_POST['carga_horaria'] ?? '';
        
        echo "<h2>Curso inserido com sucesso!</h2>";
        echo "<p><strong>Nome do curso:</strong> $nome_curso</p>";
        echo "<p><strong>Carga horária:</strong> $carga_horaria horas</p>";
        echo '<br><a href="?pagina=alunos">Voltar para Cursos</a>';
        ?>
    </div>

</body>
</html>