<?php
  session_start();

  include ('../db/index.php');

  // Verificando email e a senha com o banco de dados.
  if( isset($_POST['email']) && isset($_POST['senha']) ){

    // Tratar informações eviadas pelos usuário.
    $email = str_replace('"', '', // 1. Tirar " Passar 'vazio'
             str_replace("'", '', // 2. Tirar ' Passar 'vazio'
             str_replace(';', '', // 3. Tirar ; Passar 'vazio'
             str_replace('\\','', // 4. Tirar \ Passar 'vazio'
             $_POST['email'])))); // fechando todos os str_replace.
    $senha = str_replace('"', '',
             str_replace("'", '',
             str_replace(';', '',
             str_replace('\\','',
             $_POST['senha'])))); // fechando str_replace.

    // Verificar se a senha existe no banco de dados.
    $query = odbc_exec($db, "SELECT nomeUsuario, idUsuario, tipoPerfil
                             FROM  Usuario
                             WHERE loginUsuario = '$email'
                             AND   senhaUsuario = '$senha'"); // Fim odbc_connect
                             // Utilizando a hash --> HASHBYTES('SHA1','$senha')
                             // odbc_exec "Executa uma instrução desejada para efetuarmos uma tarefa ou mais."
                             // SELECT Instrução do SQL Server para selecional tabelas.
                             // FROM "passar o nome da Tabela"
                             // WHERE "passar os valores que estão na tabela"
                             // AND "Passar também junto ao" WHERE.

    $result = odbc_fetch_array($query); // Ler o resultado da consulta feito acima pelo odbc_eexc 'SELECT'

    if(!empty($result['idUsuario']) && !empty($result['tipoPerfil']) ){
      // Passando as informações do banco de dados para uma variável global.
      $_SESSION['idUsuario'] = $result['idUsuario'];
      $_SESSION['tipoPerfil'] = $result['tipoPerfil'];
      $_SESSION['nomeUsuario'] = $result['nomeUsuario'];
      // $_SESSION[' '] é uma variável array global, onde usamos para salvar a sessão do usuário
      // e outros valores que precisar salvar na sessão global.

      // Passar para página php menu.
      header('Location: ../menu/');
    }else{
      $erro = 'E-mail ou Senha incorreto';
    }

  } // Fechando verificação de email e senha.

  include ('index.tpl.php');
?>
