<?php

    namespace Projeto\Models;

    use Projeto\Connection;
    Class Curso{

        private $id;
        private $nome_curso;
        private $carga_horaria;

        public function __construct() {
            $this->nome_curso = "";
            $this->carga_horaria = 0;
        }

    //get e set
        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function __get($atributo){
            return $this->$atributo;
        }
    //crud
        
        public function create():bool{

            $pdo = Connection::conectar();
            if($this->id == null)
            //inserção
            {
                $stmt = $pdo->prepare("INSER INTO cursos (nome_curso, carga_horaria) VALUES (?, ?)");

                return $stmt->execute([$this->nome_curso, $this->carga_horaria]);
            }
            else
            {
            //atualização
                $stmt = $pdo->prepare("UPDATE cursos SET nome_curso = ?, carga_horaria = ? WHERE id = ?");

                return $stmt->execute([$this->nome_curso, $this->carga_horaria, $this->id]);
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

        public function delete():bool{

            $pdo = Connection::conectar();
            $stmt = $pdo->prepare("DELETE FROM cursos WHERE id = ?");
            return $stmt->execute([$this->id]);
        }

        public function findById(){

            $pdo = Connection::conectar();
            $stmt = $pdo->prepare("SELECT * FROM cursos WHERE id = ?");
            $stmt->execute([$this->id]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);

            if($row){
                $this->__set('nome_curso', $row['nome_curso']);
                $this->__set('carga_horaria', $row['carga_horaria']);
                return $this;
            }

            return null;
        }
    
    };

   