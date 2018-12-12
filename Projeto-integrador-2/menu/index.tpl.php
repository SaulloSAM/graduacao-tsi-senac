<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Loja</title>
    <link rel="stylesheet" href="../estilo/menu.css">
    <link rel="stylesheet" href="../estilo/estilo-default.css">
  </head>

  <body>
    <header>
  		<ul>
  			<li>Usuário</li>
  			<li>Produto</li>
  			<li>Categoria</li>
        <li><a href="../autenticacao/desconectar.php">sair</a></li>
  		</ul>
      <img src="../img/logo-80x58.png" />
    </header>

    <section>
    		<h1>Bem Vindo <?php echo $_SESSION['nomeUsuario']; ?></h1>
    </section>
  </body>
</html>
