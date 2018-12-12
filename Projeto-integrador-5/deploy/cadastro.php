<?php
	include "header.php";
?>

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

					$isSuccess = singup_usuario($_POST['login'], $_POST['password'], $_POST['nome'], $_POST['cpf'], $_POST['teledone'], $_POST['celular'], $usarWhats);
					
					if ($isSuccess) {
						echo "<p id='msgSuccess'>Usuário cadastrado com sucesso, usuário logado.</p>";
					} else {
						echo "<p id='msgSuccess' class='error'>Erro ao cadastrar usuário, tente novamente.</p>";
					}
				}
			?>

			<div class="col-md-8" id="info">
				<h2>CADASTRE-SE E COMECE A<br> COMPRAR E VENDER<br> AGORA MESMO</h2>

				<form method="POST" action="cadastro.php">
					<input type="text" 		name="nome" 		placeholder="Nome Completo"	required>
					<input type="email" 	name="login" 		placeholder="E-mail" 		required>
					<input type="password" 	name="password" 	placeholder="Senha" 		required>
					<input type="tel" 		name="teledone" 	placeholder="Telefone" 		required>
					<input type="cel" 		name="celular" 		placeholder="Celular" 		required>
					<input type="cpf" 		name="cpf" 			placeholder="Seu CPF" 		required>

					<input type="radio" name="usarWhatsapp" id="sarWhatsapp" style="width:10px; margin-right:10px;">
					<label for="sarWhatsapp">Usar o celular com Whatsapp?</label>
						
					<div class="text-center" id="btnsContainer">
						<input type="submit" value="Enviar">
					</div>
				</form>
			</div>

			<div class="col-md-5 text-center" id="description">
				<i class="fas fa-user"></i>
				<p>Cadastre sua conta</p>
				<i class="fas fa-th-list"></i>
				<p>Crie sua lista de desejos</p>
				<i class="fas fa-comments"></i>
				<p>Seja encontrado por pessoas que queiram vender e feche negócio</p>
			</div>
		</div>
	</div>
<?php include "footer.php"; ?>