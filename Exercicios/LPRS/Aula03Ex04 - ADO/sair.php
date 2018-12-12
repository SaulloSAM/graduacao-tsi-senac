<?php include_once 'function.php'; ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Página Privada</title>
</head>

<body class="container-fluid py-5">

    <main class="my-5 container">
        <?php feedback_get("db", "Atenção: ", "Crie o banco de dados antes de fazer o login. [index.php]"); ?>
        <?php feedback_get("db", "Erro: ", "Não foi possível conectar ao banco de dados."); ?>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>

<?php

echo (date ("H") *60 ) + date ("i");
?>