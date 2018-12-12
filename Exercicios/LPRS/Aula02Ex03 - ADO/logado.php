<?php
    // Caminho para o Banco 
    $servername = "localhost";
    $username = "dinak";
    $password = "temos42comoResposta";
    $database = "loja";

    // Criando uma Conexão com o db.
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Verificanco a Conexão com o db.
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // -----------------------------------------------------------------------

    // Post Página de Login
    $login = $_POST["email"];
    $pass = $_POST["senha"];

    // Validadores de Email e Senha.
    $v1 = '/^[\w\#\!\?\.\@\-]+$/';
    $v2 = '/^[\w\#\!\?]{4,}$/';

    // Preparando Login e Senha.
    if (!preg_match($v1, $login) || !preg_match($v2, $pass)) {
        
        path_error();

    } else {
        
        $sql = "SELECT email, senha FROM usuario WHERE email=? AND senha=?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $login, $pass);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            path_success();
        } else {
            path_error();
        }

    }

    mysqli_close($conn);

    function path_error () { header ("Location: ../Aula02EX03/?erro=senhaOUemail"); }
    function path_success () { header ("Location: ../Aula02EX03/?sucesso=ok"); }
?>