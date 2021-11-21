<?php
class ConnectionFactory{
    public static function getConnection(){  
        try {             
            return $db = new PDO('pgsql:host=localhost;dbname=CRUD', "mtskaioken", "WilsonAtacante123@");

        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }

    }
}
?>