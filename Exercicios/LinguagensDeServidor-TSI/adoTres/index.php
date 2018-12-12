<html>
  <head>
    <meta charset="utf-8" />
    <title>Ado 3 - TSI - Linguagens de Servidor </title>

    <!-- Criar um arquivo HTML com um formulário contendo campos do tipo text, password, radio, select, textarea, etc... -->
    <!-- Criar um arquivo PHP, semelhante aos exemplos vistos em sala de aula, que receba os valores dos campos do formulário e escreva-os na tela. -->
  </head>

  <body>
    <h1> Ado 3 - TSI - Linguagens de Servidor </h1> <hr> <br><br>

    <form name="frmAdoTres" id="frmAdoTres">
      Tipo text:      <input type="text" name="texto" value="<?php echo $textoUm=""; ?>"> <br><br>
      Tipo password:  <input type="password" name="senha" value="<?php echo $senha=""; ?>"> <br><br>
      <hr>
      Tipo radio <br><br>
      <input type="radio" name="op1" value="<?php echo $radio; ?>"> Opção 1 <br>
      <input type="radio" name="op2" value="<?php echo $radio; ?>"> Opção 2 <br>
      <input type="radio" name="op3" value="<?php echo $radio; ?>"> Opção 3 <br>
      <hr>
      <br><br>
      Tipo select
      <select id="select1">
        <option value="<?php echo $selecao; ?>">Seleção 1</option>
        <option value="<?php echo $selecao; ?>">Seleção 2</option>
        <option value="<?php echo $selecao; ?>">Seleção 3</option>
      </select>
    </form>
  </body>
</html>

<?php


?>
