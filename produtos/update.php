<?php
session_start();
include('../seguranca.php');
include('../conexao.php');
if ($_POST) {
    $usuario_id = $_SESSION['id'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $sql = "UPDATE produtos SET nome = '$nome',preco = '$preco',quantidade='$quantidade',usuario_id='$usuario_id' WHERE (id = '$id')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    header("location: index.php");
}

$id_produto_alterar = $_GET['id'];
$consulta = $conexao->query("select * from produtos where id='$id_produto_alterar'");
$linha = $consulta->fetch(PDO::FETCH_ASSOC);

?>
<html>
<head>
    <title>Atualizar Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php include '../menu.php';?>
    <h1>Atualizar Produto</h1>

    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        <div class="mb-3">
            <label class="form-label">Nome Produto:</label>
            <input type="text" name="nome" placeholder="Qual o nome do produto?" required class="form-control" value="<?php echo $linha['nome']?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Preço do Produto:</label>
            <input type="text" name="preco" placeholder="Qual o preço do produto?" required class="form-control" value="<?php echo $linha['preco']?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Quantidade produto:</label>
            <input type="number" name="quantidade" placeholder="Qual a quantidade do produto?" required class="form-control" value="<?php echo $linha['quantidade']?>">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
</body>
</html>