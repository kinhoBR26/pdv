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


<html>
<head>
<title>Cadastro de produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div class="container">
<h1>Cadastro de produtos</h1>

<form method="post" action="produtos_add.php">

    <div class="mb-3">
        <label class="form-label">Preco produto:</label>
        <input type="text" name="nome" placeholder="Qual o nome do produto?" required class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Preco Produto:</label>
        <input type="number" name="preco" placeholder="Digite o preco do produto" required class="form-control">
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

