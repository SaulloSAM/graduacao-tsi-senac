<!-- V  erificar se o login (usuário e senha) está correto, através de um array contendo vários usuários e senhas.-->

<?php
  $login = array("usuario1" => "aaa", "usuario2" => "bbb", "usuario3" => "ccc");

  foreach ($login as $key => $value) { // Varre o arry $login procurando se a senha e login que o usuário digitou existe.
    if($usuario == $key && $senha == $value) { // Se encontrar, passa o usuário para a sessão e finaliza a busca!
        $_SESSION['usuario']=$key;
        break;
      }
    }
?>
