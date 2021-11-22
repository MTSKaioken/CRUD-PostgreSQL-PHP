<?php
class ConnectionFactory{
    public static function getConnection(){  
        try {             
            return $db = new PDO('pgsql:host=localhost;dbname=CRUD', "USER", "PASSWORD");

        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }

    }
}