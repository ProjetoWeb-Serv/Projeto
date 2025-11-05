<?php
namespace Projeto\Models;
    class Aluno {

        private $id;
        private $nome_aluno;
        private $data_nascimento;

        public function __construct() {
            $this->nome_aluno = '';
            $this->data_nascimento = '';
        }

        public function __set($atributo, $valor)
        {
            $this->$atributo = $valor;
        }

        public function __get($atributo)
        {
            return $this->$atributo;
        }
    }