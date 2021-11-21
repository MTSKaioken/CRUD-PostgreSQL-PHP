<?php
class TecnicoController{

public function callCreate(){

    require_once "../Model/Tecnico.php";
    require_once "../Dao/TecnicoDao.php";

    $nome = $_POST['nome'];
    $salario = $_POST['salario'];
    
    $tecnico = new Tecnico();
    $tecnico->setNome($nome);
    $tecnico->setSalario($salario);

    $tecnicoDaoSend = new TecnicoDao;
    $tecnicoDaoSend->create($tecnico);
    return header("Location:../View/TecnicoView.php");
    }

    public function callDelete(){
        require_once "../Model/Tecnico.php";
        require_once "../Dao/TecnicoDao.php";
        $tecnico = new TecnicoDao;
        $tecnico->delete($_GET['delete']);
        return header("Location:../View/TecnicoView.php");
    }
}


if (isset($_GET['delete'])) {
    $controller = new TecnicoController;
    $controller->callDelete(); 
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) { // aqui é onde vai decorrer a chamada se houver um *request* POST
    $method = $_POST['method'];
    if (method_exists('TecnicoController', $method)) {
        $controller = new TecnicoController;
        $controller->$method($_POST);
    } else {
        echo 'Metodo incorreto';
    }
}