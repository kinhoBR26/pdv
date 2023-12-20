<?php
include('../seguranca.php');
include('../conexao.php');
?>
<html>
<head>
    <title>Listar Fornecedores</title>
    <?php include('../header_bootstrap.php');?>
</head>
<body>
<div class="container">
    <?php include '../menu.php';?>
    <h1>Listar Fornecedores <a href="add.php"><i class="bi bi-plus-circle-fill"></i></a></h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone</th>
            <th scope="col">Telefone</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $consulta = $conexao->query("select * from fornecedores");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <th scope="row"><?php echo $linha["id"]?></th>
                <td><?php echo $linha["nome"]?></td>
                <td><?php echo $linha["email"]?></td>
                <td><?php echo $linha["telefone"]?></td>
                <td>
                    <a href="delete.php?id=<?php echo $linha["id"]?>" onclick="return confirm('Deseja realmente excluir?')"><button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                    <a href="update.php?id=<?php echo $linha["id"]?>"> <button type="button" class="btn btn-dark"><i class="bi bi-pencil-square"></i></button></a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
</body>
</html>