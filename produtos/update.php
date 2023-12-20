<?php
include('../seguranca.php');
include('../conexao.php');
$mensagem_erro = "";
if ($_FILES) {
    $usuario_id = $_SESSION['id'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco=$_POST['preco'];
    $preco = str_ireplace('.','',$preco);
    $preco = str_ireplace(',','.',$preco);
    $quantidade = $_POST['quantidade'];
    $fornecedor_id = $_POST['fornecedor_id'];
    $dir = "../img_produtos";
    $file = $_FILES['img'];
    $formato_img = $file['type'];
    if($formato_img == "image/jpeg" or $formato_img == "image/png"){
    $caminho_da_img = $dir."/".$file['name'];
    move_uploaded_file($file["tmp_name"], $caminho_da_img);
    $sql = "UPDATE produtos SET nome = '$nome',preco = '$preco',quantidade='$quantidade',usuario_id='$usuario_id',img='$caminho_da_img',fornecedor_id='$fornecedor_id' WHERE (id = '$id')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    header("location: index.php");
    }else{
        $mensagem_erro = "Formato inválido!";
    }
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

    <form method="post" action="update.php?id=<?php echo $linha['id']?>" enctype="multipart/form-data">

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
            <input type="file" name="img" class="form-control">
        </div>


        <div class="mb-3">
            <label class="form-label">Fornecedor do produto:</label>
            <select class="form-label" name="fornecedor_id">
                <option value=""></option>
                <?php

                $consulta = $conexao->query("select * from fornecedores");
                while ($linha_fornecedor = $consulta->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <option value="<?php echo $linha_fornecedor['id'];?>" <?php if($linha_fornecedor['id']==$linha['fornecedor_id']) echo "selected";?>><?php echo $linha_fornecedor['nome'];?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>

        <?php
        if($mensagem_erro !=""){
            echo "<div class='alert alert-danger' role='alert'>
                $mensagem_erro
              </div>";
        }
        ?>
    </form>
</div>
</body>
</html>