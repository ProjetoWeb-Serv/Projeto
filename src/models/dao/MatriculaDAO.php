<?php

namespace Projeto\Models\dao;

use Projeto\Connection;
use Projeto\Models\Matricula;

use PDO;

class MatriculaDAO {

    public static function inserir(Matricula $matricula) {
        $pdo = Connection::conectar();
        $sql = "INSERT INTO matriculas (aluno_id, curso_id) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $matricula->__get('aluno_id'),
            $matricula->__get('curso_id')
        ]);
    }

    public static function buscarMatriculaPorAluno(int $aluno_id) {
        $pdo = Connection::conectar();
        $stmt = $pdo->prepare("SELECT * FROM matriculas WHERE aluno_id = ?");
        $stmt->execute([$aluno_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return true;
        }

        return false;
    }

        public static function buscarMatriculaPorCurso(int $curso_id) {
        $pdo = Connection::conectar();
        $stmt = $pdo->prepare("SELECT * FROM matriculas WHERE curso_id = ?");
        $stmt->execute([$curso_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return true;
        }

        return false;
    }

    public static function buscarPorId(int $id) {
        $pdo = Connection::conectar();
        $stmt = $pdo->prepare("SELECT * FROM matriculas WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {

            $matricula = new Matricula();
            $matricula->__set('id', $result['id']);
            $matricula->__set('aluno_id', $result['aluno_id']);
            $matricula->__set('curso_id', $result['curso_id']);
            return $matricula;

        }

        return null;
    }

    // 🔹 READ (todos)
    public static function listarTodos() {
        $pdo = Connection::conectar();
        $stmt = $pdo->query("SELECT id, 
                            aluno_id, 
                            curso_id
                            FROM matriculas ORDER BY id ASC");
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $matriculas = [];

        foreach($result as $row) {
            $matricula = new Matricula();
            $matricula->__set('id', $row['id']);
            $matricula->__set('aluno_id', $row['aluno_id']);
            $matricula->__set('curso_id', $row['curso_id']);
            $matriculas[] = $matricula;
        }
            
        return $matriculas;
    }

    // 🔹 UPDATE
    public static function atualizar(Matricula $matricula) {
        $pdo = Connection::conectar();
        $sql = "UPDATE matriculas SET aluno_id = ?, curso_id = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $matricula->__get('aluno_id'),
            $matricula->__get('curso_id'),
            $matricula->__get('id')
        ]);
    }

    // 🔹 DELETE
    public static function excluir(int $id) {
        $pdo = Connection::conectar();
        $stmt = $pdo->prepare("DELETE FROM matriculas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}