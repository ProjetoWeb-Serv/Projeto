<link rel="stylesheet" href="/css/login.css">

<?php
    if(isset($_COOKIE['mensagem_falha'])){
        echo '<p class="error_login">' . htmlspecialchars($_COOKIE['mensagem_falha']) . '</p>';
    }
?>

<form class="login-form" method="POST" action="/login/autenticar">
    <input class="login-input" type="text" name="nome" placeholder="Nome" required>
    <input class="login-input" type="password" name="senha" placeholder="Senha" required>
    <button class="login-button" type="submit">Entrar</button>
</form>