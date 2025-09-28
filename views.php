<?php 
    include('layout/header.php');

    if(file_exists("views/$acao.view.php")) :
        include("views/$acao.view.php");
    else :
        include("layout/404.php");
    endif;

    include("layout/footer.php");