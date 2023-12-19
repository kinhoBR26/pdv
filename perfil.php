<?php
include('seguranca.php');
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>
    <link rel="icon" href="https://www.w3schools.com/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php include 'menu.php';?>
    Olá <?php echo $_SESSION['nome']?>, Seja Bem Vindo!<br>
    <a href="alterar_senha.php" class="btn btn-primary">Alterar Senha</a><br><br>
    <a href="alterar_img.php" class="btn btn-secondary">Alterar Imagem</a><br><br>
    <?php
    if($_SESSION['img'] == false){
        echo "<img src='/img/sem_imagem_perfil.png' width='100px' height='auto'>";
    }else{
        $caminho_img = $_SESSION['img'];
        echo "<img src='$caminho_img' width='100px' height='auto'>";
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>