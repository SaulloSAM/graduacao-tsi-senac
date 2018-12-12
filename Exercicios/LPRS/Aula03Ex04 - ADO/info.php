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

    <div class="container">
        <a href="index.php" class="btn btn-danger mr-2">Voltar</a>
    </div>
    
    <hr>

    <main class="container">
        <span class="d-block lead">Sobre a ADO</span>
        <br>
        <span class="lead text-primary">Construção da tabela Blacklist</span>
        <br><br>
        <p>
            A tabela blacklist registra os possíveis IPs que tentan efetuar algum tipo de ataque por foça bruta.
            <br>
            Ao tentar efetuar o login 3 vezes, o sistema irá começar a punir esse IP deixando ele sem tentar efetuar o acesso a conta.
        </p>

        <span class="lead text-primary">Regras</span>
        <p>
            -> Após 3 tentativas, punição de 15 minutos sem poder efetuar uma tentativa de login. <br>
            -> Após 6 tentativas, punição de 30 minutos sem poder efetuar uma tentativa de login. <br>
            -> Após 9 tentativas, punição de 45 minutos sem poder efetuar uma tentativa de login. <br>
            -> Após 12 tentativas, punição de 1 dia sem poder efetuar uma tentativa de login.
        </p>

        <span class="lead text-primary">Como Funciona</span>
        <p>
            Quando o IP chegar na quantidade de tentativas no qual existe uma punição (3, 6, 9, 12). O sistema salva o horário no qual foi efetuado a solicitação.
            <br>
            <b>EX:</b> 3 tentativa realizada as 3h32M. (Relógio 24H).
            <br>
            <br>
            Após isso o sistema bloqueia o usuário por 15 Minutos. este cálculo é realizado da seguinte forma:
        </p>

        <p>
            Horário da Tentativa em Minutos = (Horas X 60 Minutos) + Minutos -> 3:32.<span class="text-danger">--> 212 == (3 X 60) + 32;</span>
            <br>
            Tentando Logar as 3:42 = (Horas X 60 Minutos) + Minutos -> 3:32.<span class="text-danger">--> 222 == (3 X 60) + 42;</span>
            <br><br>
            O sistema irá verificar se o usuário pode ou não efetuar a tentativa de acesso.
            <br>
            <b class="text-danger">false -> </b> (222 - 212) == 10. Logo não se passaram 15 Minutos mas apenas 10 Minutos. O sistema redireciona o usuário para uma página onde irá informar a sua punição por efeturar multiplas tentativas de acesso.
            <br>
            E assim será efetuado o calculo nos demais tipos de punições. [30min, 45min e 1 Dia.]
        </p>

        <div class="container alert alert-warning">
            <b>Atenção: </b>
            <span>O sistema só efetua essas punições no dia atual do ataque. Por exemplo se o IP 192.168.0.21 sofrer punição de 15 minutos. No próximo dia essa punição será ignorada e será contada novamente a partir do 0.</span>
        </div>

    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>