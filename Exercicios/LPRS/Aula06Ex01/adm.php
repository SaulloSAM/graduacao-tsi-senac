<?php
    include_once 'conn.php';
    session_start();
    $logado = $_SESSION['logado'];
    $tipo = $_SESSION['tipo'];

    if ( !$logado || $tipo != "ADM") {
        header ("Location: index.php");        
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

<body class="container-fluid">

    <main class="container py-5 text-center">
        <span class="display-4">Página do Administrador</span>
        <br>
        <span class="d-block mt-5"><b>Usuário: </b><?=$_SESSION['email']?></span>

        <hr>
        <a href="usu.php" class="btn btn-info ml-3">Ver Página Usuário</a>
        <a href="sair.php" class="btn btn-danger">Sair</a>        
        <hr>
    </main>

    <div class="container">
    <?php
        $sql = "SELECT nome, email, tipo, reg_date FROM usuarios";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<span class='mb-2'><b>Nome: </b>".$row["nome"]." <b>Email: </b>".$row["email"]." <b>Tipo: </b>".$row["tipo"]." <b>Data: </b>".$row["reg_date"]."</span><br><br>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>