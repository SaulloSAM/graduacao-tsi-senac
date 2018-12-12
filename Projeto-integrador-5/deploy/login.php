<?php  include "header.php"; ?>

	<div class="wrapper" id="account">
		<div class="container">
			<?php
				if (count($_POST) > 0) {
					include_once ("API/usuarios.php");

					$isSuccess = singin_usuario($_POST['login'], $_POST['password']);

					if ($isSuccess) {
						header ("Location: index.php");
					} else {
						echo "<p id='msgSuccess'>E-mail ou Senha incorretos.</p>";
					}
				}
			?>
			<div class="col-md-8" id="info">
				<h2>ENTRE E COMECE A<br>COMPRAR E VENDER<br> AGORA MESMO</h2>

				<form method="POST" action="login.php">
					<input type="email" name="login" placeholder="Email" required>
					<input type="password" name="password" placeholder="Senha" required>
					<div class="text-center" id="btnsContainer">
						<a href="cadastro.php">Cadstre-se</a>
						<input type="submit" value="Entrar">
					</div>
				</form>
			</div>
			<div class="col-md-5" id="description">
				
			</div>
		</div>
	</div>

<?php include "footer.php"; ?>