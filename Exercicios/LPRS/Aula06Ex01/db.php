<?php
    $dbname = "Aula5Ex01";
    $serverusername = "root";
    $servername = "localhost";

    $user = "root";
    $pass = "";

    $tabela = "usuarios";
?>
<!DOCTYPE html>
    <html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <title>Novo DB</title>
    </head>

    <body class="container-fluid py-5">

        <main class="container py-5">
            <div class="d-flex justify-content-center mb-5">
                <a href="index.php" class="btn btn-sm btn-danger mr-1">Voltar a página de login</a>
                <a href="db.php?acao=db" class="btn btn-sm btn-info mr-1">Novo Banco de Dados</a>
                <a href="db.php?acao=table" class="btn btn-sm btn-info mr-1">Nova Tabela</a>
                <a href="db.php?acao=user" class="btn btn-sm btn-info mr-1">Novo Usuário</a>
            </div>

            <div class="mx-auto border rounded p-5">
            <?php
                if (count($_GET) > 0) {

                    switch ($_GET['acao']) {
                        case 'db':
                            novo_db($servername, $serverusername, $dbname, $user, $pass);
                            break;
                        
                        case 'table':
                            nova_tabela($tabela);
                            break;

                        case 'user':
                            novo_usuario($tabela);
                            break;

                        case 'blacklist':
                            blacklist();
                            break;
                        
                        default:
                            echo "Ação inválida. Por favor, tente novamente.";
                    }
            
                }
            ?>
            </div>

            <div class="container alert alert-danger mt-3">
                <b>Atenção: </b>
                <span>Creie um bando de dados usando os botões acima</span>
            </div>

        </main>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    </body>
</html>
<?php
    function novo_db ($servername, $serverusername, $dbname, $user, $pass) {        
        // Conectar ao Conexão.
        $conn = new mysqli($servername, $serverusername);
        if ($conn->connect_error) { die("0 - Erro ao efetuar conexão com o banco de dados: " . $conn->connect_error); } 
        
        // Criar um Banco de Dados.
        $sql = "CREATE DATABASE $dbname";
        if ($conn->query($sql) === TRUE) { echo "1 - Banco de dados Criado com Sucesso!<br><br>"; }
        else { echo "1 - Erro ao criar banco de dados: ".$conn->error."<br><br>"; }

        // Criando usuário do Banco de Dados.
        $sql = "CREATE USER $user@localhost IDENTIFIED BY '$pass'";
        if ($conn->query($sql) === TRUE) { echo "2 - Usuário Criado com sucesso!<br><br>"; }
        else { echo "2 - Erro ao criar usuário: ".$conn->error."<br><br>"; }
        
        // Criando Privilágios para o usuário.
        $sql = "GRANT ALL PRIVILEGES ON $user.* TO $user@localhost";
        if ($conn->query($sql) === TRUE) { echo "3 - Privilégios criado"; }
        else { echo "3 - Erro ao criar privilégios: " . $conn->error; }
        
        $conn->close();
    }

    function nova_tabela ($tabela) {
        include_once 'conn.php';        
        
        // SQL para criar a tabela.
        $sql = "CREATE TABLE $tabela (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        nome VARCHAR(30) NOT NULL,
        senha VARCHAR(60) NOT NULL,
        email VARCHAR(50),
        tipo VARCHAR(3),
        reg_date TIMESTAMP
        )";
        
        // Criar a tabela.
        if ($conn->query($sql) === TRUE) { echo "Tabela Criada com sucesso!"; } 
        else { echo "Erro ao criar tabela: " . $conn->error; }
        
        $conn->close();
        
    }

    function novo_usuario ($tabela) {
        include_once 'conn.php';
        
        $hash_1 = password_hash("sinesio" , PASSWORD_BCRYPT);
        $hash_2 = password_hash("adm_sinesio" , PASSWORD_BCRYPT);
        
        $tipo_1 = "USU";
        $tipo_2 = "ADM";        

        // Valores a ser inserido.
        $sql = "INSERT INTO $tabela (nome, email, senha, tipo) VALUES ('Saulo', 'saulo@sam.com', '$hash_1', '$tipo_1')";
        if ($conn->query($sql) === TRUE) { echo "Usuário criado com sucesso!<br>"; }
        else { echo "Erro ao criar usuário: " . $sql . "<br>" . $conn->error; }

        $sql = "INSERT INTO $tabela (nome, email, senha, tipo) VALUES ('adm', 'adm@sam.com', '$hash_2', '$tipo_2')";
        if ($conn->query($sql) === TRUE) { echo "Usuário criado com sucesso!"; }
        else { echo "Erro ao criar usuário: " . $sql . "<br>" . $conn->error; }

        echo "<br><br><b>Nome:</b> Saulo | <b>E-mail:</b> saulo@sam.com | <b>Senha:</b> sinesio";
        echo "<br><br><b>Nome:</b> ADM_Saulo | <b>E-mail:</b> adm@sam.com | <b>Senha:</b> adm_sinesio";        

        $conn->close(); 
    }
?>