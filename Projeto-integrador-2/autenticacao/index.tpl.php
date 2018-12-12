<html>
  <head>
    <meta charset="utf-8">
    <title>Foxtrot</title>

    <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">

    <!--FAVICON - ICONE DO BROWSER -->

    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#D48131">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#D48131">

    <link rel="stylesheet" href="../estilo/login.css">
    <link rel="stylesheet" href="../estilo/estilo-default.css">


  </head>

  <body>
    <img src="../img/logoFoxtrot-240x175.png" /> <!-- Imagem PG Login -->

    <div class="wrapper">

      <div class="container">
        <h1>
          <?php
            if(isset($erro)) echo "$erro";
            else echo "Bem Vindo";
          ?>
        </h1>

        <form method="post" class="frm">
          <input name="email" id="email" type="text" placeholder="Entre com seu E-mail" />
          <input name="senha" id="senha" type="password" placeholder="Entre com sua Senha" />

          <button type="submit" id="bnt-login" class="color-default" value="Entrar">Entrar</button>
      </form>
    </div> <!-- Fim div class container -->
  </div> <!-- Fim class wrapper -->
<!--
  <footer class="desenvolvedor color-default">
    <p>Projeto integrador 2 - Centro Universitário Senac Santo Amaro - Tecnologia em Sistemas para Internet</p>
    <a href="https://www.linkedin.com/in/angelagra/" target="_blank">Angela</a>
    <a href="https://www.linkedin.com/in/saulo-sinesio-377850127/" target="_blank">Anna</a>
    <a href="https://www.linkedin.com/in/saulo-sinesio-377850127/" target="_blank">Saulo Sinesio</a>
  </footer> -->

  </body>
</html>
