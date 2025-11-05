<?php

namespace Projeto\Models\dao;

use Projeto\Connection;

use PDO;

class UsuarioDAO {

    public static function login(string $nome, string $senha){
        $pdo = Connection::conectar();
        $stmt = $pdo->prepare("SELECT role, nome, senha FROM usuarios WHERE nome = ? AND senha = ?");
        $stmt->execute([$nome, $senha]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $nome;
            $_SESSION['role'] = $row['role'];
            return true;
        }
        return false;
    }
}