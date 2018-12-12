<?php
    /* INTERESSES */
    function get_interesses () {
        $json_file = file_get_contents("https://interested-api.herokuapp.com/interests");   
        $list = json_decode($json_file);
        return $list;
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        //Deleta no banco.
        header("Location:lista-de-desejos.php?action=" . $id);
    }
?>