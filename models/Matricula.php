<?php
    require_once('Curso.php');    Class Matricula{

        private $id;
        private $nome_aluno;
        private $id_curso;

        public function __construct() {
            $this->nome_aluno = '';
            $this->id_curso = 0;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function buscarCursoNome(){
            foreach($_SESSION['cursos'] as $curso){
                if($curso->__get('id') == $this->id_curso){
                    return $curso->__get('nome_curso');
                }
            }
            return '';        
        }

        public function buscarCargaHoraria(){
            foreach($_SESSION['cursos'] as $curso){
                if($curso->__get('id') == $this->id_curso){
                    return $curso->__get('carga_horaria');
                }
            }
            return '';
        }
    }