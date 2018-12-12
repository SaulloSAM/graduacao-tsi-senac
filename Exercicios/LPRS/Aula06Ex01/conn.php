<?php
    $conn = new mysqli("localhost", "root", "", "Aula5Ex01");
    if ($conn->connect_error) { header ("Location: db.php"); die(); }
    include_once 'function.php';
?>
