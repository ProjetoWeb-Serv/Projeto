<?php
    namespace Projeto\Models;

    use Projeto\Models\Aluno;
    use Projeto\Models\Curso;
    use Projeto\Models\dao\AlunoDAO;
    use Projeto\Models\dao\CursoDAO;

    Class Matricula{

        private $id;
        private $aluno_id;
        private $curso_id;

        public function __construct() {
            $this->aluno_id = 0;
            $this->curso_id = 0;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function buscarNomeAluno(){
            
            return AlunoDAO::buscarNomeAlunoById($this->aluno_id);

        }   

        public function buscarCursoNome(){
            
            return CursoDAO::buscarNomeCursoById($this->curso_id);

        }

        public function buscarCargaHoraria(){

            return CursoDAO::buscarCargaHorariaById($this->curso_id);

        }
    }