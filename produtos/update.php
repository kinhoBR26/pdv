<?php
include('../seguranca.php');
include('../conexao.php');
if ($_FILES) {
    $usuario_id = $_SESSION['id'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco=$_POST['preco'];
    $preco = str_ireplace('.','',$preco);
    $preco = str_ireplace(',','.',$preco);
    $quantidade = $_POST['quantidade'];
    $dir = "../img_produtos";
    $file = $_FILES['img'];
    $caminho_da_img = $dir."/".$file['name'];
    move_uploaded_file($file["tmp_name"], $caminho_da_img);
    $sql = "UPDATE produtos SET nome = '$nome',preco = '$preco',quantidade='$quantidade',usuario_id='$usuario_id',img='$caminho_da_img' WHERE (id = '$id')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    header("location: index.php");
}
$id_produto_alterar = $_GET['id'];
$consulta = $conexao->query("select * from produtos where id='$id_produto_alterar'");
$linha = $consulta->fetch(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <title>Atualizar Clientes</title>
    <?php include('../header_bootstrap.php');?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/gh/plentz/jquery-maskmoney@master/dist/jquery.maskMoney.min.js" type="text/javascript"></script>
    <script>
        $(function(){
            $('#preco').maskMoney({
                prefix:'',
                allowNegative: true,
                thousands:'.', decimal:',',
                affixesStay: true});
        })
    </script>
</head>
<body>
<div class="container">
    <?php include '../menu.php';?>
    <h1>Atualizar Produto</h1>

    <form method="post" action="update.php" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">

        <div class="mb-3">
            <label class="form-label">Nome Produto:</label>
            <input type="text" name="nome" placeholder="Qual o nome do produto?" required class="form-control" value="<?php echo $linha['nome']?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Preço do Produto:</label>
            <input type="text" name="preco" id="preco" placeholder="Qual o preço do produto?" required class="form-control" value="<?php echo number_format($linha["preco"],2,",","."); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Quantidade produto:</label>
            <input type="number" name="quantidade" placeholder="Qual a quantidade do produto?" required class="form-control" value="<?php echo $linha['quantidade']?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Imagem produto:</label>
            <input type="file" name="img" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>

    </form>
</div>
</body>
</html>