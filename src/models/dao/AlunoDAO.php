<?php

namespace Projeto\Models\dao;

use Projeto\Connection;
use Projeto\Models\Aluno;
use PDO;

class AlunoDAO {

    public static function inserir(Aluno $aluno) {
        $pdo = Connection::conectar();
        $sql = "INSERT INTO alunos (nome_aluno, data_nascimento) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $aluno->__get('nome_aluno'),
            $aluno->__get('data_nascimento')
        ]);
    }

    // 🔹 READ (todos)
    public static function listarTodos() {
        $pdo = Connection::conectar();
        $stmt = $pdo->query("SELECT id, 
                            nome_aluno, 
                            DATE_FORMAT(data_nascimento, '%d/%m/%Y') AS data_nascimento 
                            FROM alunos ORDER BY id ASC");
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row) {
            $Aluno = new Aluno();
            $Aluno->__set('id', $row['id']);
            $Aluno->__set('nome_aluno', $row['nome_aluno']);
            $Aluno->__set('data_nascimento', $row['data_nascimento']);
            $alunos[] = $Aluno;
        }

        return $alunos;
    }

    // 🔹 READ (um só)
    public static function buscarPorId(int $id) {
        $pdo = Connection::conectar();
        $stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔹 UPDATE
    public static function atualizar(Aluno $aluno) {
        $pdo = Connection::conectar();
        $sql = "UPDATE alunos SET nome_aluno = ?, data_nascimento = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $aluno->__get('nome_aluno'),
            $aluno->__get('data_nascimento'),
            $aluno->__get('id')
        ]);
    }

    // 🔹 DELETE
    public static function excluir(int $id) {
        $pdo = Connection::conectar();
        $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}