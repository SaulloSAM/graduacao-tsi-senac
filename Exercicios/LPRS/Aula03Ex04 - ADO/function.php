<?php

    function estaPreparado ($val) {
        if (preg_match('/^[\w\#\!\?\.\@\-]+$/', $val)) {
            return true;
        } else {
            return false;
        }
    }

    function isTop10000 ($value) {
        $arquivo = fopen("top10000.txt", "r");
        
        if ($arquivo) {

            while ( ($linha = fgets($arquivo)) !== false ) {
                if (trim($linha) === $value) {
                    fclose($arquivo);
                    return true;
                }
            }

            fclose($arquivo);
            return false;

        }
    }

    function isEquals ($a, $b) {
        if (trim($a) === trim($b)) {
            return true;
        }

        return false;
    }

    function isEmpty ($value) {
        if (trim($value) == "") {
            return true;
        }

        return false;
    }

    function feedback_get ($parametro, $titulo, $info) {
        $color = "warning";
        if (isEquals($parametro, "sucesso")) $color = "success";
        if (isEquals($parametro, "erro")) $color = "danger";

        if (array_key_exists($parametro, $_GET)) { 
            echo "<div class='alert alert-$color mt-3 text-center'><strong>$titulo</strong><br>$info</div>";
            return true;
        } else {
            return false;
        }
    }

    function console($data) {
        echo "<script>console.log($data)</script>";
    }

?>