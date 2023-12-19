<?php
include('../seguranca.php');
include('../conexao.php');
if($_FILES){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $dir = "../img_perfil";
    $file = $_FILES['img'];
    $caminho_da_img = $dir."/".$file['name'];
    move_uploaded_file($file["tmp_name"], $caminho_da_img);
    $sql = "insert into usuarios  (nome,email,senha,img) values ('$nome','$email','$senha','$caminho_da_img')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    header("location: index.php");
}
?>
<html>
<head>
    <title>Cadastro de Usuários</title>
    <?php include('../header_bootstrap.php');?>
</head>
<body>
<div class="container">
    <?php include '../menu.php';?>
<h1>Cadastro de Usuários</h1>

<form method="post" action="add.php" enctype="multipart/form-data">

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

    <div class="mb-3">
        <label class="form-label">Imagem perfil:</label>
        <input type="file" name="img" required class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>

</form>

</div>
</body>
</html>