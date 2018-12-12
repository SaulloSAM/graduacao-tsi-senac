<?php
  include ('../autenticacao/controleAcesso.php');
  session_destroy();
  header('Location: ../');
  exit;
?>
