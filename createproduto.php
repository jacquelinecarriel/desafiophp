<?php
require_once 'class-produto.php';
$p = new produtos("cadastroproduto","localhost","root","");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="createproduto.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Cadastro produto</title>
</head>

<body>
    <header>
        <a class="login" href="login.php">Login</a>
    </header>

    <div class="titulo">
        <h2>Cadastro Produto </h2>
    </div>
    <br>
    <div class="texto">
        <h2>Cadastre aqui seu Produto ou verifique nossas opções ja cadastradas!</h2>
        <a href="indexProdutos.php">Itens cadastrados!</a>
    </div>
    <div class="corpo">
        <!-- tentento segurar dados atualização -->
        <?php 
        if(isset($_POST['nome'])) //verifica que a pessoa clicou no atualizar de acordo com o name de alguma das inputs//
        {
            $nome= addslashes($_POST['nome']); //addlashes serve pra codigos maliciosos nao afetarem a segurança//
            $preco= addslashes($_POST['valor']);
            $descricao= addslashes($_POST['descricao']);
            $imagens = array();
            if (isset($_FILES['foto']))
            {
                for ($i=0; $i < count($_FILES['imagem']['name']);$i++)
                {
                    $nome_arquivo = md5($_FILES['imagem']['name'][$i].rand(1,999)).'jpg';
                    move_uploaded_file($_FILES['imagem']['tmp_name'][$i], 'imagens/' .$nome_imagem);
                    array_push($imagens, $nome_imagem);
                }
            }
            if (!empty($nome) && !empty($preco) && !empty($descricao)){ //se o cadastro nao estiver vazio, verificar se o nome nao esta cadastrado//
                if(!$p->cadastroProduto($nome, $preco, $descricao, $imagens))
                {
                   echo "Produto cadastrado!";
                }
            }
                
        }
    ?>
        <form class="container" method="POST" enctype="multipart/form-data">
            <label for="nome">Nome do produto</label><br>
            <input type="text" name="nome" id="nome" placeholder="caderno espiral" required></input><br>
            <br>

            <label for="valor">valor do produto</label><br>
            <input type="number" name="valor" id="valor" placeholder="15,99" required></input><br>
            <br>

            <label for="descricao">Descrição do Produto</label><br>
            <input type="text" name="descricao" id="descricao" placeholder="caderno espiral 50 folhas" required></input><br>
            <br>

            <label for="descricao">Adicionar Imagem</label><br>
            <input type="file" name="imagem[]" multiple id="imagem" ></input><br>
            <br>


            <button type="reset" value="Reset" class="btn btn-default">Limpar Campos</button>
            <button type="submit" value="Submit" class="btn btn-primary" href="indexProdutos.php">Enviar</button>
            
        </form>

    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>