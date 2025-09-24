<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (!empty($errors)): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post">
        <label>Email: <input type="text" name="email" value="<?= htmlspecialchars($email) ?>"></label><br><br>
        <label>Senha: <input type="password" name="password"></label><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
