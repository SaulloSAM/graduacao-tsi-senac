<?php
  include ('../menu/index.head.tpl.php');
?>
  <link rel="stylesheet" href="../estilo/tabela1.css">
<?php
  include ('../menu/index.body.tpl.php');
?>
<section>
    <h1>Listagem de Produtos</h1>
    <h3><a href="?acao=incluir">Adicionar Produto</a></h3>
</section>

<!-- Gerando uma tabela com as informações sobre Usuários do Banco -->
<div class="container-table">
  <div class="table">
    <div class="row header">
      <div class="cell"><p>ID</p></div>
      <div class="cell"><p>Imagem</p></div>
      <div class="cell"><p>Nome</p></div>
      <div class="cell"><p>Descrição</p></div>
      <div class="cell"><p>Preço</p></div>
      <div class="cell"><p>Promoção</p></div>
      <div class="cell"><p>Quantidade</p></div>
      <div class="cell"><p>Categoria</p></div>
      <div class="cell"><p>Ativo</p></div>
      <div class="cell"><p>Usuario</p></div>
      <div class="cell"><p><br><br></p></div>
    </div>
    <?php
    foreach($produtos as $produto){
      $conteudo_base64 = base64_encode($produto['imagem']);
      echo "
            <div class='row'>
            <div class='cell'><p class='position'>{$produto['idProduto']}</p></div>
              <div class='cell center'><p><img class='imgProduto' src='data:image/jpeg;base64,$conteudo_base64'></p></div>
              <div class='cell'><p>{$produto['nomeProduto']}</p></div>
              <div class='cell'><p>{$produto['descProduto']}</p></div>
              <div class='cell'><p>{$produto['precProduto']}</p></div>
              <div class='cell'><p>{$produto['descontoPromocao']}</p></div>
              <div class='cell'><p>{$produto['qtdMinEstoque']}</p></div>
              <div class='cell'><p>{$produto['idCategoria']}</p></div>
              <div class='cell'><p>{$produto['ativoProduto']}</p></div>
              <div class='cell'><p>{$produto['idUsuario']}</p></div>
              <div class='cell'>
                <a href='?acao=editar&id={$produto['idProduto']}'>Editar</a><br><br>
                <a href='?acao=excluir&id={$produto['idProduto']}'>Apagar</a>
              </div>
            </div>
          ";
    } // Fim foreach
    ?>
  </div> <!-- Fim table -->
</div> <!-- Fim container-table -->

<?php
  include('../menu/index.footer.tpl.php');
?>
