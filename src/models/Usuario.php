<?php  
    class Usuario{
        private $role;
        private $nome;
        private $senha;

        public function __construct() {
            $this->nome = "";
            $this->senha = "";
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function __get($atributo){
            return $this->$atributo;
        }
    }