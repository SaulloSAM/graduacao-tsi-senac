<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Aula 02 - Ex 03</title>
</head>
<body class="container">

    <main class="mx-auto my-5">        

        <h1 class="lead mb-3">Efetuar Login</h1>

        <form action="logado.php" method="POST">
            <input type="text" name="email" placeholder="E-mail" class=" mb-2 p-1 w-100">
            <input type="password" name="senha" placeholder="Senha" class=" mb-2 p-1 w-100">
            <input type="submit"    value="Logar" class="btn btn-secondary" />
        </form>

        <?php
            // Verifica se houve algum retorno via GET e trata esse retorno.
            
            // Erro
            if (array_key_exists('erro', $_GET)) {
                if ($_GET['erro'] == 'senhaOUemail') {
                    echo "<hr>";
                    echo "<div class='alert alert-danger'>";
                    echo     "<span>E-mail ou Senha incorreto!</span>";
                    echo "</div>";
                } 
            }
            // Sucesso
            if (array_key_exists('sucesso', $_GET)) {
                if  ($_GET['sucesso'] == 'ok') {
                    echo "<hr>";
                    echo "<div class='alert alert-success'>";
                    echo     "<span>Logado com sucesso!</span>";
                    echo "</div>";
                }
            }
        ?>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>