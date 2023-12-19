<?php
session_start();
include('../seguranca.php');
include('../conexao.php');
if ($_POST) {
    $usuario_id = $_SESSION['id'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sql = "UPDATE usuarios SET nome = '$nome',email = '$email' WHERE (id = '$id')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    header("location: index.php");
}

$id_usuario_alterar = $_GET['id'];
$consulta = $conexao->query("select * from usuarios where id='$id_usuario_alterar'");
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
    <h1>Atualizar Usuario</h1>

    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="nome" placeholder="Qual o seu nome?" required class="form-control" value="<?php echo $linha['nome']?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" placeholder="Qual o seu E-Mail?" required class="form-control" value="<?php echo $linha['email']?>">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
</body>
</html>