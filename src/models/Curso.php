<?php

    Class Curso{

        private $id;
        private $nome_curso;
        private $carga_horaria;

        public function __construct() {
            $this->nome_curso = "";
            $this->carga_horaria = 0;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function __get($atributo){
            return $this->$atributo;
        }
    }