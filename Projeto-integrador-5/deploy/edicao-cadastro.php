<?php include "header.php"; ?>

	<div class="wrapper" id="account">
		<div class="container">

			<?php
				if (count($_POST) > 0) {
					include_once ("API/usuarios.php");
					
					$usarWhats = false;

					// Verificando se deve ou não usar o whatsapp.
					if (isset($_POST["usarWhatsapp"])) {
						if ($_POST["usarWhatsapp"] == "on") {
							$usarWhats = true;
						}							
					}

					echo "<br>".$_POST['nome']; 
					echo "<br>".$_POST['cpf'];
					echo "<br>".$_POST['teledone'];
					echo "<br>".$_POST['celular'];
					echo "<br>".$usarWhats;
					echo "<br>".$_SESSION["xAuth"];
					
					$isSuccess = atualizar_usuario (
						$_POST['nome'], 
						$_POST['cpf'], 
						$_POST['teledone'], 
						$_POST['celular'], 
						$usarWhats,
						$_SESSION["xAuth"]);
					
					if ($isSuccess) {
						echo "<p id='msgSuccess'>Usuário cadastrado com sucesso, usuário logado.</p>";
					} else {
						echo "<p id='msgSuccess' class='error'>Erro ao cadastrar usuário, tente novamente.</p>";
					}
				}
			?>
			
			<div class="col-md-8" id="info">
				<h2>ATUALIZE SEUS<br> DADOS</h2>

				<form method="POST" action="edicao-cadastro.php">
					<input type="text" 		name="nome" 		value="<?php echo $_SESSION['nome'] ?>"			required>
					<input type="tel" 		name="teledone" 	value="<?php echo $_SESSION['telefone'] ?>" 		required>
					<input type="cel" 		name="celular" 		value="<?php echo $_SESSION['celular'] ?>" 		required>
					<input type="cpf" 		name="cpf" 			value="<?php echo $_SESSION['cpf'] ?>" 			required>

					<input type="radio" name="usarWhatsapp" id="sarWhatsapp" style="width:10px; margin-right:10px;" <?php if ($_SESSION['whatsapp']) { echo "checked"; } ?>>
					<label for="sarWhatsapp">Usar o celular com Whatsapp?</label>
						
					<div class="text-center" id="btnsContainer">
						<input type="submit" value="Enviar">
					</div>
				</form>
			</div>

			<div class="col-md-5 text-center" id="description">
				<i class="fas fa-user"></i>
				<p>Atualize seus dados para continuar comprando</p>
			</div>
		</div>
	</div>
<?php include "footer.php"; ?>