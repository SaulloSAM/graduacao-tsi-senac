<?php include "api.php"; include "header.php"; ?>

	<div class="wrapper" id="wishlist">
		<div class="container">
			<h2 class="text-right barsAlignRight bars">Minha lista de <span>desejos</span></h2>

			<a href="cadastro-de-produto.php" class="newProdBtn pull-right">Cadastrar novo produto</a>

			<div class="col-md-12">
				<?php if (isset($_GET['action'])) {
					echo "<p id='msgSuccess'>Produto deletado com sucesso!</p>";
				} ?>
			</div>
			
			<?php
				foreach (get_interesses()->{'interests'} as $cat) :
			?>

				<div class="col-md-4 col-sm-6">
					<div class="wish">
						<img src="<?php echo $cat->{'image'}; ?>" alt="Produto" onerror="this.onerror=null;this.src='images/no-image.png';">
						<h3><?php echo $cat->{'name'}; ?></h3>
						<div class="editBtns clearFix">
							<a href="edicao-de-produto.php?id=<?php echo $cat->{'_id'}; ?>" title="Editar Produto"><div class="col-xs-6 text-center edit">
								<i class="fas fa-pencil-alt"></i>
							</div></a>
							<a href="api.php?delete=<?php echo $cat->{'_id'}; ?>" title="Excluir Produto"><div class="col-xs-6 text-center delete">
								<i class="fas fa-times"></i>
							</div></a>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

			<!--<div class="col-md-4 col-sm-6">
				<div class="wish">
					<img src="images/prod/snes.jpg" alt="Produto">
					<h3>Console Super Nintendo</h3>
					<div class="editBtns clearFix">
						<a href="#" title="Editar Produto"><div class="col-xs-6 text-center edit">
							<i class="fas fa-pencil-alt"></i>
						</div></a>
						<a href="#" title="Excluir Produto"><div class="col-xs-6 text-center delete">
							<i class="fas fa-times"></i>
						</div></a>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-6">
				<div class="wish">
					<img src="images/prod/lotr.jpg" alt="Produto">
					<h3>Livro O Senhor dos Anéis</h3>
					<div class="editBtns clearFix">
						<a href="#" title="Editar Produto"><div class="col-xs-6 text-center edit">
							<i class="fas fa-pencil-alt"></i>
						</div></a>
						<a href="#" title="Excluir Produto"><div class="col-xs-6 text-center delete">
							<i class="fas fa-times"></i>
						</div></a>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-6">
				<div class="wish">
					<img src="images/prod/Super_Mario_World.png" alt="Produto">
					<h3>Cartucho Supe Mario World</h3>
					<div class="editBtns clearFix">
						<a href="#" title="Editar Produto"><div class="col-xs-6 text-center edit">
							<i class="fas fa-pencil-alt"></i>
						</div></a>
						<a href="#" title="Excluir Produto"><div class="col-xs-6 text-center delete">
							<i class="fas fa-times"></i>
						</div></a>
					</div>
				</div>
			</div>-->
		</div>
	</div>

<?php include "footer.php"; ?>