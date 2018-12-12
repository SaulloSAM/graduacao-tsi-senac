<?php
  include ('../autenticacao/controleAcesso.php');
  include ('index.head.tpl.php');
  include ('index.body.tpl.php');
?>

  <section>
      <h1>Bem Vindo <?php echo $_SESSION['nomeUsuario']; ?></h1>
  </section>

<?php
  include ('index.head.tpl.php');
?>
