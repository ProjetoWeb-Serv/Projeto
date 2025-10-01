<?php
include_once('models/Usuario.php');

$Usuarios = [];
$usuario1 = new Usuario();
$usuario1->__set('role', 'admin');
$usuario1->__set('nome', 'admin');
$usuario1->__set('senha', 'admin123');

$usuario2 = new Usuario();
$usuario2->__set('role', 'user');
$usuario2->__set('nome', 'enzo');
$usuario2->__set('senha', 'enzo123');

$usuario3 = new Usuario();
$usuario3->__set('role', 'user');
$usuario3->__set('nome', 'leo');
$usuario3->__set('senha', 'leo123');

$usuario4 = new Usuario();
$usuario4->__set('role', 'user');
$usuario4->__set('nome', 'joao');
$usuario4->__set('senha', 'joao123');

$Usuarios[] = [$usuario1, $usuario2, $usuario3, $usuario4];