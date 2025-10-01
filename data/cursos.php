<?php
include_once('models/Curso.php');

if(!isset($_SESSION['cursos'])) {
    $curso1 = new Curso();
    $curso1->__set('id', 1);
    $curso1->__set('nome_curso', 'Engenharia de Software');
    $curso1->__set('carga_horaria', 3600); // em horas

    $curso2 = new Curso();
    $curso2->__set('id', 2);
    $curso2->__set('nome_curso', 'Medicina');
    $curso2->__set('carga_horaria', 4800);

    $curso3 = new Curso();
    $curso3->__set('id', 3);
    $curso3->__set('nome_curso', 'Direito');
    $curso3->__set('carga_horaria', 3000);

    $curso4 = new Curso();
    $curso4->__set('id', 4);
    $curso4->__set('nome_curso', 'Administração');
    $curso4->__set('carga_horaria', 3200);

    $curso5 = new Curso();
    $curso5->__set('id', 5);
    $curso5->__set('nome_curso', 'Arquitetura e Urbanismo');
    $curso5->__set('carga_horaria', 3500);


    $_SESSION['cursos'] = [$curso1, $curso2, $curso3, $curso4, $curso5];
}
