<?php
    session_start();
        if($_SESSION['usuario_logado']!=true){
            header("location: /pdv/index.php");
        }
?>
