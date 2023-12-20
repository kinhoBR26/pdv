<?php
session_start();
include('../seguranca.php');
include('../conexao.php');
if ($_POST) {
    $usuario_id = $_SESSION['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sql = "insert into fornecedores (nome,email,telefone,usuario_id) values ('$nome','$email','$telefone','$usuario_id')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    header("location: index.php");
}
?>
<html>
<head>
    <title>Cadastro de Fornecedores</title>
    <?php include('../header_bootstrap.php');?>
</head>
<body>
<div class="container">
    <?php include '../menu.php';?>
    <h1>Cadastro de Fornecedores</h1>

    <form method="post" action="add.php">

        <div class="mb-3">
            <label class="form-label">Nome Fornecedor:</label>
            <input type="text" name="nome" placeholder="Qual o nome do fornecedor?" required class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email Fornecedor:</label>
            <input type="email" name="email" placeholder="Qual o email do fornecedor?" required class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone Fornecedor:</label>
            <input type="text" name="telefone" placeholder="Qual o telefone do fornecedor?" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>

</div>
</body>
</html>
