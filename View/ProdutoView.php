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
         <form action="../Controllers/ProdutoController.php" method="post" oninput="estoque_min.value=(estoque_atual.value)">
         <fieldset>
             <legend>Produto:</legend>
             <input type="hidden" name="codigo" value="<?= isset($_GET['update']) ? $_GET['update'] : ''; ?>"><br>
             <label for="nome">Descrição:</label><br>
             <textarea name="descricao" style="width:250px; height:50px; resize: none;" maxlength="50" required>
             <?php echo htmlspecialchars(isset($_GET['update']) ? $_GET['descricao'] : '');?> </textarea><br>
             <label for="estoque">Estoque:</label><br>
             0 <input type="range" name="estoque_atual" value="<?= isset($_GET['update']) ? $_GET['estoque'] : ''; ?>" max="150" required>
             
             <output name="estoque_min" for="estoque_atual"> <?php echo htmlspecialchars(isset($_GET['update']) ? $_GET['estoque'] : ''); ?></output>
             <br><br>

             <label for="valor_venda">Valor em R$</label><br>
             <input type="number" name="valor_venda" placeholder="R$1.200,00" min="0" step="100" value="<?= isset($_GET['update']) ? $_GET['valor'] : ''; ?>" required>
             <br>
             <input type="checkbox" name="ativo" <?php echo htmlspecialchars($_GET['ativo'] == 'on' ? 'checked' : ''); ?>>
             <label for="ativo">Ativo</label><br>

             <label for="custo_compra">Custo em R$</label><br>
             <input type="number" name="custo_compra" placeholder="R$50,00" min="0" step="25" value="<?= isset($_GET['update']) ? $_GET['custo'] : ''; ?>"required><br><br>
         </fieldset>
             <?php
                if(isset($_GET["update"])){ 
                    echo "<input type='hidden' name='method' value='callUpdate'>";
                }
                else{
                    echo "<input type='hidden' name='method' value='callCreate'>";
                } 
            ?>
            <input type="submit" value="Enviar">
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
                            <td><form action='../Controllers/ProdutoController.php' method='get'>
                            <a href='../Controllers/ProdutoController.php?delete= ".$value["codigo"]."'>Apagar</a></form>
                            <td><form action='../View/ProdutoView.php' method='get'>
                            <a href='../View/ProdutoView.php?update=".$value["codigo"]."&descricao=".$value["descricao"]."&estoque=".$value["estoque"]."&valor=".$value["valor_venda"]."&ativo=".$value["ativo"]."&custo=".$value["custo_compra"]."'>atualizar</a></form></td></tr>";
                        }  
                    ?>
                </tbody>
         </table> 
         </center> 

    </body>
</html>