<?php

/* Configurações para a conn */
$servername = "localhost";
$username = "saulo";
$password = "cQGpKGJNZu5rztQE";
$dbname = "agendatelefone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

