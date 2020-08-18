<?php
require_once 'classlog.php';
$u = new usuario;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Faça seu Login</title>
</head>

<body>
    <header>
        <a class="login" href="login.php">Login</a>
    </header>

    <div class="titulo">
        <h1>Ainda não é inscrito?<a href="cadastrologin.php">Cadastre-se</a></h1>
    </div>
    <br>

    <div class="corpo">
        <form class="container" action="processa.php" method="POST">
            <label for="email">E-mail</label><br>
            <input type="enail" name="email" id="email" placeholder="alice@gmail.com" required></input><br>
            <br>

            <label for="senha">Senha</label><br>
            <input type="password" name="senha" id="senha" placeholder="12345" required></input><br>
            <br>

            <button type="reset" class="btn btn-default">Limpar Campos</button>
            <button type="submit" class="btn btn-primary">Acessar</button>
        </form>
    </div>

    <?php
        if(isset($_POST['email']))
        {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if(!empty($email) && !empty($senha))
            {
                $u->conectar("cadastroproduto","localhost","root","");
                if($u->msgErro == "")
                {
                    if($u->logar($email,$senha))
                    {
                        header("location: areausuario.php");
                    }
                    else
                    {
                        echo "Email e/ou senha estão incorretos!";
                    }
                }
                else
                    {
                        echo "Erro: " .$u->msgErro;
                    }
            }
            else
            {
                echo "Preencha todos os campos!";
            }
        }

?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>