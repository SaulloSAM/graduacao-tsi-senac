<?php
    /**
     * Pegar no banco uma lista de interesses.
     * Retorno $array
     */
    function get_interesses () {
        $json_file = file_get_contents("https://interested-api.herokuapp.com/interests");

        echo "<script>console.log('Retorno Lista de Interesses: ', ". $json_file .");</script>";

        $list = json_decode($json_file);
        return $list->{'interests'};
    }

    /**
     * Pegar no banco o interesse de acordo com o seu ID.
     * Parâmentro $id - Padrão null.
     * Retorno $array - Padrão null.
     */
    function get_interesses_id ($id = null) {
        if ($id != null) {
            $json_file = file_get_contents("https://interested-api.herokuapp.com/interests/$id");   

            echo "<script>console.log('Retorno Lista de Interesses/ID: ', ". $json_file .");</script>";

            $list = json_decode($json_file);
            return $list->{'interest'};
        } else {
            return $id;
        }
    }

    /**
     * Pegar no banco uma lista de interesses de acordo com o ID do Criador.
     * Parâmentro $creator - Padrão null.
     * Retorno $array - Padrão null.
     */
    function get_my_interesses ($creator = null) {
        if ($creator != null) {
            $json_file = file_get_contents("https://interested-api.herokuapp.com/interests/my/$creator");
    
            echo "<script>console.log('Retorno Lista de Interesses/Criador: ', ". $json_file .");</script>";

            return $json_file;
        } else {
            return $creator;
        }
    }

    function set_interesses ($nome, $desc, $preco, $categoria, $urlImg, $auth) {
        // Criando um novo recurso de cURL.
        $url = 'https://interested-api.herokuapp.com/interests';
        $cURL = curl_init($url);

        // pedido de configuração para enviar json via POST
        $data = array(
            '_category' => "",
            'name' => "",
            'description' => "",
            'price' => "",
            "interestImage" => ""
        );

        // Passando valores ao array
        $data["_category"] = $categoria;
        $data["name"] = $nome;
        $data["description"] = $desc;
        $data["price"] = $preco;
        $data["interestImage"] = $urlImg;


        // Transformando array em json
        $json = json_encode($data);

        // Anexar string JSON codificada aos campos POST
        curl_setopt($cURL, CURLOPT_POSTFIELDS, $json); 

        // Defina o tipo de conteúdo para application / json
        $type = "Content-Type:application/json";
        $xAuth ="x-auth:$auth";
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array($type, $xAuth));

        // resposta de retorno em vez de produzir
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

        // executar a solicitação POST
        $result = curl_exec($cURL);

        // fechar recurso cURL
        curl_close($cURL);

        echo "<script>console.log('Retorno Cadastro de Interesses: ', ". $result .");</script>";

        return $result;
    }
?>