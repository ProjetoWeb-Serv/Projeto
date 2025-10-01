<?php
include_once('models/Aluno.php');

if(!isset($_SESSION['alunos'])) {
    $aluno1 = new Aluno();
    $aluno1->__set('id', 1);
    $aluno1->__set('nome_aluno', 'Enzo');
    $aluno1->__set('data_nascimento', '2005-03-15');

    $aluno2 = new Aluno();
    $aluno2->__set('id', 2);
    $aluno2->__set('nome_aluno', 'Leo');
    $aluno2->__set('data_nascimento', '2004-07-22');

    $aluno3 = new Aluno();
    $aluno3->__set('id', 3);
    $aluno3->__set('nome_aluno', 'Joao');
    $aluno3->__set('data_nascimento', '2003-11-05');

    $aluno4 = new Aluno();
    $aluno4->__set('id', 4);
    $aluno4->__set('nome_aluno', 'Maria');
    $aluno4->__set('data_nascimento', '2005-01-30');

    $aluno5 = new Aluno();
    $aluno5->__set('id', 5);
    $aluno5->__set('nome_aluno', 'Ana');
    $aluno5->__set('data_nascimento', '2004-12-12');

    $_SESSION['alunos'] = [$aluno1, $aluno2, $aluno3, $aluno4, $aluno5];
}
