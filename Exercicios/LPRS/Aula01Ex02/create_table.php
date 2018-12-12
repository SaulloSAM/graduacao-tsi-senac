<?php
require 'connect.php';

// sql to create table
$sql = "CREATE TABLE agenda (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(30) NOT NULL,
dd INT(30) NOT NULL,
numero INT(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table agenda created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

header ('location: index.php');
?>