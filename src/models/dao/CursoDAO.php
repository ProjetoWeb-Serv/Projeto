<?php

namespace Projeto\Models\dao;
use Projeto\Connection;
use Projeto\Models\Curso;

class CursoDAO {
     //crud
        
        public static function create(Curso $curso){

            $pdo = Connection::conectar();
            if($curso->id == null)
            //inserção
            {
                $stmt = $pdo->prepare("INSERT INTO cursos (nome_curso, carga_horaria) VALUES (?, ?)");

                $stmt->execute([$curso->__get('nome_curso'), $curso->__get('carga_horaria')]);
            }
            else
            {
            //atualização
                $stmt = $pdo->prepare("UPDATE cursos SET nome_curso = ?, carga_horaria = ? WHERE id = ?");

                 $stmt->execute([$curso->nome_curso, $curso->carga_horaria, $curso->id]);
            }
        }

        public function listAll(){

            $pdo = Connection::conectar();
            $stmt = $pdo->query("SELECT * FROM cursos");
            $cursos = [];
            
            while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
                $curso = new Curso();
                $curso->__set('id', $row['id']);
                $curso->__set('nome_curso', $row['nome_curso']);
                $curso->__set('carga_horaria', $row['carga_horaria']);
                $cursos[] = $curso;
            }

            return $cursos;
        }

        public function delete(int $id):bool{

            $pdo = Connection::conectar();
            $stmt = $pdo->prepare("DELETE FROM cursos WHERE id = ?");
            return $stmt->execute([$id]);
        }

        public function findById(int $id){

            $pdo = Connection::conectar();
            $stmt = $pdo->prepare("SELECT * FROM cursos WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);


            if($row){
                $curso = new Curso();
                $curso->__set('nome_curso', $row['nome_curso']);
                $curso->__set('carga_horaria', $row['carga_horaria']);
                return $curso;
            }

            return null;
        }
    
    }

