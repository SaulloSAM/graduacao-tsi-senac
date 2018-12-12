<?php
    $msg = "Você foi temporáriamente bloqueado pelo excesso de tentativas.";
    if (array_key_exists("15", $_GET)) { $alerta = "Tente novamente após 15 Minutos"; }
    if (array_key_exists("30", $_GET)) { $alerta = "Tente novamente após 30 Minutos"; }
    if (array_key_exists("45", $_GET)) { $alerta = "Tente novamente após 45 Minutos"; }
    if (array_key_exists("dia", $_GET)) { $alerta = "Tente novemante amanhã."; }
    

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

<body class="container-fluid py-5" style="height: 100vh">

    <main>


        <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid">
            <h1 class="display-4">Olá!</h1>
            <p class="lead"><?php echo $msg; ?></p>
            <hr class="my-4">
            <p><?php echo $alerta; ?></p>
            <a class="btn btn-danger btn-lg" href="index.php" role="button">página de Login</a>
        </div>
        </div>


    </main>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>