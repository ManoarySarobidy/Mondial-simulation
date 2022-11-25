<?php

    function connect(){
        $host = "127.0.0.1";
        $port = "3306";
        $service = "orcl";
        $user = "root";
        $pw = "root";

        $base = "mysql:host=%s;port=%s;dbname=mondial";
        $base = sprintf($base , $host , $port);
        try{
            $connection = new PDO( $base , $user , $pw );
            return $connection;
        }catch( PDOException $erreur ){
            echo $erreur->getMessage();
        }
    }