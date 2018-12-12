<footer>
		<div class="container">
			<div class="col-sm-2 col-xs-4">
				<ul>
					<?php
						include_once ("API/categorias.php");
						$categorias = get_categorias();
						$count = 0;
						foreach ($categorias as $cat) {
							echo "<li><a href='lista.php?id=".$cat->{'_id'}."'>".$cat->{'name'}."</a></li>";
							$count++;
							if ($count >= 7) { break; }
						}
					?>
				</ul>
			</div>

			<div class="col-sm-2 col-xs-4">
				<ul>
					<li><a href="sobre.php">Sobre</a></li>
					<li><a href="termos-de-uso.php">Termos de Uso</a></li>
				</ul>
			</div>

			<div class="col-sm-2 col-xs-4">
				<ul>
					<?php if(isset($_SESSION['logado']) && $_SESSION['logado'] == true) : ?>
						<li><a href="lista-de-desejos.php">Lista de desejos</a></li>
					<?php endif; ?>
				</ul>
			</div>

			<div class="col-sm-6 col-xs-12 text-right">
				<img src="images/footer-logo.png" alt="Logo">
				<ul id="social">
					<li><a href="#" title="Facebook"><i class="fab fa-facebook-square"></i></a></li>
					<li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
					<li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
				</ul>
			</div>
		</div>

		<div class="text-center" id="copyright">
			<p>Projeto Integrador V</p>
			<p>Todos os Direitos Reservados - 2018</p>
		</div>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/behavior.js"></script>
</body>
</html>