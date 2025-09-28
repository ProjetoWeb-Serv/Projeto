<?php

    if($acao == 'listar'){

        $acao = 'matriculas';
        require_once("views.php");
    }else if($acao == 'cadastrar'){

        $acao = 'inserir_matricula';
        require_once("views.php");
    }