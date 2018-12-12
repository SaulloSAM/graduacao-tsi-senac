<?php
    session_start();
    $_SESSION['logado'] = false;
    $_SESSION['tipo'] = "";
    $_SESSION['email'] = "";
    session_destroy();
    header ("Location: index.php");
?>