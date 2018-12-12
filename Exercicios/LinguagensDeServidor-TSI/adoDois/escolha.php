<?php
  include 'parametros.php';

  session_start();
  $usuario = $_SESSION['usuario'];
  $escolhido = $_SESSION['escolhido'];


  echo '<p>Olá usuário '.$usuario.', você escolheu '.$escolhido.'<hr>';

  if($escolhido == 'Animais'){
    foreach ($animais as &$value) {
      $tipo = $value;
      echo "<a href=?tipo=".$tipo.">$tipo</a><br/>";
    }
  }
  if($escolhido == 'Flores'){
    foreach ($flores as &$value) {
      $tipo = $value;
      echo "<a href=?tipo=".$tipo.">$tipo</a><br/>";
    }
  }

  if(isset($_GET['tipo'])){
    $prox = $_SESSION['tipo'] = $_GET['tipo'];
  }

  if(isset($_GET['tipo']) && ($_GET['tipo']) == $prox){
    header('Location: fim.php');
  }
?>

<!--Link Sair para voltar a Página de Login inicial! -->
<br><br><a href="sair.php">Sair</a>
