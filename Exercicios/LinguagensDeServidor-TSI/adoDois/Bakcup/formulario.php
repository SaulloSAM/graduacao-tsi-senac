<?php $usuario=''; $senha=''; ?>

<!-- Formulário de login e senha em HTML -->
<form method="POST" name="formDefault" action="adoDois.php">
  <!--Criando um formulário para validação de Senha e Login-->
  <br><hr>
  Login: <input type="text" name="usuario" value="<?php echo $usuario; ?>"> <br><br>
  Senha: <input type="password" name="senha" value="<?php echo $senha; ?>"> <br><br>
  <input type="submit" value="Enviar">
  <hr>
</form>
