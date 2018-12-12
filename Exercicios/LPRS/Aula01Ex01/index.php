<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Aula 01 - Ex 01</title>
</head>
<body class="container">
    
    <main class="my-5">

        <label for="inputNumero">Digite um número</label> <br>
        <input type="text" id="inputNumero">
        <button id="enviar">Enviar</button>
        <br>
        <br>
        <span id="resp"></span>

    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script>
    
        $("#enviar").click ( function () {
            let val = $("#inputNumero").val();

            console.log(val);

            if(val != 42) {
                $("#resp").html("Meu número não é o <span style='color:red'>" + val + "</span>");
                $("#inputNumero").val('');
            } else {
                $("#resp").html("Meu número é o 42");
                $("#inputNumero").val('');
            }
        });
    
    
    </script>


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>