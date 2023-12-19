<?php
session_start();
include('../seguranca.php');
include('../conexao.php');
if ($_POST) {
    $usuario_id = $_SESSION['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sql = "insert into clientes (nome,email,telefone,usuario_id) values ('$nome','$email','$telefone','$usuario_id')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    header("location: index.php");
}
?>
<html>
<head>
<title>Cadastro de Clientes</title>
    <?php include('../header_bootstrap.php');?>
</head>
<body>
<div class="container">
    <?php include '../menu.php';?>
<h1>Cadastro de Clientes</h1>

<form method="post" action="add.php">

    <div class="mb-3">
        <label class="form-label">Seu Nome:</label>
        <input type="text" name="nome" placeholder="Qual o seu nome?" required class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Seu Email:</label>
        <input type="email" name="email" placeholder="Qual o seu Email?" required class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Seu Telefone:</label>
        <input type="text" name="telefone" placeholder="Qual o seu telefone?" required class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>





</div>
</body>
</html>
