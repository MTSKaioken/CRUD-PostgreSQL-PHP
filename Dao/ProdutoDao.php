<?php
class ProdutoDao{

    public function create(Produto $p){
        try {
            include "ConnectionFactory.php";
            $con =  ConnectionFactory::getConnection();
            $sql = "INSERT INTO Produtos(Descricao, Ativo, Estoque, Valor_Venda, Custo_Compra) VALUES (?, ?, ?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1, $p->getDescricao());
            $stmt->bindParam(2, $p->getAtivo());
            $stmt->bindParam(3, $p->getEstoque());
            $stmt->bindParam(4, $p->getValor());
            $stmt->bindParam(5, $p->getCusto());
            $stmt->execute();
 
        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }
    }

    public function read(){
        try {
            include "ConnectionFactory.php";
            $con =  ConnectionFactory::getConnection();
            $sql = "SELECT * FROM Produtos Order by Codigo";
            $stmt = $con->prepare($sql);   
            $stmt->execute();
            $fetch_produto = $stmt -> fetchAll();
            foreach($fetch_produto as $value){           
                    
            }
            return $fetch_produto;

        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }
    }

    public function update(Produto $p){
        try {
            include "ConnectionFactory.php";
            $con =  ConnectionFactory::getConnection();
            $sql = "UPDATE Produtos set Descricao=?, Ativo=?, Estoque=?, Custo_Compra=?, Valor_Venda=? where Codigo=?";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1, $p->getDescricao());
            $stmt->bindParam(2, $p->getAtivo());
            $stmt->bindParam(3, $p->getEstoque());
            $stmt->bindParam(4, $p->getCusto());
            $stmt->bindParam(5, $p->getValor());
            $stmt->bindParam(6, $p->getCodigo());
            $stmt->execute();

        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }
    }

    public function delete($codigo){
        try {
            include "ConnectionFactory.php";
            $con =  ConnectionFactory::getConnection();
            $con -> exec("DELETE FROM Produtos where Codigo = $codigo");
        } catch (PDOException $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          }
    }
}