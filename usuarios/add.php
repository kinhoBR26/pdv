<?php
include('../conexao.php');
if($_POST){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = "insert into usuarios  (nome,email,senha) values ('$nome','$email','$senha')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    header("location: index.php");
}
?>

<html>
<head>
    <title>Cadastro de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php include '../menu.php';?>
<h1>Cadastro de Usuários</h1>

<form method="post" action="add.php">
    <div class="mb-3">
        <label class="form-label">Digite seu Nome:</label>
        <input type="text" name="nome" placeholder="Qual o seu nome?" required class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Digite seu Email:</label>
        <input type="email" name="email" placeholder="Qual o seu Email?" required class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Digite sua Senha:</label>
        <input type="password" name="senha" placeholder="Senha" required class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

</div>
</body>
</html>