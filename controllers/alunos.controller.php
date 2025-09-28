<?php

    if($acao == 'listar'){

        $acao = 'alunos';
        require_once("views.php");
    }else if($acao == 'cadastrar'){

        $acao = 'inserir_aluno';
        require_once("views.php");
    }