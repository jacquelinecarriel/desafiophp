<?php

class produtos{
    private $pdo;
    public function __construct($dbname,$host,$user,$senha)
    {
    try
        {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=" .$host,$user,$senha); //conexao com o banco de dados//
            }
                catch (PDOException $e) {
                    echo "Erro com banco de dados:".$e->getMessage();
                exit();
            }
                catch (Exception $e) {
                    echo "Erro generico:" .$e->getMessage();
                exit();
                }
    }
            public function buscarDados(){
                $res = array();
                    $cmd = $this->pdo->query("SELECT * FROM produtos ORDER BY nome");
                    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
                return $res;
        }
        //funcao cadastra no banco de dados//
        public function cadastroProduto ($nome, $preco, $descricao, $imagens = array())
        {
            $cmd = $this->pdo->prepare("SELECT id from produtos WHERE nome = :n");
            $cmd->bindValue(":n",$nome);
            $cmd->execute();
            if($cmd->rowCount() > 0) //nome ja existe no banco de dados//
        {
                return false;
                    }else //nome nao foi encontrado//
                    {
                    $cmd = $this->pdo->prepare('INSERT INTO produtos (nome,preco,descricao) VALUES (:n,:p,:d)');
                    $cmd->bindValue(":n",$nome);
                    $cmd->bindValue(":p",$preco);
                    $cmd->bindValue(":d",$descricao);
                    $cmd->execute();
                        //INSERIR AS IMAGENS DO PRODUTO (TABELA IMAGENS)

                    if(count($imagens)> 0)//se veio imagens
                    {
                        for($i=0; $i < count($imagens); $i++)
                        {
                            $nome_imagem = $imagem[$i];
                        }
                        $cmd = $this->pdo->prepare('INSERT INTO imagens (nome_imagem) VALUES (:m)');
                        $cmd->bindValue(":m",$nome_imagem);
                        $cmd->execute();   
                    }

                    }
             }           
            public function excluirProduto($id)
            {
                $cmd = $this->pdo->prepare("DELETE FROM produtos WHERE id =:id");
                $cmd->bindValue(":id",$id);
                $cmd->execute();
            }
            //buscar dados produto//
            public function buscarDadosProduto($id)
            {
                $res = array();
                $cmd = $this->pdo->prepare("SELECT * FROM produtos WHERE id=:id");
                $cmd->bindValue(":id",$id);
                $cmd->execute();
                $res = $cmd->fetch(PDO::FETCH_ASSOC);
                return $res;
            }
            //atualizar banco de dados//
                public function atualizarDados ($id, $nome, $preco, $descricao,$imagens)
                {
                    $cmd = $this->pdo->prepare("UPDATE produtos SET nome = :n, preco =:p, descricao= :d");
                    $cmd->bindValue(":n", $nome);
                    $cmd->bindValue(":p", $preco);
                    $cmd->bindValue(":d", $descricao);
                    $cmd->execute();
                }
    }
               
?>