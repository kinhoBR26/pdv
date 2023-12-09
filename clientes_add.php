<?php

include('conexao.php');
if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sql = "insert into clientes (nome,email) values ('$nome','$email')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
}
?>

<h1>Cadastro de Clientes</h1>

<form method="post" action="clientes_add.php">
    Seu Nome:
    <input type="text" name="nome" placeholder="Qual o seu nome?"><br>
    Seu Email:
    <input type="email" name="email" placeholder="Qual o seu Email?"><br>

    <input type="submit" value="salvar">
</form>
