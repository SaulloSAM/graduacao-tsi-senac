<?php 
	session_start();

	// Se o usuário clicar em sair - ZERAR A SESSÃO.
	if (array_key_exists("sair", $_GET)) {	
		// Status de Logado - True ou False.
		$_SESSION["logado"] = false;

		// Validação do Usuários para chamadas POST da API.
		$_SESSION["xAuth"] = "";
	
		// Dados do Usuário.
		$_SESSION["email"] = "";
		$_SESSION["carteira"] = "";
		$_SESSION["chaves"] = "";
		$_SESSION["nome"] = "";
		$_SESSION["cpf"] = "";
		$_SESSION["telefone"] = "";
		$_SESSION["celular"] = "";
		$_SESSION["whatsapp"] = false;
	}

	include_once ("API/categorias.php");
	$categorias = get_categorias();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Interessados</title>
	<meta name="author" content="Grupo Único 5º Semestre">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="index,follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="favicon.png" type="image/x-icon" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<div id="topBarMenu">
			<div class="container">
				<ul class="col-xs-6">
					<?php if(isset($_SESSION['logado']) && $_SESSION['logado'] == true) : ?>
						<li><a href="lista-de-desejos.php">Lista de desejos</a></li>
						<!--<li><a href="#">Propostas</a></li>-->
					<?php endif; ?>
				</ul>

				<?php if(isset($_SESSION['logado']) && $_SESSION['logado'] == true) : ?>
					<ul class="col-xs-6 text-right" id="userBtns">					
						<li><a href="compra-de-chaves.php"><i class="fas fa-key"></i><span id="keyQtd">10</span></a></li>
						<li class="pull-right" id="user"><a href="#"><?php echo $_SESSION["nome"] ?> <i class="fas fa-sort-down"></i></a>
							<ul id="userMenu">
								<li><a href="lista-de-desejos.php">Lista de desejos</a></li>
								<li><a href="edicao-cadastro.php">Meus dados</a></li>
								<li><a href="cadastro-endereco.php">Meus endereços</a></li>
								<li><a href="index.php?sair">sair</a></li>
							</ul>
						</li>
					</ul>
				<?php else : ?>
					<ul class="col-xs-6 text-right" id="loginBtns">
						<li><a href="login.php">Entrar</a></li>
						<li><a href="cadastro.php">Cadastrar</a></li>
					</ul>
				<?php endif; ?>

			</div>
		</div>
		<div class="container">
			<div class="row verticalAlign">
				<div class="col-sm-2">
					<a id="logo" href="index.php"><img src="images/logo.png" alt="Logo"></a>
				</div>
				<div class="col-sm-10">
					<form method="GET" action="search.php">
						<input type="search" name="search" placeholder="O que estão buscando?">
						<button type="submit"><i class="fas fa-search"></i></button>
					</form>
				</div>
			</div>

			<div class="row text-center">
				<ul id="category">
					<?php
						$count = 0;
						foreach ($categorias as $cat) {
							echo "<li><a href='lista.php?id=".$cat->{'_id'}."'>".$cat->{'name'}."</a></li>";
							if ($count > 6) { break; } else {$count++; }
						}
					?>
				</ul>
			</div>
		</div>
	</header>