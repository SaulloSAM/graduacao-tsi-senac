<?php
require 'connect.php';

// sql to delete a record
$sql = "DELETE FROM agenda";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

header ('location: index.php');
?>