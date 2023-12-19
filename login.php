<?php
include "conexao.php";
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$sql = "SELECT * FROM usuarios where email='$email' and senha='$senha'";
$result = $conexao->query($sql);
$login=$result->fetch(PDO::FETCH_ASSOC);
session_start();
if ($login) {
    $_SESSION['usuario_logado']=true;
    $_SESSION['id']=$login['id'];
    $_SESSION['nome']=$login['nome'];
    $_SESSION['email']=$login['email'];
    if($login['img']!=""){
        $_SESSION['img']=$login['img'];
    }else{
        $_SESSION['img']= false;
    }
    header("location: inicio.php");

    echo "Login bem-sucedido. Bem-vindo, " . $login['email'] . "!";
} else {
    echo "Nome de usuário ou senha incorretos.";
}
?>