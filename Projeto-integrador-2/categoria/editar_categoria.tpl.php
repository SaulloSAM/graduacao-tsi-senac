<?php
  include ('../menu/index.head.tpl.php');
?>
  <link rel="stylesheet" href="../estilo/tabela.css">
<?php
  include ('../menu/index.body.tpl.php');
?>

<section>
    <h1>Editar Categorias</h1>
    <h3><a href="../categoria">Voltar para a listagem de Categorias</a></h3>
</section>
  <!-- Formulário para atualização de uma categoria -->
  <form method="post" action="../categoria/" name="form"><br><br>
    <fieldset class="grupo">
      <!-- Campo para adicionar o nome da Categoria -->
      <div class="campo">
        <label>Categoria:</label>
        <input type="text"
               name="inputCategoria"
               style="width: 17em"
               value="<?php echo $arryCategoria['nomeCategoria'];?>">
      </div>
      <!-- Campo para adicionar uma breve descrição da categoria -->
      <div class="campo">
        <label>Descrição:</label>
        <textarea type="text"
                  name="inputDescricao"
                  rows="6"
                  style="width: 20em"
                  id="descricao"
                  value="<?php echo $arryCategoria['descCategoria'];?>">
        </textarea>
      </div>
      <!-- Botão para validar os campos acima no banco de dados -->
      <!--
        Passamos a informação do idCategoria como valor do botão para não perder o dado quando
        voltar para a página de listagem de Categorias e assim finaliaz a atualização
      -->
      <div class="campo">
        <button type="submit"
                name="btnAtualizar"
                value="<?php echo $arryCategoria['idCategoria'];?>">
                Atualizar
        </button>
      </div>
    </fieldset>
  </form>

<?php
  include ('../menu/index.head.tpl.php');
?>
