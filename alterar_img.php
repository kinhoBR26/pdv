<?php
if($_FILES){
    $dir = "img_perfil/";
// recebendo o arquivo multipart
    $file = $_FILES["img"];
    $caminho_da_img = $dir."/".$file['name'];
// Move o arquivo da pasta temporaria de upload para a pasta de destino
    if (move_uploaded_file($file["tmp_name"], $caminho_da_img)) {
        echo "Arquivo enviado com sucesso!";
    }
    else {
        echo "Erro, o arquivo n&atilde;o pode ser enviado.";
    }
    //com o id da sessão do usuario vamos atualizar a tabela usuarios no campo img.
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

    <form method="post" action="alterar_img.php" enctype="multipart/form-data">
        <input type="file" name="img" class="form-control">
        <button type="submit" class="btn btn-primary">Atualizar Senha</button>
    </form>




</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>