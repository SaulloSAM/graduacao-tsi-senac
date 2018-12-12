<?php
    include_once 'function.php';

    if (count($_POST) > 0) {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confSenha = $_POST['confSenha'];

        if ( !(isEmpty($nome) || isEmpty($email) || isEmpty($senha) || isEmpty($confSenha)) ) {
            
            if (estaPreparado($senha) && estaPreparado($email) && estaPreparado($nome) ) {

                if (!isTop10000($senha)) {

                    if (isEquals($senha, $confSenha)) {
                        
                        include_once 'conn.php';

                        $sql = "SELECT email FROM usuarios WHERE email=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Se == 0 Email ainda não cadastrado. Se == 1 email jpa cadastrado.
                        if ($result->num_rows == 0) {
                            
                            $hash = password_hash($senha , PASSWORD_BCRYPT);
    
                            // Preparando SQL
                            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?,?,?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("sss", $nome, $email, $hash);
                            $stmt->execute();
                            if (!$stmt->execute()) {
                                header ("Location: cadastro.php?db");
                            } else {
                                header ("Location: index.php?sucesso");
                            }

                        } else {
                            header ("Location: cadastro.php?usuario");
                        }

                    } else {
                        header ("Location: cadastro.php?senha");
                    }

                } else {
                    header ("Location: cadastro.php?top10000"); 
                }

            } else {
                header ("Location: cadastro.php?invalido");
            }
        } else {
            header ("Location: cadastro.php?erro");
        }

    } else {
        $nome = "";
        $email = "";
    }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Cadastro</title>

    <style>
        .box {
            max-width: 400px;
            padding: 30px;
            margin: 50px auto 0 auto;
            border-radius: 5px;
            background: #f7f6f5;
            box-shadow: 3px 3px 6px 0px #e9e9e9;
        }
    </style>
</head>

<body class="container-fluid py-5">

    <main> 

        <form class="box" action="cadastro.php" method="POST">
            <h2 class="lead mb-4 text-primary text-center" >Cadastro de Usuário</h2>

            <div class="form-group">
                <input type="text" class="form-control" name="nome" id="email" placeholder="Digite seu nome" value="<?=$nome?>">
            </div>

            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail" value="<?=$email?>">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="confSenha" id="confSenha" placeholder="Confirmar Senha">
            </div>

            <div class="form-group mb-0 pt-3">
                <input type="submit" class="btn btn-success d-block w-100" value="Cadastrar">
                <a href="index.php" class="btn btn-danger d-block w-100">Voltar</a>
            </div>

            <?php feedback_get("db", "Erro: ", "Não foi possível efetuar o cadastro."); ?>
            <?php feedback_get("erro", "Atenção: ", "Todos os campos são obrigatórios."); ?>
            <?php feedback_get("usuario", "Atenção: ", "Usuário já cadastrado."); ?>
            <?php feedback_get("senha", "Atenção: ", "Senha e Confirma senha devem ser iguais."); ?>
            <?php feedback_get("invalido", "Atenção: ", "Valores inválidos inserido. Tente novamente."); ?>
            <?php feedback_get("top10000", "Atenção: ", "Sua senha faz parte da lista <b>TOP 10000</b> de senhas fáceis."); ?>

        </form>

    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>
