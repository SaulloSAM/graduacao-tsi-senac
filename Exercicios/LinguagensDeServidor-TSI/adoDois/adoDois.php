<!-- ADO - 02 - Linguagem de Servidor - Saulo Sinésio Araujo Marques -->
<!-- 1. Criar um fomrulário para que o usuário possa digitar "usuário" e "senha" -->
<?php
  // Iniciando uma Sessão na página e as váreáveis vazias.
  include 'parametros.php'; // Incluindo a Página parametros.php.
  session_start();

  // Atribuindo valor Nulo como valor inicial das vareáveis.
  $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
  $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

  // Varre o arry $login procurando se a senha e login que o usuário digitou existe.
  foreach ($login as $key => $value) {
    if($usuario == $key && $senha == $value) { // Se encontrar, passa o usuário para a sessão e finaliza a busca!
        $_SESSION['usuario']=$key;
        break;
      }
    } // Fechar foreach.
    // Se não existir nenhum usuário, iremos mostrar no navegador o formulário que está em formulário.php
    if (!isset($_SESSION['usuario'])) {
      echo 'Por favor, digitar um usuário válido!';
      header('location: formulario.php');
    } // Fechar if.
?>

<?php
  echo '<p>Olá usuário '.$usuario.'</p><hr>';
  // Se existir um usuário, iremos para a page 2;
  echo '<br/> <a href="?escolha=1">Animais</a>';
  echo '<br/> <a href="?escolha=2">Flores</a>';
  echo '<br/>';


  if(isset($_GET['escolha']) && ($_GET['escolha']) == 1){
    $_SESSION['escolhido']='Animais';
    header('Location: escolha.php');
  }
  if(isset($_GET['escolha']) && ($_GET['escolha']) == 2){
    $_SESSION['escolhido']='Flores';
    header('Location: escolha.php');
  }
?>

<!--Link Sair para voltar a Página de Login inicial! -->
<br><br><a href="sair.php">Sair</a>

<!-- Usado para mostrar em PHP os valores e tipos da vareável passada como parêmetro, [ var_dump($_GET); exit; ]-->
