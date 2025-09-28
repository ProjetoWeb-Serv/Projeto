<?php

    if($acao == 'listar'){

        $acao = 'cursos';
        require_once("views.php");
    }else if($acao == 'cadastrar'){

        $acao = 'inserir_curso';
        require_once("views.php");
    }