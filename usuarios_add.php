<?php
include ('conexao.php');
if($_POST){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = "insert into usuarios  (nome,email,senha) values ('$nome','$email','$senha')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
}
?>

<h1>Cadastro de Usuários</h1>

<form method="post" action="usuarios_add.php">
    Digite seu Nome:
    <input type="text" name="nome" placeholder="Qual o seu nome?"><br>
    Digite seu Email:
    <input type="email" name="email" placeholder="Qual o seu Email?"><br>
    Digite sua Senha:
    <input type="password" name="senha" placeholder="Senha"><br>
    <input type="submit" value="salvar">
</form>
