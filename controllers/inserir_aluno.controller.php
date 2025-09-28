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
        $nome_aluno = $_POST['nome_aluno'] ?? '';
        $data_nascimento = $_POST['data_nascimento'] ?? '';
        
        echo "<h2>Curso inserido com sucesso!</h2>";
        echo "<p><strong>Nome do aluno:</strong> $nome_aluno</p>";
        echo "<p><strong>Data de nascimento:</strong> $data_nascimento</p>";
        echo '<br><a href="?pagina=cursos">Voltar para Alunos</a>';
        ?>
    </div>

</body>
</html>