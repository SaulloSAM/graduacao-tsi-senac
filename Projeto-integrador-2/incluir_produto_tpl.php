<?php
	include('../menu/index.head.tpl.php');
?>
<link rel="stylesheet" href="../estilo/formularios.css">
<?php
	include('../menu/index.body.tpl.php');
?>
<section>
      <h1>Adicionar Produto</h1>
      <h3><a href="../produto">Voltar</a></h3>
 </section>

<form method="post" action="../produto/" id="frm"><br><br>
	<fieldset class="grupo">
		<!-- Campo para adicionar o nome do Produto -->
		<div class="campo">
			<label>Nome:</label>
			<input type="text"
						 name="inputProduto"><br><br>
		</div>
		<!-- Campo para adicionar o preço do Produto -->
		<div class="campo">
			<label>Preço:</label>
			<input type="text"
						 name="inputPreco"><br><br>
		</div>
		<!-- Campo para adicionar a quantidade do Produto -->
		<div class="campo">
		  <label>Quantidade no estoque:</label>
		  <input type="text"
						 name="inputEstoque"><br><br>
		</div>
		<!-- Campo para adicionar a desconto do Produto -->
		<div class="campo">
			<label>Desconto:</label>
		   <input type="text"
			        name="inputDesconto"><br><br>
		</div>

		<!-- Campo para adicionar a categoria do Produto -->
		<div class="campo">
	  		<label>Categoria:</label>
		  		<select name="inputCategoria">
					<?php
					// Criando a opções das categorias
					$consulta = odbc_exec($db, "SELECT nomeCategoria,
																				     idCategoria
			                                FROM   Categoria");

			    while ($r = odbc_fetch_array($consulta)){
						echo '<option value="'.$r['idCategoria'].'">'.$r['nomeCategoria'].'</option>';
			    }
					?>
			</select><br><br>
		</div>
		<!-- Campo para adicionar a descrição do Produto -->
		<div class="campo">
		  <label>Descrição:</label>
		  <textarea type="text"
								name="inputDescricao"
								rows="10"
								style="width: 50em"></textarea><br><br>
		</div>
		<!-- Campo para adicionar a imagem do Produto -->
		<div class="campo">
			<label>Imagem:</label>
		 	<input type="file"
						 name="inputImagem"><br><br>
	 	</div>
		<!-- Campo para adicionar a ativo do Produto -->
	 	<div class="campo">
		 	 <label>Ativo:</label>
			 <input type="checkbox"
			 				name="ativo"
							checked><br><br>
		</div>
		<!-- Botão para validar os campos acima no banco de dados -->
		<div class="campo">
		<button type="submit"
						name="btnNovoProduto">Gravar</button>
		</div>
	</fieldset>
</form>
<?php
	include('../menu/index.footer.tpl.php');
?>
