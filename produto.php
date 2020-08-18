<?php
//====CONEXAO===//
try
{
    $pdo = new PDO ("mysql:dbname=cadastroproduto; host=localhost","root","");
}
catch (PDOException $e){
    echo "erro com banco de dados:" .$e->getMessage();
}
catch (Exception $e)
{
    echo "erro generico:" .$e->getMessage();
}
//==INSERÇÃO==/

$pdo->query("INSERT INTO produtos(nome, preco, descricao) VALUES ('caderno espiral', '14.99','caderno espiral 50 folhas')");

//==DELETAR  CADASTRO  ====== $res = $pdo->query("DELETE FROM produto WHERE id='1'"); ======//
//==ATUALIZAÇÃO ==== $res = $pdo -> query("UPDATE produto SET preco='20,00' WHERE id='1'"); ====//