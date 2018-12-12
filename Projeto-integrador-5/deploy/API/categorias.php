<?php
    /**
     * Salvar no banco uma nova Categoria.
     * Parâmetros $nome, $descricao.
     * Retorno boolean.
     */
    function set_categoria ($nome, $descricao, $autorizacao) {
        // Criando um novo recurso de cURL.
        $url = 'https://interested-api.herokuapp.com/categories';
        $cURL = curl_init($url);

        // pedido de configuração para enviar json via POST
        $data = array(
            'name' => "",
            'description' => ""
        );

        // Passando valores ao array
        $data["name"] = $nome;
        $data["description"] = $descricao;

        // Transformando array em json
        $json = json_encode($data);

        // Anexar string JSON codificada aos campos POST
        curl_setopt($cURL, CURLOPT_POSTFIELDS, $json); 

        // Defina o tipo de conteúdo para application / json
        $type = "Content-Type:application/json";
        $xAuth ="x-auth:$autorizacao";
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array($type, $xAuth));

        // resposta de retorno em vez de produzir
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

        // executar a solicitação POST
        $result = curl_exec($cURL);

        // fechar recurso cURL
        curl_close($cURL);

        echo "<script>console.log('Retorno do Cadastro de Categoria: ', ".$result.");</script>";

        return $result;
    }

    /**
     * Pegar no banco uma lista de categoria.
     * Retorno $array
     */
    function get_categorias () {
        $json_file = file_get_contents("https://interested-api.herokuapp.com/categories");   
        
        echo "<script>console.log('Retorno Lista de Categorias: ', ". $json_file .");</script>";

        $list = json_decode($json_file);
        return $list->{'categories'};
    }
?>