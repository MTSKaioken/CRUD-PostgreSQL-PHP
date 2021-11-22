<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
                include "../Dao/TecnicoDao.php";

                $t = new TecnicoDao();
                $array = $t->read();
                ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tecnico</title>
    </head>
    <body>
         <a href="TecnicoView.php">Tecnicos</a>
         <a href="ProdutoView.php">Produtos</a>
         <a href="ClienteView.php">Clientes</a>
        <center>
         <form action="../Controllers/TecnicoController.php" method="post">
         <fieldset>
            <input type="hidden" name="codigo" value="<?= isset($_GET['update']) ? $_GET['update'] : ''; ?>"><br>
             <label for="nome">Nome:</label><br>
             <input type="text" placeholder="Contratado da Silva" name="nome" value="<?= isset($_GET['update']) ? $_GET['nome'] : ''; ?>"><br>
             <label for="salario">Salario em R$</label><br>
             <input type="number" name="salario" placeholder="R$1.200,00" min="0" step="100" value="<?= isset($_GET['update']) ? $_GET['salario'] : ''; ?>" required><br><br>
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
        <br><br>
         <table border="1">
                <thead>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Salario</th>
                </thead>
                
                <tbody>
                <?php   
                foreach ($array as $value) {
                    echo "<tr><td>". $value["codigo"] . "</td>
                    <td>" . $value["nome"] . "</td>
                    <td>" . $value["salario"] . "</td>
                    <td><form action='../Controllers/TecnicoController.php' method='get'>
                    <a href='../Controllers/TecnicoController.php?delete=". $value["codigo"] ."'>apagar</a></form></td>
                    <td><form action='../View/TecnicoView.php' method='get'>
                    <a href='../View/TecnicoView.php?update=". $value["codigo"] . "&nome=" . $value["nome"] . "&salario=" . $value ["salario"] . "'>atualizar</a></form></td></tr>";
                }  
                ?>
                    </tbody>
                </form>
         </table> 
         </center>  
    </body>
</html>
