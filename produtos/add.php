<?php
include('../seguranca.php');
include('../conexao.php');
if($_FILES){
    $usuario_id = $_SESSION['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $preco = str_ireplace('.','',$preco);
    $preco = str_ireplace(',','.',$preco);
    $quantidade = $_POST['quantidade'];
    $fonecedor_id = $_POST['fornecedor_id'];
    $dir = "../img_produtos";
    $file = $_FILES['img'];
    $caminho_da_img = $dir."/".$file['name'];
    move_uploaded_file($file["tmp_name"], $caminho_da_img);
    $sql = "insert into produtos (nome,preco,quantidade,img,usuario_id,fornecedor_id) values ('$nome','$preco','$quantidade','$caminho_da_img','$usuario_id','$fonecedor_id')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    header("location: index.php");
}
?>
<html>
<head>
<title>Cadastro de produtos</title>
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
<h1>Cadastro de produtos</h1>

<form method="post" action="add.php" enctype="multipart/form-data">

    <div class="mb-3">
        <label class="form-label">Nome Do Produto:</label>
        <input type="text" name="nome" placeholder="Qual o nome do produto?" required class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Preco Produto:</label>
        <input type="text" name="preco" id="preco" placeholder="Digite o preco do produto" required class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Quantidade produto:</label>
        <input type="number" name="quantidade" placeholder="Digite a quantidade do produto" required class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Imagem produto:</label>
        <input type="file" name="img" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Fornecedor do produto:</label>
        <select class="form-label" name="fornecedor_id">
            <option value=""></option>
            <?php
            $consulta = $conexao->query("select * from fornecedores");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            ?>
            <option value="<?php echo $linha['id'];?>"><?php echo $linha['nome'];?></option>
            <?php
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar produto</button>

</form>


</div>
</body>
</html>

