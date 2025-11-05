<?php
$_SESSION['logado'] = false;
$_SESSION['usuario'] = null;
$_SESSION['role'] = null;

setcookie('mensagem', 'Logout efetuado com sucesso!', time() + 2, '/');

header('Location: /login');