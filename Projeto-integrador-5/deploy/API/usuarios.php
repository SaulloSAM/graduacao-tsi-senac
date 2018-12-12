<?php
    /**
     * Salvar no banco um novo Usuario.
     * Parâmetros $email, $senha, $nome, $cpf, $telefone, $celular, $whatsapp.
     * Retorno boolean.
     */
    function singup_usuario ($email, $senha, $nome, $cpf, $telefone, $celular, $whatsapp) {
        // Criando um novo recurso de cURL.
        $url = 'https://interested-api.herokuapp.com/users/signup';
        $cURL = curl_init($url);

        // pedido de configuração para enviar json via POST
        $data = array(
            'email' => "",
            'password' => "",
            "fullName" => "",
            "cpf" => "",
            "telephone" => "",
            "cellphone" => "",
            "useWhatsapp" => ""
        );

        // Passando valores ao array
        $data["email"] = $email;
        $data["password"] = $senha;
        $data["fullName"] = $nome;
        $data["cpf"] = $cpf;
        $data["telephone"] = $telefone;
        $data["cellphone"] = $celular;
        $data["useWhatsapp"] = $whatsapp;

        // Transformando array em json
        $json = json_encode($data);

        // Anexar string JSON codificada aos campos POST
        curl_setopt($cURL, CURLOPT_POSTFIELDS, $json); 

        // Traz o header da API junto com o json
        curl_setopt($cURL, CURLOPT_HEADER, true);        

        // Defina o tipo de conteúdo para application / json
        $type = "Content-Type:application/json";
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array($type));

        // resposta de retorno em vez de produzir
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

        // executar a solicitação POST
        $result = curl_exec($cURL);

        // fechar recurso cURL
        curl_close($cURL);

        // Se o retorno for 201 - Sucesso.     
        if (preg_match("/201 /", $result)) {
            
            // Salvando informações do usuário na Sessão.
            $result = explode("X-Auth", $result);
            $result = explode("Content-Type", $result[1]);
            $autorizacao =  str_replace(":", "", $result[0]);
            $result = explode('{"user":', $result[1]);
            $usuario = json_decode( ('{"user":' . $result[1]) );

            criar_sessao($autorizacao, $usuario);

            return true;

        } else {
            return false;
        }
    }

    /**
     * Efetuar o Login do Usuario.
     * Parâmetros $email, $senha.
     * Retorno boolean.
     */
    function singin_usuario ($email, $senha) {
        // Criando um novo recurso de cURL.
        $url = 'https://interested-api.herokuapp.com/users/signin';
        $cURL = curl_init($url);

        // pedido de configuração para enviar json via POST
        $data = array(
            'email' => "",
            'password' => ""
        );

        // Passando valores ao array
        $data["email"] = $email;
        $data["password"] = $senha;

        // Transformando array em json
        $json = json_encode($data);

        // Anexar string JSON codificada aos campos POST
        curl_setopt($cURL, CURLOPT_POSTFIELDS, $json); 

        // Traz o header da API junto com o json
        curl_setopt($cURL, CURLOPT_HEADER, true);        

        // Defina o tipo de conteúdo para application / json
        $type = "Content-Type: application/json";
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array($type));

        // resposta de retorno em vez de produzir
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

        // executar a solicitação POST
        $result = curl_exec($cURL);

        // fechar recurso cURL
        curl_close($cURL);

        // Se o retorno for 200 - Sucesso.     
        if (preg_match("/200 /", $result)) {
            
            // Salvando informações do usuário na Sessão.
            $result = explode("X-Auth", $result);
            $result = explode("Content-Type", $result[1]);
            $autorizacao =  str_replace(":", "", $result[0]);
            $result = explode('{"user":', $result[1]);
            $usuario = json_decode( ('{"user":' . $result[1]) );

            criar_sessao($autorizacao, $usuario);

            return true;

        } else {
            return false;
        }
    }

    /**
     * Atualizar Cadastro.
     * Parâmetros $email, $senha. 
     */
    function atualizar_usuario ($nome, $cpf, $telefone, $celular, $whatsapp, $auth) {
        // Criando um novo recurso de cURL.
        $url = 'https://interested-api.herokuapp.com/users';
        $cURL = curl_init($url);

        // pedido de configuração para enviar json via POST
        $data = array(
            'fullName' => "",
            'cpf' => "",
            'telephone' => "",
            'cellphone' => "",
            'useWhatsapp' => ""
        );

        // Passando valores ao array
        $data["fullName"] = $nome;
        $data["cpf"] = $cpf;
        $data["telephone"] = $telefone;
        $data["cellphone"] = $celular;
        $data["useWhatsapp"] = $whatsapp;

        // Transformando array em json
        $json = json_encode($data);

        // Anexar string JSON codificada aos campos POST
        curl_setopt($cURL, CURLOPT_POSTFIELDS, $json); 

        // Traz o header da API junto com o json
        curl_setopt($cURL, CURLOPT_HEADER, true);        

        // Defina o tipo de conteúdo para application / json
        $type = "Content-Type: application/json";
        $auth = "x-auth:$auth";
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array($type, $auth));

        // resposta de retorno em vez de produzir
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

        // executar a solicitação POST
        $result = curl_exec($cURL);

        echo  $result;

        // fechar recurso cURL
        curl_close($cURL);

        // Se o retorno for 200 - Sucesso.     
        if (preg_match("/200 /", $result)) {
            
            // Salvando informações do usuário na Sessão.
            $result = explode("X-Auth", $result);
            $result = explode("Content-Type", $result[1]);
            $autorizacao =  str_replace(":", "", $result[0]);
            $result = explode('{"user":', $result[1]);
            $usuario = json_decode( ('{"user":' . $result[1]) );

            criar_sessao($autorizacao, $usuario);

            return true;

        } else {
            return false;
        }
    }

    /**
     * Cria a sessão do usuário logado ou cadastrado.
     * Parâmetros $email, $senha.
     */
    function criar_sessao ($autorizacao, $usuario) {
        include_once ("SESSION.php");
        $_SESSION["logado"] = true;
        $_SESSION["xAuth"] = $autorizacao;

        $_SESSION["email"] = $usuario->{"user"}->{"email"};
        $_SESSION["carteira"] = $usuario->{"user"}->{"wallet"};
        $_SESSION["chaves"] = $usuario->{"user"}->{"keys"};
        $_SESSION["nome"] = $usuario->{"user"}->{"fullName"};
        $_SESSION["cpf"] = $usuario->{"user"}->{"cpf"};
        $_SESSION["telefone"] = $usuario->{"user"}->{"telephone"};
        $_SESSION["celular"] = $usuario->{"user"}->{"cellphone"};

        if ( $usuario->{"user"}->{"useWhatsapp"} ) {
            $_SESSION["carteira"] = true;
        } else {
            $_SESSION["carteira"] = false;                
        }
    }
?>