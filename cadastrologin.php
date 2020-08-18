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
        <h2>Faça seu login para editar seus cadastros! </h2>
    </div>
    <br>

    <div class="corpo">
        <form class="container" method="POST">
            <label for="nomeCompleto">Nome completo</label><br>
            <input type="text" name="nomeCompleto" id="nomeCompleto" placeholder="Alice Maria" required></input><br>
            <br>

            <label for="telefone">Telefone</label><br>
            <input type="tel" name="telefone" id="telefone" placeholder="11 98700 0012" required></input><br>
            <br>

            <label for="email">E-mail</label><br>
            <input type="email" name="email" id="email" placeholder="alice@gmail.com" required></input><br>
            <br>

            <label for="senha">Senha</label><br>
            <input type="password" name="senha" id="senha" placeholder="12345" required></input><br>
            <br>

            <label for="confSenha">Confirmação Senha</label><br>
            <input type="password" name="confSenha" id="confSenha" placeholder="12345" required></input><br>
            <br>


            <button type="reset" class="btn btn-default">Limpar Campos</button>
            <button type="submit" class="btn btn-primary">Cadastrar!</button>
        </form>
    </div>
    <?php
        if(isset($_POST['email']))
        {
            $nome = addslashes($_POST['nomeCompleto']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confirmarSenha = addslashes($_POST['confSenha']);
            //verificar se esta preenchido
            if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
            {
                    $u->conectar("cadastroproduto", "localhost", "root", "");
                    if($u->msgErro == "") //se esta tudo ok
                    {
                        if($senha == $confirmarSenha)
                        {
                            if($u->cadastrar($nome,$telefone,$email,$senha))
                            {
                                echo "Cadastrado com sucesso! Acesse para entrar!";
                            }
                            else
                            {
                                echo "Email ja cadastrado!";
                            }
                        }
                        else
                        {
                            echo "Senha e confirmar senhao não correspondem!";
                        }
                    }
                    else
                    {
                        echo "Erro: " .$u->msgErro;
                    }
                } else
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