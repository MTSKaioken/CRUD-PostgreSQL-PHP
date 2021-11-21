<?php
    
     ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produto</title>
    </head>
    <body>
         <a href="TecnicoView.php">Tecnicos</a>
         <a href="ProdutoView.php">Produtos</a>
         <a href="ClienteView.php">Clientes</a>
        <center>
         <form action="../Controllers/ProdutoController.php" method="post" oninput="x.value=parseInt(estoque.value)">
             <label for="nome">Descrição:</label><br>
             <textarea name="descricao" style="width:450px; height:150px; resize: none;" required autofocus>
             </textarea><br>

             <label for="estoque">Estoque:</label><br>
             0 <input type="range" name="estoque" value="50" max="150" required>
             
             <output name="x" for="estoque">50</output>
             <br><br>

             <label for="valor_venda">Valor em R$</label><br>
             <input type="number" name="valor_venda" placeholder="R$1.200,00" min="0" step="100" required>
             <br>
             <input type="checkbox" name="ativo">
             <label for="ativo">Ativo</label><br>

             <label for="custo_compra">Custo em R$</label><br>
             <input type="number" name="custo_compra" placeholder="R$50,00" min="0" step="25" required><br><br>
             
             <input type="submit" value="cadastrar"> <input type="hidden" name="?" value="Atualizar">
         </form>

         <br>
         <table border="1">
            <?php
                include "../Dao/ProdutoDao.php";

                $p = new ProdutoDao();
                $array = $p->read();
                ?>

                <thead>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Estoque</th>
                    <th>Valor</th>
                    <th>Ativo</th>
                    <th>Custo</th>
                </thead>

                <tbody>
                    <?php
                        foreach ($array as $value) {
                            echo "<tr><td>". $value["codigo"] . "</td>
                            <td>" . $value["descricao"] . "</td>
                            <td>" . $value["estoque"] . "</td>
                            <td>" . $value["valor_venda"] . "</td>
                            <td>" . $value["ativo"] . "</td>
                            <td>" . $value["custo_compra"] . "</td>
                            <td><input type=submit value=apagar></td></tr>";
                        }  
                    ?>
                </tbody>
         </table> 
         </center> 

    </body>
</html>