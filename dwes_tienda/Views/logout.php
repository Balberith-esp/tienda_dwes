<?php
    session_start();
    unset($_SESSION["logueado"]); 
    unset($_SESSION["cesta"]); 
    header("Location: inicio.php");
?>