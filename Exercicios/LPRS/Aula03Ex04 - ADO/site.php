<?php
    session_start();
    if (!$_SESSION['logado']) {
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

<body class="container-fluid py-5" style="height: 100vh">

    <main class="d-flex justify-content-center">
        <span class="align-self-center d-block display-4">Página de conteúdo privado.</span>
    </main>

    <div class="container py-5 d-flex justify-content-center">
        <a href="index.php" class="btn btn-danger mt-5 mr-2">SAIR</a>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>