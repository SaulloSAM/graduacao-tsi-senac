<?php
    /**
     * Pegar no banco uma lista de Endereços.
     * Retorno $array
     */
    function get_endereco ($auth) {
        // Criando um novo recurso de cURL.
        $url = 'https://interested-api.herokuapp.com/addresses/';
        $cURL = curl_init($url);

        // Traz o header da API junto com o json
        curl_setopt($cURL, CURLOPT_HEADER, true);        

        // Defina o tipo de conteúdo para application / json
        $type = "Content-Type:application/json";
        $xauth = "x-auth: $auth";
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array($type, $xauth));

        // resposta de retorno em vez de produzir
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

        // executar a solicitação POST
        $result = curl_exec($cURL);

        var_dump($result);

        echo "<script>console.log('Retorno Lista de Endereco: ', ". $$result .");</script>";

        // fechar recurso cURL
        curl_close($cURL);
    }

    function set_endereco ($nome, $referencia, $rua, $cep, $numero, $complemento, $bairro, $cidade, $uf, $auth) {
        // Criando um novo recurso de cURL.
        $url = 'https://interested-api.herokuapp.com/addresses';
        $cURL = curl_init($url);

        // pedido de configuração para enviar json via POST
        $data = array (
            'name' => "",
            'reference' => "",
            'streetAddress' => "",
            'postalCode' => "",
            'number' => "",
            'complement' => "",
            'neighborhood' => "",
            'city' => "",
            'uf' => ""
        );

        // Passando valores ao array
        $data["name"] = $nome;
        $data["reference"] = $referencia;
        $data["streetAddress"] = $rua;
        $data["postalCode"] = $cep;
        $data["number"] = $numero;
        $data["complement"] = $complemento;
        $data["neighborhood"] = $bairro;
        $data["city"] = $cidade;
        $data["uf"] = $uf;

        // Transformando array em json
        $json = json_encode($data);
        echo "<script>console.log('JSON - Cadastro de Endereços:',".$json.");</script>";

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

		echo "<script>console.log('Retorno do Cadastro de Endereço: ', ".$result.");</script>";

        return $result;
    }
?>