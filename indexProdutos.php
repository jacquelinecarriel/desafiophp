<?php
require_once 'class-produto.php';
$p = new produtos("cadastroproduto","localhost","root","");
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="indexProdutos.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Lista Produtos</title>
</head>

<body>
    <header>
        <a class="login" href="login.php">Login</a>
    </header>
    <div class="titulo">
        <h2>Todos os Produtos </h2>
    </div>

    <table class="container">
        <thead>
                <tr>
                    <th scope="col">Nome Produto</th>
                    <th scope="col">Preço do Produto</th>
                    <th scope="col">Descrição do produto</th>
                </tr>
        <?php //mostra o banco de dados//
                    $dados = $p->buscarDados();
                    {
                        if(count($dados) > 0);
                        {
                        for($i=0; $i < count($dados); $i++)
                        {
                        echo '<tr>';
                        foreach ($dados[$i] as $k => $v)
                        {
                        if($k !="id")//se a coluna for id, pule.. para nao exibir id//
                    {
                    echo "<td>".$v."</td>";   
                        }
                    }
        ?>
                    <td>
                        <a href="showProdutonew.php?id=<?php echo $dados[$i]['id'];?>">Visualizar</a>
                    </td>
                    <td>
                        <a href="showProdutonew.php?id_up=<?php echo $dados[$i]['id'];?>">Editar</a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $dados[$i]['id'];?>">Excluir</a> 
                    </td>
                        
                <?php
                        echo "</tr>";
                          }  
                        } 
                    }
                ?>

        </thead>
    </table>

            <div style="margin-left:500px" class="container">
                <h3>Cadastre mais itens <a href="createProduto.php">Aqui!</a></h3>
            </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>