<?php
    // Create connection
    $conn = new mysqli("localhost", "root", "", "ADOex04");

    // Check connection
    if ($conn->connect_error) {
        header ("Location: db.php");
        die();
    }

    if($_SERVER["HTTPS"] != "on") {
        $pageURL = "Location: https://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        header($pageURL);
    }

?>
