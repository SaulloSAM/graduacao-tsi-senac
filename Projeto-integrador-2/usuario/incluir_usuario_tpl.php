<?php
	include('../menu/index.head.tpl.php');
?>
<link rel="stylesheet" href="../estilo/formularios.css">
<?php

	include('../menu/index.body.tpl.php');
?>

<section>
      <h1>Cadastro de Usuário</h1>
      <h3><a href="../usuario">Voltar</a></h3>
  </section>

<form method="post" action="../usuario/"><br><br>
	<fieldset class="grupo">

		<div class="campo">
			<label>Nome:</label>   
			<input type="text" name="nome" style="width: 17em">
		</div>

		<div class="campo">
			<label>E-mail:</label>
			<input type="email" name="login" style="width: 17em">
		</div>

		<div class="campo">
			<label>Senha:</label>
			<input type="password" name="senha" style="width: 17em">
		</div>

		<div class="campo">
			<label>Perfil:</label>
			<select name="perfil">
				<option value="A"> Administrador </option>
				<option value="C"> Cliente </option>
			</select>
		</div>

		<div class="campo">
			<label>Ativo:</label> 
			<input type="checkbox" name="ativo" checked>
		</div>

		<div class="campo">
			<button type="submit" name="btnNovoUsuario">Gravar</button>
		</div>
	</fieldset>
</form>

<?php
	include('../menu/index.footer.tpl.php');
?>
