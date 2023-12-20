<?php
include('seguranca.php');
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema</title>
    <link rel="icon" href="https://www.w3schools.com/favicon.ico">
    <?php include('header_bootstrap.php');?>
</head>
<body>
<div class="container">
    <?php include 'menu.php';?>
    <h1>Seja bem vindo, <?php echo $_SESSION['nome']?>!</h1>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>