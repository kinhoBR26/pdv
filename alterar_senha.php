<?php
    include('seguranca.php');
    include('conexao.php');
    if($_POST){
        $senha_atual = md5($_POST["senha_atual"]);
        $senha_nova = md5($_POST["senha_nova"]);
        $email_session = $_SESSION["email"];
        $sql="SELECT * FROM usuarios WHERE senha ='$senha_atual' and email='$email_session'";
        $consulta = $conexao->query($sql);
        $linha = $consulta->fetch(PDO::FETCH_ASSOC);
            if($linha){
                $sql = "UPDATE usuarios SET senha = '$senha_nova' WHERE (email = '$email_session')";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();
                echo "Senha alterada com sucesso!";
            }else{
                echo "Senha atual inválida!";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php include 'menu.php';?>
    Olá <?php echo $_SESSION['nome']?>, Seja Bem Vindo!<br>

    <form action="alterar_senha.php" method="post">
        <div class="mb-3">
            <label class="form-label">Digite sua senha atual:</label>
            <input type="text" name="senha_atual" placeholder="Digite Sua senha Atual?" required class="form-control" value="">
        </div>
        <div class="mb-3">
            <label class="form-label">Digite sua nova senha:</label>
            <input type="text" name="senha_nova" placeholder="Digite sua nova senha?" required class="form-control" value="">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Senha</button>
    </form>



</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>