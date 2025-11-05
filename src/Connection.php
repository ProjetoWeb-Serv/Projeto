<?php

namespace Projeto;

use PDO;

Class Connection{
    private static $db;
    
    public static function conectar(){

        try {
            $user = 'root';
            $pass = '';
            if(!isset(self::$db)){
                self::$db = new PDO('mysql:host=localhost;dbname=web_serv', $user, $pass);
            }
            print("<h>conectado com sucesso</h>");
            return self::$db;
        } catch (\Throwable $th) {
            die("Error de conexão: " . $th->getMessage());
        }

    } 
}