<?php

class Conexion
{

    static public function conectar()
    {

        $dsn = 'mysql:dbname=pos;host=localhost';
        $usuario = 'root';
        $contraseña = '';

        try {
            $gbd = new PDO($dsn, $usuario, $contraseña);

            return $gbd;
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

        /*$link = new PDO("mysql:host=localhost;dbname:pos",
                        "root",
                        "");//Conexion PDO 

                        $link->exec("set names utf8");

                        return $link;*/
    }
}
