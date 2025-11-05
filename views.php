<?php 
    include('layout/header.php');

    if(file_exists("src/views/$acao.view.php")) :
        include("src/views/$acao.view.php");
    else :
        include("layout/404.php");
    endif;

    include("layout/footer.php");