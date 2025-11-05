<?php

namespace Projeto\Models\dao;
use Projeto\Connection;
use Projeto\Models\Curso;

class CursoDAO {
     //crud
        
        public static function save(Curso $curso){

            $pdo = Connection::conectar();
            if($curso->id == null)
            //inserção
            {
                $stmt = $pdo->prepare("INSERT INTO cursos (nome_curso, carga_horaria) VALUES (?, ?)");

                $stmt->execute([$curso->__get('nome_curso'), $curso->__get('carga_horaria')]);
            }
        }

        public static function listAll(){

            $pdo = Connection::conectar();
            $stmt = $pdo->query("SELECT id, nome_curso, carga_horaria FROM cursos");
            $cursos = [];
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
           foreach($result as $row){
                $curso = new Curso();
                $curso->__set('id', $row['id']);
                $curso->__set('nome_curso', $row['nome_curso']);
                $curso->__set('carga_horaria', $row['carga_horaria']);
                $cursos[] = $curso;
            }
            return $cursos;
        }

        
        public static function delete(int $id):bool{

            $pdo = Connection::conectar();
            $stmt = $pdo->prepare("DELETE FROM cursos WHERE id = ?");
            return $stmt->execute([$id]);
        }
        
        public static function findById(int $id){
            
            $pdo = Connection::conectar();
            $stmt = $pdo->prepare("SELECT * FROM cursos WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            
            if($row){
                $curso = new Curso();
                $curso->__set('id', $row['id']);
                $curso->__set('nome_curso', $row['nome_curso']);
                $curso->__set('carga_horaria', $row['carga_horaria']);
                return $curso;
            }
            
            return null;
        }
        
        public static function update(Curso $curso):bool{
            
            $pdo = Connection::conectar();
            $sql = "UPDATE cursos SET nome_curso = ?, carga_horaria = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            return $stmt->execute([
                $curso->__get('nome_curso'),
                $curso->__get('carga_horaria'),
                $curso->__get('id')
            ]);
        }

        public static function buscarNomeCursoById(int $id){
            $pdo = Connection::conectar();
            $stmt = $pdo->prepare("SELECT nome_curso FROM cursos WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
    
            if($row){
    
                return $row['nome_curso'];
            }
    
            return '';
        }

        public static function buscarCargaHorariaById(int $id){
            $pdo = Connection::conectar();
            $stmt = $pdo->prepare("SELECT carga_horaria FROM cursos WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);

            if($row){

                return $row['carga_horaria'];
            }

            return '';
        }
    
    }
    
    