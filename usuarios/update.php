<?php
include('../seguranca.php');
include('../conexao.php');
if ($_FILES){
    $usuario_id = $_SESSION['id'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $dir = "../img_perfil";
    $file = $_FILES['img'];
    $caminho_da_img = $dir."/".$file['name'];
    move_uploaded_file($file["tmp_name"], $caminho_da_img);
    $sql = "UPDATE usuarios SET nome = '$nome',email = '$email',img = '$caminho_da_img' WHERE (id = '$id')";
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
    <?php include('../header_bootstrap.php');?>
</head>
<body>
<div class="container">
    <?php include '../menu.php';?>
    <h1>Atualizar Usuario</h1>

    <form method="post" action="update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="nome" placeholder="Qual o seu nome?" required class="form-control" value="<?php echo $linha['nome']?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" placeholder="Qual o seu E-Mail?" required class="form-control" value="<?php echo $linha['email']?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Imagem Perfil:</label>
            <input type="file" name="img" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
</body>
</html>