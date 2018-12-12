<?php
	include "header.php";
	if (count($_POST) > 0) {
		include_once("API/endereco.php");
	
		set_endereco (
			$_POST['nome'],
			$_POST['referencia'],
			$_POST['rua'],
			$_POST['cep'],
			$_POST['numero'],
			$_POST['complemento'],
			$_POST['bairro'],
			$_POST['cidade'],
			$_POST['uf'],
			$_SESSION['xAuth']
		);
	}
?>

	<div class="wrapper" id="account">
		<div class="container" id="address">
			<div class="col-md-8" id="info">
				<h2>CADASTRE UM NOVO ENDEREÇO</h2>

				<form method="POST" action="cadastro-endereco.php">
					<div class="form-row">
				    	<div class="form-group col-sm-12">
				    		<input type="text" name="nome" placeholder="Nome do endereço" required>
				    	</div>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-sm-12">
				    		<input type="text" name="referencia" placeholder="Referência" required>
				    	</div>
				  	</div>
					<div class="form-row">
				    	<div class="form-group col-sm-8">
				    		<input type="text" name="rua" placeholder="Rua" required>
				    	</div>
				    	<div class="form-group col-sm-4">
				    		<input type="text" name="numero" placeholder="Número" required>
				    	</div>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-sm-6">
				    		<input type="text" name="complemento" placeholder="Complemento" required>
				    	</div>
				    	<div class="form-group col-sm-6">
				    		<input type="text" name="cep" placeholder="CEP" required>
				    	</div>
				  	</div>
					<div class="form-row">
				    	<div class="form-group col-sm-6">
				    		<input type="text" name="bairro" placeholder="Bairro" required>
				    	</div>
				  	</div>
					<div class="form-row">
				    	<div class="form-group col-sm-6">
				    		<input type="text" name="cidade" placeholder="Cidade" required>
				    	</div>
				    	<div class="form-group col-sm-6">
				    		<input type="text" name="uf" placeholder="UF" required>
				    	</div>
				  	</div>
										
					<div class="text-center" id="btnsContainer">
						<input type="submit" value="Enviar">
					</div>
				</form>
			</div>

			<div class="col-md-5 text-center" id="description">
				<h3><i class="fas fa-map-marker-alt"></i> Endereçõs cadastrados:</h3>
				<div>
					<p>Casa</p>
					<p>Rua: xxx</p>
					<p>Nº100</p>
				</div>

				<div>
					<p>Trabalho</p>
					<p>Rua: yyy</p>
					<p>Nº50 - Sala 602</p>
				</div>
			</div>
		</div>
	</div>
<?php include "footer.php"; ?>