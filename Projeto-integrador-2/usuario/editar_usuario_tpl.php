<?php
	include('../menu/index.head.tpl.php');
?>

<link rel="stylesheet" href="../estilo/formularios.css">

	<!-- passar o caminha para o estilo do formulário -->
<?php
	include('../menu/index.body.tpl.php');
	if(isset($erro)) echo "<center><font color='red'> $erro </font></center>";
	if(isset($msg)) 	echo"<center><font color = 'green'> $msg </font></center>";
?>

<section>
      <h1>Editar Usuário</h1>
      <h3><a href="../usuario">Voltar</a></h3>
 </section>

<form method="post" action="../usuario" name="form"><br><br>
 <fieldset class="grupo">
		<div class="campo">
			<label> Nome:</label>
			<input type = "text" name="nome" style="width: 17em" 
			value="<?php echo $array_usuario['nomeUsuario']; ?>"><br><br>
		</div>

		<div class="campo" class="e-mail">
			<label>E-mail:</label>
			<input type="email" name="login" style="width: 17em" 
			value="<?php echo $array_usuario['loginUsuario']; ?>"><br><br>
		</div>

		<div class="campo">
			<label>Senha:</label>
			<input type="password" name="senha" style="width: 17em"><br><br>
		</div>

		<div class = "campo">
			<label>Perfil:</label>
			<select name="perfil">

				<?php
				if($array_usuario['tipoPerfil'] == 'A'){
					echo '<option value="A" selected>
							Administrador
						  </option>
						  <option value="C">
						    Cliente
						  </option>';
				}else{
					echo '<option value="A">
					 		Administrador
					 	  </option>
					 	  <option value="C" selected>
					 	  Cliente
					 	  </option>';
				}
				?>
			</select><br><br>
		</div>

		<div class="campo">
			<label>Ativo:</label>

						<?php
						if($array_usuario['usuarioAtivo'] == 1){
							echo '<input type="checkbox" name="ativo" checked>';
						}else{
							echo '<input type="checkbox" name="ativo">';
						}
						?>
					<input type="hidden" name="id" value="<?php echo $array_usuario['idUsuario']; ?>">
					<input type="hidden" name="acao" value="editar">
				<br><br><br>
		</div>

		<div class="campo">
			<button type="submit" name="btnGravarUsuario">Gravar</button>
		</div>
		
	</fieldset>
</form>

<?php
	include('../menu/index.footer.tpl.php');
?>
