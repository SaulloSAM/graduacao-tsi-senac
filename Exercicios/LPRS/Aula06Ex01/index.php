<?php
    include_once 'conn.php';

    if ( count($_POST) > 0 ) {
        // Validando Usuário
        $email = $_POST['login'];
        $senha = $_POST['senha'];
        $hash = password_hash($senha , PASSWORD_BCRYPT);
        
        if (estaPreparado($email) && estaPreparado($senha)) {          
            // Preparando SQL.
            $sql = "SELECT email, senha, tipo FROM usuarios WHERE email=?";

            if (!$stmt = $conn->prepare($sql)) { die ("Erro ao Preparar SQL: ".$conn->error); }

            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (password_verify($senha, $row['senha'])) {

                        // Cria uma sessão para o usuário e grava quem é o usuário.
                        session_start();    
                        $_SESSION['logado'] = true;
                        $_SESSION['tipo'] = $row['tipo'];
                        $_SESSION['email'] = $row['email'];
                        header ("Location: usu.php");

                    } else {

                        header ("Location: index.php?erro");
                    }
                }                
            } else {
                header ("Location: index.php?erro");
            }
            
        } else {
            header('Location: index.php?invalido');
        }
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Página Privada</title>
</head>

<body class="container-fluid" style="height: 100vh">

    <main class="container d-flex justify-content-center">
        <div style="width: 500px; height: 100vh" class="d-flex align-items-center bg-dark">
            <div class="d-block w-100">
                <form action="index.php" method="POST" class="px-5">
                
                    <div class="form-group">
                        <label class="text-light" for="login">Login</label>
                        <input type="text" name="login" id="login" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="text-light" for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="d-block ml-auto btn btn-success" value="Entrar">
                    </div>

                </form>
                <div class="px-5">
                    <?php feedback_get("erro", "Atenção: ", "Login ou Senha inválidos."); ?>
                    <?php feedback_get("invalido", "Atenção: ", "Valores inseridos inválidos"); ?>
                    <?php feedback_get("sucesso", "Sucesso: ", "Usuário cadastrado com sucesso. Faça seu login."); ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>