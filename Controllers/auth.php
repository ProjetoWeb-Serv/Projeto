<?php


function login() {

    $errors = [];
    $email = '';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';


        if ($email == '') {
            $errors[] = "Email obrigatório";
        }

        if ($password == '') {
            $errors[] = "Senha obrigatória";
        }

        if (empty($errors)) {

            if ($email === 'teste@teste.com' && $password === '123456') {
                session_start();
                $_SESSION['user'] = $email;
                header("Location: /");
                exit;
            } else {
                $errors[] = "Email ou senha incorretos";
            }
        }
    }


    require __DIR__ . '/../Views/auth/login.php';
}
