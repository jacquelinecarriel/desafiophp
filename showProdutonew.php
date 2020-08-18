<?php
require_once 'class-produto.php';
$id = $_GET['id']? intval($_GET['id']):0;
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
            <h2>Ficha do Produto </h2>
        </div>

        <!--INICIO formulario para Cadastro ir para o banco-->

        <div class="corpo">
                        
        <?php //enviando o cadastro para o banco de dados//
        if(isset($_POST['nome'])) //verifica que a pessoa clicou no cadastrar de acordo com o name de alguma das inputs//
        {
            $nome= addslashes($_POST['nome']); //addlashes serve pra codigos maliciosos nao afetarem a segurança//
            $preco= addslashes($_POST['valor']);
            $descricao= addslashes($_POST['descricao']);
            if (!empty($nome) && !empty($preco) && !empty($descricao)){ //se o cadastro nao estiver vazio, verificar se o nome nao esta cadastrado//
                if(!$p->cadastroProduto($nome, $preco, $descricao))
                {
                   echo "Produto ja esta cadastrado no Banco de dados";
                }
            }
                
        }
        ?>
        <!-- FIM formulario para Cadastro ir para o banco-->

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
                    <a style="color:rgb(14, 32, 47)" href="indexProdutos.php?=">Voltar</a>
                    </td>                
                </table>
        <?php
            foreach ($imagensDoProduto as $value)
            {
        ?>
        <div id="imagens">
            <div class="caixa-img">
                <img src="imagens/<?php echo $value['nome_imagem']; ?> ">
                </div>
                    </div>
                    <?php
            }
            ?>


        <!-- INICIO formulario para editar-->

        <?php
        if(isset($_GET['id_up']))
        {
            $id_update = addslashes($_GET['id_up']);
            $res = $p->buscarDadosProduto($id_update);
        }
        ?>

        <!-- FIM formulario para editar-->

        <!-- INICIO atualização de cadastro-->

        <?php
            if(isset($_PUT['id_up']))//se o atributo id veio, guarda na variavel idproduto, e envia pra funcao excluir criada em class//
                {
                $id_produto = addslashes($_PUT['id_up']);
                $p->atualizarDados($id_produto);
                header("location: indexProdutos.php"); //atualizar a pagina//
                }
        ?>        
                <!-- FIM atualização de cadastro-->


        <form class="container" method="POST">
            <label for="nome">Nome do produto</label><br>
            <input type="text" name="nome" id="nome"  value="<?php if(isset($res)){echo $res['nome'];} ?>"></input><br>
            <br>

            <label for="valor">valor do produto</label><br>
            <input type="number" name="valor" id="valor"  value="<?php if(isset($res)){echo $res['preco'];} ?>"></input><br>
            <br>

            <label for="descricao">Descrição do Produto</label><br>
            <input type="text" name="descricao" id="descricao" value="<?php if(isset($res)){echo $res['descricao'];} ?>"></input><br>
            <br>

            <button type="submit" value="<?php if(isset($res)) ?>" class="btn btn-primary">Atualizar</button>
            
        </form>
    </div>

               
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>



