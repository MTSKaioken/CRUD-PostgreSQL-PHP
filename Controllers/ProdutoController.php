<?php
class ProdutoController{

public function callCreate(){
    
    require_once "../Model/Produto.php";
    require_once "../Dao/ProdutoDao.php";

    $descricao = $_POST['descricao'];
    $estoque = $_POST['estoque_atual'];
    $valor = $_POST['valor_venda'];
    $custo = $_POST['custo_compra'];
    
    $produto = new Produto();
    $produto->setDescricao($descricao);

    if($_POST['ativo'] = 'checked'){
        $ativo = "on";
    } else {
        $ativo = "off";
    }

    $produto->setAtivo($ativo);
    $produto->setEstoque($estoque);
    $produto->setValor($valor);
    $produto->setCusto($custo);   

    $produtoDaoSend = new ProdutoDao;
    $produtoDaoSend->create($produto);
    return header("Location:../View/ProdutoView.php");
    }

    public function callUpdate(){
        require_once "../Model/Produto.php";
        require_once "../Dao/ProdutoDao.php";

        $codigo = $_POST['codigo'];
        $descricao = $_POST['descricao'];
        $estoque = $_POST['estoque_atual'];
        $valor = $_POST['valor_venda'];
        $custo = $_POST['custo_compra'];

        $produto = new Produto();
        $produto->setCodigo($codigo);
        $produto->setDescricao($descricao);
        if($_POST['ativo'] == 'checked'){
            $ativo = "on";
        } else {
            $ativo = "off";
        }
        $produto->setAtivo($ativo);
        $produto->setEstoque($estoque);
        $produto->setValor($valor);
        $produto->setCusto($custo);

        $ProdutoDaoSend = new ProdutoDao;
        $ProdutoDaoSend->update($produto);
        return header("Location:../View/ProdutoView.php");
    }

    public function callDelete(){
    require_once "../Model/Produto.php";
    require_once "../Dao/ProdutoDao.php";
    $produto = new ProdutoDao;
    $produto->delete($_GET['delete']);
    return header("Location:../View/ProdutoView.php");
    }

}

if (isset($_GET['delete'])) {
    $controller = new ProdutoController;
    $controller->callDelete(); 
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) {
    $method = $_POST['method'];
    if (method_exists('ProdutoController', $method)) {
        $controller = new ProdutoController;
        $controller->$method($_POST);
    } else {
        echo 'Metodo incorreto';
    }
}