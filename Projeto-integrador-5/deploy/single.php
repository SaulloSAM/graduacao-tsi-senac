<?php include "header.php"; ?>

	<div class="wrapper">
		<div class="container">
			<div class="col-md-8" id="info">
				<img src="images/prod/n64.png" alt="Nome Produto">

				<p>Estou procurando por:</p>
				<h2>Console Nintendo 64</h2>

				<p>Pretendo investir até:</p>
				<p id="price">R$ 400,00</p>

				<?php if(isset($_SESSION['logado']) && $_SESSION['logado'] == true) : ?>
					<a id="contact" href="https://api.whatsapp.com/send?phone=5500000000000">Entrar em contato</a>
				<?php else: ?>
					<a id="btnLogin" href="login.php">Faça seu login para fazer uma proposta ao comprador</a>
				<?php endif; ?>
			</div>
			<div class="col-md-5" id="description">
				<h3><i class="fas fa-plus"></i> Informações</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec semper nisl. Aenean porta eros id neque hendrerit, et auctor eros facilisis. Nunc vitae interdum mauris. Nulla dui dui, tincidunt vel risus quis, venenatis elementum risus. Nam sollicitudin nibh sit amet accumsan blandit. Vestibulum neque lorem, euismod nec pretium in, volutpat vitae urna. Donec quis imperdiet diam. Nulla et lectus nec augue faucibus ullamcorper vitae id tellus. In malesuada dolor quis urna blandit pharetra. Donec ultricies eleifend nisi, sed scelerisque leo porttitor vitae. Sed scelerisque orci ut aliquam porta. Fusce porta viverra massa at vehicula. Donec eget luctus dolor, et convallis velit. Pellentesque viverra quam auctor augue interdum, ut mollis dui ullamcorper. In rhoncus dignissim mauris, ornare hendrerit metus. Sed porta eu lacus pulvinar vestibulum.</p>

				<p>Donec faucibus tincidunt magna. Maecenas gravida arcu ligula, sit amet elementum leo ultricies ut. Proin non fringilla ipsum, vitae aliquet mi. Praesent nec nisl a mi facilisis cursus. Maecenas condimentum placerat tellus, eu placerat nibh consectetur ac. Phasellus eget massa in justo commodo consectetur at eu ipsum. Nulla condimentum magna sit amet egestas facilisis. Vivamus vitae augue aliquet, congue mi eget, malesuada erat. Pellentesque quis imperdiet arcu.</p>
			</div>
		</div>
	</div>

<?php include "footer.php"; ?>