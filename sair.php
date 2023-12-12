<?php
session_start();
    $_SESSION['usuario_logado']="";
    $_SESSION['id']="";
    $_SESSION['nome']="";
    $_SESSION['email']="";
    header("location: index.php");
?>
