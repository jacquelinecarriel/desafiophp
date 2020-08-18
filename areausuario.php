<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location:login.php");
        exit;
    }
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="indexProdutos.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Area Usuario</title>
</head>

<body>
    <header>
        <a class="login" href="login.php">Login</a>
    </header>
    <div class="titulo">
        <h2>Seja Bem-vindo! </h2>
    </div>

    <table class="container">
        <thead>
                <tr>
                <div style="margin-left:500px" class="container">
                <h3>Cadastre itens em nossa Papelaria! <a href="createProduto.php">Quero Cadastrar!</a></h3>
            </div>
                </tr>

                <tr>
                <div style="margin-left:500px" class="container">
                <h3>Acesse nossa lista de Produtos <a href="indexProdutos.php">Quero ver os produtos!</a></h3>
            </div>
                </tr>
        


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>