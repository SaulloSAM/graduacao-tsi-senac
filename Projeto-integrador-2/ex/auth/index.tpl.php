<html>
	<head>
		<title>Exemplos para Loja Virtual</title>
	</head>
	<body>
		<center>
			<br><br>
			<?php
			if(isset($erro))
				echo "	<font color='red'>
						$erro
						</font>";
			?>
			<br><br>
			<form method="post">
				E-mail: <input 	type="text" 
								name="email">
				<br><br>
				Senha: <input	type="password"
								name="senha">
				<br><br>
				<input 	type="submit" 
						value="Entrar"
						name="btn_entrar">
			</form>
		</center>
	</body>
</html>