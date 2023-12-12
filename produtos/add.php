<?php
session_start();
include('../seguranca.php');
include('../conexao.php');
if($_POST){
    $usuario_id = $_SESSION['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $sql = "insert into produtos (nome,preco,quantidade,usuario_id) values ('$nome','$preco','$quantidade','$usuario_id')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    header("location: index.php");
}
?>


<html>
<head>
<title>Cadastro de produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php include '../menu.php';?>
<h1>Cadastro de produtos</h1>

<form method="post" action="add.php">

    <div class="mb-3">
        <label class="form-label">Nome Do Produto:</label>
        <input type="text" name="nome" placeholder="Qual o nome do produto?" required class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Preco Produto:</label>
        <input type="text" name="preco" placeholder="Digite o preco do produto" required class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Quantidade produto:</label>
        <input type="number" name="quantidade" placeholder="Digite a quantidade do produto" required class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar produto</button>

</form>


</div>
</body>
</html>

