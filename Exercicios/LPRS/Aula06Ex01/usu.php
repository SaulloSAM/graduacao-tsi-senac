<?php
    session_start();
    $logado = $_SESSION['logado'];
    $tipo = $_SESSION['tipo'];

    if ( !$logado || !($tipo == 'USU' || $tipo == "ADM") ) {
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
        <span class="display-4">Página do Usuário</span>
        <br><br><br>
        <span class="d-block mt-5"><b>Usuário: </b><?=$_SESSION['email']?></span>

        <hr>        
        <?php if ($_SESSION['tipo'] == "ADM") { ?>
        <a href="adm.php" class="btn btn-info ml-3">Ver Página ADM</a>
        <?php } ?>
        <a href="sair.php" class="btn btn-danger">Sair</a>        
        <hr>

    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>