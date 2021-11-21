<?php
class ClienteDao{

    public function create(Cliente $c){
        try {
            include "ConnectionFactory.php";
            $con =  ConnectionFactory::getConnection();
            $sql = "INSERT INTO Clientes (Nome, CPF, Celular, Email) VALUES (?, ?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1, $c->getNome());
            $stmt->bindParam(2, $c->getCpf());
            $stmt->bindParam(3, $c->getCelular());
            $stmt->bindParam(4, $c->getEmail());
            $stmt->execute();

        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }
    }

    public function read(){
        try {
            include "ConnectionFactory.php";
            $con =  ConnectionFactory::getConnection();
            $sql = "SELECT * FROM Clientes";
            $stmt = $con->prepare($sql);   
            $stmt->execute();
            $fetch_cliente = $stmt -> fetchAll();
            foreach($fetch_cliente as $value){           
                    
            }
            return $fetch_cliente;

        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }
    }

    public function update(){
        try {
            include "ConnectionFactory.php";
            $con =  ConnectionFactory::getConnection();
            $sql = "UPDATE Clientes set Nome=?, CPF=?, Fone=?, Celular=?, Email=? where Codigo=?";

        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }
    }

    public function delete($codigo){
        try {
            include "ConnectionFactory.php";
            $con =  ConnectionFactory::getConnection();
            $con -> exec("DELETE FROM Clientes where Codigo = $codigo");

        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }
    }

    
}