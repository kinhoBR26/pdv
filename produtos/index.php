<?php
include('../seguranca.php');
include('../conexao.php');
?>
<html>
<head>
    <title>Listar Produtos</title>
    <?php include('../header_bootstrap.php');?>
</head>
<body>
<div class="container">
    <?php include '../menu.php';?>
    <h1>Listar Produtos <a href="add.php">+</a></h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Preco</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Imagem</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $consulta = $conexao->query("select * from produtos");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <th scope="row"><?php echo $linha["id"]?></th>
                <td><?php echo $linha["nome"]?></td>
                <td><?php echo $linha["preco"]?></td>
                <td><?php echo $linha["quantidade"]?></td>
                <td><a href="<?php echo $linha["img"]?>" target="_blank"><img src="<?php echo $linha["img"]?>" width="40px"height="auto"></a></td>
                <td>
                    <a href="delete.php?id=<?php echo $linha["id"]?>" onclick="return confirm('Deseja realmente excluir?')"><button type="button" class="btn btn-danger">Excluir</button></a>
                    <a href="update.php?id=<?php echo $linha["id"]?>"> <button type="button" class="btn btn-dark">Editar</button></a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
</body>
</html>