<?php
    include_once 'conn.php';
    include_once 'function.php';
    
    session_start();
    $_SESSION['logado'] = false;

    // Criando contadores.    
    $ano_em_dia = date ("z");
    $hora = date ("G");
    $minuto = date ("i");
    $ip = $_SERVER['REMOTE_ADDR'];
    
    // Verificando se o IP possui alguma punição.
    $sql = "SELECT ip, contador, penalidade, ano_em_dia, hora, minuto FROM blacklist WHERE ip=? AND ano_em_dia=?";
    if (!$stmt = $conn->prepare($sql)) { die ("Error prepare: " . $conn->error); }
    $stmt->bind_param("si", $ip, $ano_em_dia);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        while($r = $result->fetch_assoc()) {
            $r_ip = $r['ip'];
            $r_contador = $r['contador'];
            $r_penalidade = $r['penalidade'];
            $r_ano_em_dia = $r['ano_em_dia'];
            $r_hora = $r['hora'];
            $r_minuto = $r['minuto'];

            // Verificando Punição
            if ($r_contador == 3 || $r_contador == 6 || $r_contador == 9 || $r_contador >= 12) {
                $tempo_inicial = ($r_hora * 60) + $r_minuto;
                $tempo_agora = (date ("H") *60 ) + date ("i");
                $dif = $tempo_agora - $tempo_inicial;
                echo $dif;
                if ( $dif < $r_penalidade ) { 
                    header ("Location: bloqueado.php?$r_penalidade"); 
                } else if ($r_contador >= 12) {
                    header ("Location: bloqueado.php?dia");
                }
            }
        }
    }
    
    // Tentando Conectar o Usuário.
    if (count($_POST) > 0) {        

        $sql = "SELECT ip, contador, penalidade, ano_em_dia, hora, minuto FROM blacklist WHERE ip=? AND ano_em_dia=?";
        if (!$stmt = $conn->prepare($sql)) { die ("Error prepare: " . $conn->error); }
        $stmt->bind_param("si", $ip, $ano_em_dia);
        $stmt->execute();

        $result = $stmt->get_result();

        // Se já existir este IP | Começe a contar.
        if ($result->num_rows > 0) {
            
            while($r = $result->fetch_assoc()) {
                
                $r_ip = $r['ip'];
                $r_contador = $r['contador'];
                $r_penalidade = $r['penalidade'];
                $r_ano_em_dia = $r['ano_em_dia'];
                $r_hora = $r['hora'];
                $r_minuto = $r['minuto'];

                switch ($r_contador) {                            
                    case 2:
                    $c = $r_contador + 1;
                    $r_penalidade = 15;
                    $r_hora = date ("H");
                    $r_minuto = date ("i");
                    $conn->query("UPDATE blacklist SET contador=$c, penalidade=$r_penalidade, hora=$r_hora, minuto=$r_minuto WHERE ip='$r_ip'");
                    break;
                    
                    case 5:
                    $c = $r_contador + 1;
                    $r_penalidade = 30;
                    $r_hora = date ("H");
                    $r_minuto = date ("i");
                    $conn->query("UPDATE blacklist SET contador=$c, penalidade=$r_penalidade, hora=$r_hora, minuto=$r_minuto WHERE ip='$r_ip'");
                    break;
                    
                    case 8:
                    $c = $r_contador + 1;
                    $r_penalidade = 45;
                    $r_hora = date ("H");
                    $r_minuto = date ("i");
                    $conn->query("UPDATE blacklist SET contador=$c, penalidade=$r_penalidade, hora=$r_hora, minuto=$r_minuto WHERE ip='$r_ip'");
                    break;

                    case 11:
                    $c = $r_contador + 1;
                    $r_penalidade = 60 * 24;
                    $r_hora = date ("H");
                    $r_minuto = date ("i");
                    $conn->query("UPDATE blacklist SET contador=$c, penalidade=$r_penalidade, hora=$r_hora, minuto=$r_minuto WHERE ip='$r_ip'");
                    break;
                    
                    default:
                    $c = $r_contador + 1;
                    $conn->query("UPDATE blacklist SET contador=$c WHERE ip='$r_ip'");
                }
            }
        }        
        // Se não, slave o IP.
        else {

            $sisiii = "sisiii";
            $contador = "1";
            $penalidade = "0";

            $sql = "INSERT INTO blacklist (ip, contador, penalidade, ano_em_dia, hora, minuto) VALUES (?, ?, ?, ?, ?, ?)";
            if (!$stmt = $conn->prepare($sql)) { die ("Error prepare: " . $conn->error); }        
            $stmt->bind_param($sisiii, $ip, $contador, $penalidade, $ano_em_dia, $hora, $minuto);
            $stmt->execute();

        }

        // Validando Usuário
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $hash = password_hash($senha , PASSWORD_BCRYPT);
        
        if (estaPreparado($email) && estaPreparado($senha)) {          
            // Preparando SQL.
            $sql = "SELECT email, senha FROM usuarios WHERE email=?";

            if (!$stmt = $conn->prepare($sql)) { die ("Erro ao Preparar SQL: ".$conn->error); }

            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (password_verify($senha, $row['senha'])) {
                        session_start();
                        $_SESSION['logado'] = true;
                        header ("Location: site.php");
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

<body class="container-fluid pt-5">

    <main> 

        <form class="box" action="index.php" method="POST">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail">
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha">
            </div>

            <div class="form-group mb-0 pt-3">
                <input type="submit" class="btn btn-success d-block w-100" value="Entrar">
                <a href="cadastro.php" class="d-block text-center mt-3">Cadastre-se</a>
            </div>

            <?php feedback_get("erro", "Atenção: ", "Login ou Senha inválidos."); ?>
            <?php feedback_get("invalido", "Atenção: ", "Valores inseridos inválidos"); ?>
            <?php feedback_get("sucesso", "Sucesso: ", "Usuário cadastrado com sucesso. Faça seu login."); ?>

        </form>

        <div class="container py-5 d-flex justify-content-center">
            <a href="db.php" class="btn btn-danger mt-5 mr-2">Criar um Novo Banco de dados</a>
            <a href="info.php" class="btn btn-info mt-5 mr-2">Informações sobre a ADO</a>
        </div>

    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>