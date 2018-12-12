<?php 
	include "header.php";

	$nome_categoria = "Categoria";
	$id_cat = NULL;

	if (array_key_exists("id", $_GET)) {
		$id_cat = $_GET['id'];
		include_once("API/categorias.php");
		$categorias = get_categorias();
		foreach ($categorias as $cat) {
			if ($cat->{'_id'} == $id_cat) {
				$nome_categoria = $cat->{'name'};
			}
		}
	}

	include_once("API/interesses.php");
	$interesses = get_interesses();

?>

	<div class="wrapper">
		<section>
			<div class="container">
				<h2 class="text-right barsAlignRight bars"><span>Interessados em comprar: </span><?php echo $nome_categoria; ?></h2>

				<?php
					$count = 0;
					foreach ($interesses as $i) {
						if ($id_cat == $i->{'_category'}) {
							$count++;

							echo "<a class='clearFix col-md-6' href='single.php'>";
							echo "<div class='product clearFix'>";
							echo "<div class='img-container col-sm-4'>";
							echo "<img src='". $i->{'image'} ."' alt='". $i->{'imageName'} ."'>";
							echo "</div>";
							echo "<div class='prodDescription col-sm-8'>";
							echo "<h3>". $i->{'name'} ."</h3>";
							echo "<p>Pretendo investir até:</p>";
							echo "<p>R$ ". $i->{'price'} ."</p>";
							echo "</div>";
							echo "</div>";
							echo "</a>";
						}
					}

					if ($count == 0) {
						echo "<h3 class='d-block text-center'>Nenhum Produto encontrado para a categoria \" $nome_categoria \"</h3>";
					}
				?>
			</div>
		</section>
	</div>

<?php include "footer.php"; ?>