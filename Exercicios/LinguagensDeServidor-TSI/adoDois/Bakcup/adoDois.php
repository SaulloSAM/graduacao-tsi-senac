<!-- ADO - 02 - Linguagem de Servidor - Saulo Sinésio Araujo Marques -->
<!-- 1. Criar um fomrulário para que o usuário possa digitar "usuário" e "senha" -->

<?php
  // Iniciando uma Sessão na página e as váreáveis vazias.
  include 'parametros.php';
  session_start(); $usuario=''; $senha='';


  // Se não existir nenhum usuário, iremos mostrar no navegador o formulário que está em formulário.php

  $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
  $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

  foreach ($login as $key => $value) { // Varre o arry $login procurando se a senha e login que o usuário digitou existe.
    if($usuario == $key && $senha == $value) { // Se encontrar, passa o usuário para a sessão e finaliza a busca!
        $_SESSION['usuario']=$key;
        //var_dump($_SESSION['usuario']); exit;
        break;
      }
    }

    if (!isset($_SESSION['usuario'])) {
      echo 'Por favor, digitar um usuário válido!';
      header('location: formulario.php');
    }
?>

<?php
  // Se existir um usuário, iremos para a psge 2.
  //var_dump($_GET); exit;
  echo '<br/> <a href="?escolha=1">Animais</a>';
  echo '<br/> <a href="?escolha=2">Flores</a>';

  if(isset($_GET['escolha']) && ($_GET['escolha']) == 1){
    $_SESSION['escolha']='Animais';
    header('location: escolha.php');
  }
  if(isset($_GET['escolha']) && ($_GET['escolha']) == 2){
    $_SESSION['escolha']='Flores';
    header('location: escolha.php');
  }
?>

<br><br>
<a href="sair.php">Sair</a>
