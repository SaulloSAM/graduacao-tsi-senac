<?php
  session_start();
  include 'parametros.php';

  $usuario = $_SESSION['usuario'];
  $escolhido = $_SESSION['escolhido'];
  $tipo = $_SESSION['tipo'];

  echo '<p>Olá usuário '.$usuario.', você escolheu '.$escolhido.': '.$tipo.'<hr>';
?>

<!--Link Sair para voltar a Página de Login inicial! -->
<br><br><a href="sair.php">Sair</a>
