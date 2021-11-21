<?php
class ProdutoController{

public function callCreate(){
    
    require_once "../Model/Produto.php";
    require_once "../Dao/ProdutoDao.php";

    echo $descricao = $_POST['descricao'];
    echo $ativo = $_POST['ativo'];
    echo $estoque = $_POST['estoque'];
    echo $valor = $_POST['valor_venda']; 
    echo $custo = $_POST['custo_compra'];
    
    $produto = new Produto();
    $produto->setDescricao($descricao);
    $produto->setAtivo($ativo);
    $produto->setEstoque($estoque);
    $produto->setValor($valor);
    $produto->setCusto($custo);   

    $produtoDaoSend = new ProdutoDao;
    $produtoDaoSend->create($produto);
    return header("Location:../View/ProdutoView.php");
    }
}

$controller = new ProdutoController;
$controller->callCreate();