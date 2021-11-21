<!DOCTYPE html>
<html lang="en">
    <head>
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
             <label for="nome">Nome:</label><br>
             <input type="text" name="nome" placeholder="Contratado da Silva" required autofocus><br>
             <label for="salario">Salario em R$</label><br>
             <input type="number" name="salario" placeholder="R$1.200,00" min="0" step="100" required><br>
             <input type="submit" value="Cadastrar"> <input type="hidden" name="method" value="callCreate">
        <br>
         <table border="1">
            <?php
                include "../Dao/TecnicoDao.php";

                $t = new TecnicoDao();
                $array = $t->read();
                ?>

                <thead>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Salario</th>
                </thead>
                
                <form action="../Controllers/TecnicoController.php" method="get">
                    <tbody>
                <?php   
                foreach ($array as $value) {
                    echo "<tr><td>". $value["codigo"] . "</td>
                    <td>" . $value["nome"] . "</td>
                    <td>" . $value["salario"] . "</td>
                    <td><form action='../Controllers/TecnicoController.php' method='get'>
                    <a href='../Controllers/TecnicoController.php?delete= " . $value["codigo"] ."'>apagar</a></form></td></tr>";
                }  
                ?>
                    </tbody>
                </form>
         </table> 
         </center>  
    </body>
</html>
