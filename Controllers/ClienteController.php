<?php
class ClienteController{

public function callCreate(){
    require_once "../Model/Cliente.php";
    require_once "../Dao/ClienteDao.php";
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    
    $cliente = new Cliente();
    $cliente->setNome($nome);
    $cliente->setCpf($cpf);
    $cliente->setCelular($celular);
    $cliente->setEmail($email);

    $clienteDaoSend = new ClienteDao;
    $clienteDaoSend->create($cliente);
    return header("Location:../View/ClienteView.php");
    }

    public function callDelete(){
    require_once "../Model/Cliente.php";
    require_once "../Dao/ClienteDao.php";
    $cliente = new ClienteDao;
    $cliente->delete($_GET['delete']);
    return header("Location:../View/ClienteView.php");
    }

}

if (isset($_GET['delete'])) {
    $controller = new ClienteController;
    $controller->callDelete(); 
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) { // aqui é onde vai decorrer a chamada se houver um *request* POST
    $method = $_POST['method'];
    if (method_exists('ClienteController', $method)) {
        $controller = new ClienteController;
        $controller->$method($_POST);
    } else {
        echo 'Metodo incorreto';
    }
}