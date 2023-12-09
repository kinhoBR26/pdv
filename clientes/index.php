<?php include('../conexao.php'); ?>
<html>
<head>
    <title>Listar Clientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php include '../menu.php';?>
    <h1>Listar Clientes <a href="add.php">+</a></h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $consulta = $conexao->query("select * from clientes");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <th scope="row"><?php echo $linha["id"]?></th>
            <td><?php echo $linha["nome"]?></td>
            <td><?php echo $linha["email"]?></td>
            <td>
                <a href="delete.php?id=<?php echo $linha["id"]?>" onclick="return confirm('Deseja realmente excluir?')"><button type="button" class="btn btn-danger">Excluir</button></a>
                <a href="edit.php?id=<?php echo $linha["id"]?>"> <button type="button" class="btn btn-dark">Editar</button></a>
            </td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</div>
</body>
</html>