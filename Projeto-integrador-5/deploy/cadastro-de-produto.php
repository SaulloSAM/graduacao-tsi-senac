<?php include "header.php"; ?>

	<div class="wrapper" id="productEdit">
		<div class="container">
			<div class="col-md-12">
				<?php if(isset($_GET['cadastro'])) : ?>
					<p id="msgSuccess">Produto cadastrado com sucesso!</p>
				<?php endif;?>

				<h2 class="text-right barsAlignRight bars">Novo <span>Produto</span></h2>

				<form>
				  	<div class="form-row clearFix">
				    	<div class="form-group col-md-6">
				    		<img id="prodImg" src="images/no-image.png" alt="Imagem">
				      		<label class="sr-only" for="img">Imagem</label>
				      		<input type="file" class="form-control" id="img" accept="image/*" onchange="readImagesAndSetAsBackground(this.files)">
				    	</div>
				    	<div class="form-group col-md-6">
				      		<label for="nome">Nome do Produto</label>
				      		<input type="text" class="form-control" id="nome">

				      		<label for="valor">Valor</label>
				      		<input type="text" class="form-control" id="valor">

				      		<label for="valor">Categoria</label>
				      		<select class="form-control" id="categoria">
				      			<option value="">Selecione uma categoria</option>
				      			<option value="Categoria1">Categoria 1</option>
				      			<option value="Categoria2">Categoria 2</option>
				      			<option value="Categoria3">Categoria 3</option>
				      			<option value="Categoria4">Categoria 4</option>
				      			<option value="Categoria5">Categoria 5</option>
				      			<option value="Categoria6">Categoria 6</option>
				      			<option value="Categoria7">Categoria 7</option>
				      		</select>
				    	</div>
				  	</div>	

				  	<div class="form-row">
				  		<label for="descricao">Descrição</label>
				  		<textarea id="descricao"></textarea>
				  	</div>			  
				  	<button type="submit" class="btn btn-primary">Salvar</button>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function readImagesAndSetAsBackground(files) {
			for(var i=0; i < files.length; i++) {
				var f = files[i];
				  
				var reader = new FileReader();
					
				reader.onload = function(e) {				
					document.getElementById("prodImg").src = e.target.result;
			    }
				  
			   reader.readAsDataURL(f);
			}
		}
	</script>

<?php include "footer.php"; ?>