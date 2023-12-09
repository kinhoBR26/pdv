<?php
/*
 tabela produtos
id
nome
preco
quantidade
 */

include ('conexao.php');
if($_POST){
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $sql = "insert into produtos  (nome,preco,quantidade) values ('$nome','$preco','$quantidade')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
}
?>

<h1>Cadastro de produtos</h1>

<form method="post" action="produtos_add.php">
    Nome produto:
    <input type="text" name="nome" placeholder="Qual o nome do produto?"><br>
    Preco produto:
    <input type="number" name="preco" placeholder="Digite o preco do produto"><br>
    Quantidade produto:
    <input type="number" name="quantidade" placeholder="Digite a quantidade do produto"><br>
    <input type="submit" value="salvar">
</form>
