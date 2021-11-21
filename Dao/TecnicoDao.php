<?php

class TecnicoDao{


    public function create(Tecnico $t){
        try {
                include "ConnectionFactory.php";
                $con =  ConnectionFactory::getConnection();
                $sql = "INSERT INTO Tecnicos(Nome, Salario) VALUES (?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(1, $t->getNome());
                $stmt->bindParam(2, $t->getSalario());
                $stmt->execute();

            } catch (PDOException $e) {
                echo 'Exceção capturada: ',  $e->getMessage(), "\n";
              }
    
        }

    public function read(){
        try {
            include "ConnectionFactory.php";
            $con =  ConnectionFactory::getConnection();
            $sql = "SELECT * FROM Tecnicos;";
            $stmt = $con->prepare($sql);   
            $stmt->execute();
            $array = $stmt -> fetchAll();
            foreach($array as $value){           
                    
            }
            return $array;

        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }
    }

    public function update(){
        try {
            include "ConnectionFactory.php";
            $con =  ConnectionFactory::getConnection();
            $sql = "UPDATE Tecnicos set Nome=?, Salario=?, Valor=? where Codigo=?";

        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }
    }

    public function delete($codigo){
        try {
            include "ConnectionFactory.php";
            $con =  ConnectionFactory::getConnection();
            $con -> exec("DELETE FROM Tecnicos where Codigo = $codigo");

        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }
    }

}