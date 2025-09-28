<?php

    if($acao == 'listar'){

        $acao = 'matriculas';
    }else if($acao == 'cadastrar'){

        $acao = 'inserir_matricula';
    }

    require_once("views.php");