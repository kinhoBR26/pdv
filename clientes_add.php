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
<html>
<head>
<title>Cadastro de Clientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div class="container">
<h1>Cadastro de Clientes</h1>

<form method="post" action="clientes_add.php">

    <div class="mb-3">
        <label class="form-label">Seu Nome:</label>
        <input type="text" name="nome" placeholder="Qual o seu nome?" required class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Seu Email:</label>
        <input type="email" name="email" placeholder="Qual o seu Email?" required class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>





</div>
</body>
</html>
