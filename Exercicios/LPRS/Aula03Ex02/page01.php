<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Aula 03 - Ex 02</title>
</head>
<body class="container py-5">

    <main>
        <div>
            <p class="lead">Acessando informações do <b>session_start()</b></p>
            <p class="m-0"><b class="text-danger">Nome:</b> <?php echo $_SESSION['nome'] ?></p>
            <p class="m-0"><b class="text-danger">senha:</b> <?php echo $_SESSION['senha'] ?></p>            
        </div>

        <hr>
        <a href="index.php" class="btn btn-danger">voltar</a>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>