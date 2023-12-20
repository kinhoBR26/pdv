<?php
session_start();
include('../seguranca.php');
include('../conexao.php');
if ($_POST) {
    $usuario_id = $_SESSION['id'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sql = "UPDATE fornecedores SET nome = '$nome',email = '$email',telefone='$telefone' WHERE (id = '$id')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    header("location: index.php");
}

$id_cliente_alterar = $_GET['id'];
$consulta = $conexao->query("select * from fornecedores where id='$id_cliente_alterar'");
$linha = $consulta->fetch(PDO::FETCH_ASSOC);

?>
<html>
<head>
    <title>Atualizar Fornecedores</title>
    <?php include('../header_bootstrap.php');?>
</head>
<body>
<div class="container">
    <?php include '../menu.php';?>
    <h1>Atualizar Fornecedores</h1>

    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        <div class="mb-3">
            <label class="form-label">Nome Fornecedor:</label>
            <input type="text" name="nome" placeholder="Qual o nome do fornecedor?" required class="form-control" value="<?php echo $linha['nome']?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Email Fornecedor:</label>
            <input type="email" name="email" placeholder="Qual o email do fornecedor?" required class="form-control" value="<?php echo $linha['email']?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone Fornecedor:</label>
            <input type="text" name="telefone" placeholder="Qual o telefone do fornecedor?" required class="form-control" value="<?php echo $linha['telefone']?>">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Fornecedor</button>
    </form>
</div>
</body>
</html>