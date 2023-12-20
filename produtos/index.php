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
    <h1>Listar Produtos <a href="add.php"><i class="bi bi-plus-circle-fill"></i></a></h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Preco</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Imagem</th>
            <th scope="col">Fornecedor</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $consulta = $conexao->query("SELECT 
                                                produtos.id,
                                                produtos.nome,
                                                produtos.preco,
                                                produtos.quantidade,
                                                produtos.img,
                                                fornecedores.nome AS NomeFornecedor
                                      FROM
                                                produtos
                                      LEFT JOIN
                                                fornecedores ON (fornecedores.id = produtos.fornecedor_id)");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <th scope="row"><?php echo $linha["id"]?></th>
                <td><?php echo $linha["nome"]?></td>
                <td>R$ <?php echo number_format($linha["preco"],2,",","."); ?></td>
                <td><?php echo $linha["quantidade"]?></td>
                <td><a href="<?php echo $linha["img"]?>" target="_blank"><img src="<?php echo $linha["img"]?>" width="40px"height="auto"></a></td>
                <td><?php echo $linha["NomeFornecedor"]?></td>
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