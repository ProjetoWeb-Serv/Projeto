<?php

    $path = $_SERVER['REQUEST_URI'] ?? 'index';

    $parts = explode('/', $path);

    $recurso = "Controllers/$parts[1].controller.php";

    if(file_exists($recurso)){
        require($recurso);
    }else{
        echo "$recurso" . " não encontrado";
    }