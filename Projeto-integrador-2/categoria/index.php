<?php
  // Verificação de acesso do usuário!
  include('../db/index.php');
  include('../autenticacao/controleAcesso.php');

  // Esperando ação via GET ou POST do Usuário.
  if(isset($_REQUEST['acao'])){
    $acao = $_REQUEST['acao'];
    // Criando condições para as ações
    switch ($acao){
      // -----------------------------------------------------------------------
      case 'incluir':
          include('incluir_categoria.tpl.php');
        break;
      // -----------------------------------------------------------------------
      case 'excluir':
        if($_SESSION['tipoPerfil'] == 'A'){
          // Verificando se o idCategoria passado via GET é um número
          if(is_numeric($_GET['id'])){
            // EXCLUINDO CATEGORIA
            if($result = odbc_exec($db, "DELETE
                                         FROM Categoria
                                         WHERE idCategoria = {$_GET['id']}")){
              // odbc_num_rows() retorna o número de linhas afetadas.
              if(odbc_num_rows($result) > 0){
                $msgUsuario = "Categoria excluida com sucesso!";
              }else{
                include('index.php');
              }
            }else{
              $msgUsuario = "Erro ao excluir categoria!";
            }
          }else{
            $msgUsuario = "ATENÇÃO -- ID inválido";
          }
        }
        // LISTANDO NA PÁGINA TODAS AS CATEGORIAS ----------------------------------
        // -------------------------------------------------------------------------
        $consulta = odbc_exec($db, "SELECT nomeCategoria, descCategoria, idCategoria
                                    FROM Categoria");
        $aux = 0;
        while ($resul = odbc_fetch_array($consulta)){
          // Passando cada campo de categoria para um array categorias
          $categorias[$aux] = $resul;
          $aux++;
        }
        include('lista_categoria.tpl.php');
        break;
      // -----------------------------------------------------------------------
      case 'editar':
        // Verificando id se existe ou não (passando Nulo caso não exista).
        $idCategoria = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';

        // Consultado categoria escolhida
        $consulta = odbc_exec($db, 'SELECT
                                    idCategoria,
                                    nomeCategoria,
                                    descCategoria
                                    FROM
                                    Categoria
                                    WHERE
                                    idCategoria ='.$idCategoria);
        // idCategoria está sendo concatenado, pois ele é um número. e não interfere no banco de dados

        // Criando um array com as informações da categoria escolhida
        $arryCategoria = odbc_fetch_array($consulta);
        include('editar_categoria.tpl.php');
        break;
    }
  }else{ //fim $_REQUEST['acao']
    // Tratando informaçõe do formulário para uma vareável
    $padroes = "/[^a-zA-Z0-9 ]+/";
    $substituicao = "";

    // ATUALIZAR NOVA CATEGORIA ------------------------------------------------
    // -------------------------------------------------------------------------
    if(isset($_POST['btnAtualizar'])){
      // Tratando categoria e descrição ...
      $inputCategoria = preg_replace($padroes, $substituicao, $_POST['inputCategoria']);
      $inputDescricao = preg_replace($padroes, $substituicao, $_POST['inputDescricao']);
      $idCategoria = preg_replace($padroes, $substituicao, $_POST['btnAtualizar']);

      // Efetuando atualização na categoria passada via GET.
      if(odbc_exec($db, "UPDATE Categoria
                         SET
                         nomeCategoria = '$inputCategoria',
                         descCategoria = '$inputDescricao'
                         WHERE
                         idCategoria = '$idCategoria'")){
        $msgUsuario = "Categoria $inputCategoria Atualizada com sucesso!";
      }else{
        $msgUsuario = "Erro ao gravar atualização da categoria.";
      }
    } // Fim da ação btnAtualizar

    // CADASTRAR NOVA CATEGORIA ------------------------------------------------
    // -------------------------------------------------------------------------
    if(isset($_POST['bntSalvar'])){
      // Tratando categoria e descrição ...
      $inputCategoria = preg_replace($padroes, $substituicao, $_POST['inputCategoria']);
      $inputDescricao = preg_replace($padroes, $substituicao, $_POST['inputDescricao']);

      // Efetuando cadastro da NOVA CATEGORIA ----------------------------
      if(odbc_exec($db, "INSERT INTO Categoria
                        (nomeCategoria,
                         descCategoria)
                        VALUES
                        ('$inputCategoria',
                         '$inputDescricao')")){
        $msgUsuario = "A categoria $inputCategoria foi cadastrada com sucesso.";
      }else{
        $msgUsuario = "Erro ao cadastar uma nova categoria.";
      }
    } // Fim da ação bntSalvar

    // LISTANDO NA PÁGINA TODAS AS CATEGORIAS ----------------------------------
    // -------------------------------------------------------------------------
    $consulta = odbc_exec($db, "SELECT nomeCategoria, descCategoria, idCategoria
                                FROM Categoria");
    $aux = 0;
    while ($resul = odbc_fetch_array($consulta)){
      // Passando cada campo de categoria para um array categorias
      $categorias[$aux] = $resul;
      $aux++;
    }
    include('lista_categoria.tpl.php');
  }
?>
