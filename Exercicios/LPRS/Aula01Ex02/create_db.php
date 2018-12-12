<?php
$servername = "localhost";
$username = "root";

// Create connection
$conn = new mysqli($servername, $username);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE agendatelefone";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br />";
} else {
    echo "Error creating database: " . $conn->error;
}

$sql = "CREATE USER 'saulo'@'localhost' IDENTIFIED BY 'cQGpKGJNZu5rztQE'";
if ($conn->query($sql) === TRUE) {
    echo "User saulo created successfully<br />";
} else {
    echo "Error creating user: " . $conn->error;
}

$sql = "GRANT ALL PRIVILEGES ON `agendatelefone`.* TO 'saulo'@'localhost'";
if ($conn->query($sql) === TRUE) {
    echo "Permission granted successfully<br />";
} else {
    echo "Error granting permission: " . $conn->error;
}

$conn->close();

header ('location: index.php');
?>
