<?php
  include ('../menu/index.head.tpl.php');
?>
  <link rel="stylesheet" href="../estilo/tabela.css">
<?php
  include ('../menu/index.body.tpl.php');
?>

  <!-- Submenu da página CATEGORIA -->
  <section>
      <h1>Nova Categoria</h1>
      <h3><a href="../categoria">Voltar</a></h3>
  </section>

  <!-- Formulário para cadastro de uma nova categoria -->
  <form method="post" action="../categoria/" name="form"><br><br>
    <fieldset>
      <!-- Campo para adicionar o nome da Categoria -->
      <div class="campo">
        <label>Categoria:</label>
        <input type="text"
               name="inputCategoria"
               placeholder="Nome da categoria (50 Caracteres)"
               style="width: 17em">
      </div>
      <!-- Campo para adicionar uma breve descrição da categoria -->
      <div class="campo">
        <label>Descrição:</label>
        <textarea name="inputDescricao"
                  placeholder="Digite uma breve descrição sobre a categoria (100 Caracteres)"
                  rows="6"
                  style="width: 20em"
                  id="descricao">
        </textarea>
      </div>
      <!-- Botão para validar os campos acima no banco de dados -->
      <div class="campo">
        <button type="submit" name="bntSalvar">Salvar</button>
      </div>
    </fieldset>
  </form>

<?php
  include ('../menu/index.head.tpl.php');
?>
