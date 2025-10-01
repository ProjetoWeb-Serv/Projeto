<?php
include_once('models/Matricula.php');

if(!isset($_SESSION['matriculas'])) {

    $matricula1 = new Matricula();
    $matricula1->__set('id', 1);
    $matricula1->__set('id_aluno', 1); 
    $matricula1->__set('id_curso', 1);

    $matricula2 = new Matricula();
    $matricula2->__set('id', 2);
    $matricula2->__set('id_aluno', 2);
    $matricula2->__set('id_curso', 2);

    $matricula3 = new Matricula();
    $matricula3->__set('id', 3);
    $matricula3->__set('id_aluno', 3);
    $matricula3->__set('id_curso', 3);

    $_SESSION['matriculas'] = [$matricula1, $matricula2, $matricula3];
}
