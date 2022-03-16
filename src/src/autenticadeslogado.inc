<?php
session_start();
    if(isset($_SESSION["username"]) OR isset($_SESSION["senha_cript"]))
    {
        header("Location: home.php");
        exit;
    }
?>