<?php
include('seguranca.php');
include('conexao.php');
if($_FILES){
    $dir = "img_perfil/";
    $file = $_FILES["img"];
    $caminho_da_img = $dir."/".$file['name'];
    if (move_uploaded_file($file["tmp_name"], $caminho_da_img)) {
        $id_usuario = $_SESSION['id'];
        $sql = "update usuarios set img = '$caminho_da_img' where id = '$id_usuario'";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        echo "Arquivo enviado com sucesso!";
    }
    else {
        echo "Erro, o arquivo n&atilde;o pode ser enviado.";
    }
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>
    <link rel="icon" href="https://www.w3schools.com/favicon.ico">
    <?php include('header_bootstrap.php');?>
</head>
<body>
<div class="container">
    <?php include 'menu.php';?>
    <form method="post" action="alterar_img.php" enctype="multipart/form-data">
        <input type="file" name="img" class="form-control">
        <button type="submit" class="btn btn-primary">Atualizar imagem</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
