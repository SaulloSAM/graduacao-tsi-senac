<?php
    /**
     * Pegar no banco uma lista de chaves de acesso.
     * Retorno $array
     */
    function get_chaves () {
        $json_file = file_get_contents("https://interested-api.herokuapp.com/keys");

        echo "<script>console.log('Retorno Lista de Chaves: ', ". $json_file .");</script>";        

        $list = json_decode($json_file);
        return $list->{'keys'};
    }
?>