<?php

    if($acao == 'listar'){

        $acao = 'cursos';
    }else if($acao == 'cadastrar'){

        $acao = 'inserir_curso';
    }

    require_once("views.php");