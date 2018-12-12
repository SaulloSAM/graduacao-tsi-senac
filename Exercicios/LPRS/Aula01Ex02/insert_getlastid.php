<?php
    require 'connect.php';

    $nome = $_POST["nome"];
    $dd = $_POST["dd"];
    $numero = $_POST["numero"];

    $sql = "INSERT INTO agenda (nome, dd, numero) VALUES ('$nome', '$dd', '$numero')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "New record created successfully. Last inserted ID is: " . $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header ('location: index.php');
?>