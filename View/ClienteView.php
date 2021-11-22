<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cliente</title>
    </head>
    <body>
         <a href="TecnicoView.php">Tecnicos</a>
         <a href="ProdutoView.php">Produtos</a>
         <a href="ClienteView.php">Clientes</a>
        <center>
            <form action="../Controllers/ClienteController.php" method="post">
            <fieldset>
                <input type="hidden" name="codigo" value="<?= isset($_GET['update']) ? $_GET['update'] : ''; ?>"><br>
                <label for="nome">Nome</label><br>
                <input type="text" name="nome" placeholder="Contratado da Silva" value="<?= isset($_GET['update']) ? $_GET['nome'] : ''; ?>" required autofocus><br>

                <label for="cpf">CPF</label><br>
                <input type="text" name="cpf" placeholder="xxx.xxx.xxx-xx" value="<?= isset($_GET['update']) ? $_GET['cpf'] : ''; ?>"required><br>
                
                <label for="celular">Celular</label><br>
                <input type="text" name="celular" placeholder="(xx) xxxxx-xxxx" value="<?= isset($_GET['update']) ? $_GET['celular'] : ''; ?>" required><br>
                
                <label for="email">Email</label><br>
                <input type="email" name="email" placeholder="exemple@exemple.com" value="<?= isset($_GET['update']) ? $_GET['email'] : ''; ?>" required><br><br>

                <?php
                    if(isset($_GET["update"])){ 
                        echo "<input type='hidden' name='method' value='callUpdate'>";
                    }
                    else{
                        echo "<input type='hidden' name='method' value='callCreate'>";
                } 
                ?>
            <input type="submit" value="Enviar">
            </fieldset>
            </form>
         <br>

             <table border="1">
             <?php
                 include "../Dao/ClienteDao.php";
 
                 $c = new ClienteDao();
                 $array = $c->read();
                 ?>
 
                 <thead>
                     <th>Código</th>
                     <th>Nome</th>
                     <th>CPF</th>
                     <th>Celular</th>
                     <th>Email</th>
                 </thead>
 
                 <tbody>
                     <?php
                         foreach ($array as $value) {
                             echo "<tr><td>". $value["codigo"] . "</td>
                             <td>" . $value["nome"] . "</td>
                             <td>" . $value["cpf"] . "</td>
                             <td>" . $value["celular"] . "</td>
                             <td>" . $value["email"] . "</td>
                             <td><form action='../Controllers/ClienteController.php' method='get'>
                             <a href='../Controllers/ClienteController.php?delete= ".$value["codigo"]."'>Apagar</a></form>
                             <td><form action='../View/ClienteView.php' method='get'>
                             <a href='../View/ClienteView.php?update=".$value["codigo"]."&nome=".$value["nome"]."&cpf=".$value ["cpf"]."&celular=".$value["celular"]."&email=".$value["email"]."'>atualizar</a></form></td></tr>";
                         }  
                     ?>
                 </tbody>
          </table> 
          </center> 
    </body>
</html>
   
    