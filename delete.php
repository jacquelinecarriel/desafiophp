<?php
require_once 'class-produto.php';
$p = new produtos("cadastroproduto","localhost","root","");
$product=$p->buscarDadosProduto($id);

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="showproduto.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Editar Produtos</title>
</head>

<body>
        <header>
            <a class="login" href="login.php">Login</a>
        </header>

        <div class="titulo">
            <h2>Edite o Cadastro </h2>
        </div>       
                <!--INICIO formulario para DELETAR -->

                            <?php
                                    if(isset($_GET['id']))//se o atributo id veio, guarda na variavel idproduto, e envia pra funcao excluir criada em class//
                                    {
                                        $id_produto = addslashes($_GET['id']);
                                        $p->excluirProduto($id_produto);
                                        header("location: indexProdutos.php"); //atualizar a pagina//
                                    }
                            ?>        
                 <!--FIM formulario para DELETAR -->
  
                <div class="lista">
                <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                        <thead>
                            <tr style="color:rgb(32, 59, 83);">
                            <td><?= $product['nome'] ?></td>
                            <td><?= $product ['preco'] ?></td>
                            <td><?= $product ['descricao'] ?></td>
                            </tr>
                            </thead>
                            </tbody>   
                            </div>
                            <td>

                    <td>
                        <a href="delete.php?id=<?php echo $dados[$i]['id'];?>">Excluir</a>
                    </td>
                    
                                    
                </table>

    </div>

               
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
