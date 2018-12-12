<?php
set_time_limit(0); // Carregar img
include('../db/index.php');
include('../autenticacao/controleAcesso.php');

if(isset($_REQUEST['acao'])){ // Esperando qualquer ação via GET ou POST
	$acao = $_REQUEST['acao'];

	switch($acao){
		// -------------------------------------------------------------------------
		case "incluir":
			include('incluir_produto_tpl.php');
			break;
		// -------------------------------------------------------------------------
		case 'excluir':
			// Verificando se o ID enviado é um número
			if(is_numeric($_GET['id'])){
				if($q = odbc_exec($db, "DELETE FROM Produto
																WHERE idProduto = {$_GET['id']}")){
					if(odbc_num_rows($q) > 0){
						// odbc_num_rows() retorna o número de linhas afetadas
						$msg = "Produto excluido com sucesso";
					}else{
						$erro = "Produto não existe";
					}
				}else{
					$erro = "Erro ao excluir produto";
				}
			}else{
				$erro = "ID inv&aacute;lido";
			}

			$q = odbc_exec($db, "SELECT
									idProduto,
									nomeProduto,
									descProduto,
									precProduto,
									descontoPromocao,
                  idCategoria,
                  ativoProduto,
                  idUsuario,
                  qtdMinEstoque,
                  imagem
								FROM
									Produto");
			$i = 0;
			while($r = odbc_fetch_array($q)){
				$produtos[$i] = $r;
				$i++;
			}
			include('lista_produto_tpl.php');

			break;
		// -------------------------------------------------------------------------
		case 'editar':
			// Verificando id se existe ou não (passando Nulo caso não exista).
			$idProduto = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
			// Consultado produto escolhida
			$query_produto = odbc_exec($db, 'SELECT
																		 	 idProduto,
																			 nomeProduto,
																 			 descProduto,
																			 precProduto,
																			 descontoPromocao,
									               			 idCategoria,
									              			 ativoProduto,
									              			 idUsuario,
									              			 qtdMinEstoque
																			 FROM
																			 Produto
																			 WHERE
																			 idProduto = '.$idProduto);

				$array_produto = odbc_fetch_array($query_produto);

				include('editar_produto_tpl.php');
				break;

			default:
				$erro = "A&ccedil;&atilde;o inv&aacute;lida";
	}

}else{

	// ATUALIZAR NOVA PRODUTOS -------------------------------------------------
	// -------------------------------------------------------------------------
	if(isset($_POST['btnGravarProduto'])){
		// Tratando informaçõe do formulário para uma vareável
		$padroes = "/[^a-zA-Z0-9 ]+/";
		$padroesInteiro = "/[^0-9 .,]+/";
		$substituicao = "";

		// Tratando categoria e descrição ...
		$inputProduto		= preg_replace($padroes, $substituicao, $_POST['inputProduto']);
		$inputPreco 		= preg_replace($padroesInteiro, $substituicao, $_POST['inputPreco']);
		$inputEstoque 	= preg_replace($padroesInteiro, $substituicao, $_POST['inputEstoque']);
		$inputDesconto 	= preg_replace($padroesInteiro, $substituicao, $_POST['inputDesconto']);
		$inputCategoria = preg_replace($padroesInteiro, $substituicao, $_POST['inputCategoria']);
		$inputDescricao = preg_replace($padroes, $substituicao, $_POST['inputDescricao']);
		$idProduto 			= preg_replace($padroesInteiro, $substituicao, $_POST['btnGravarProduto']);

		// $inputAtivo 		= preg_replace($padroesInteiro, $substituicao, $_POST['inputAtivo']);
		//Pega a ativação
		$_POST['inputAtivo'] =
		!isset($_POST['inputAtivo']) ? 0 : $_POST['inputAtivo'];
		$inputAtivo = (bool) $_POST['inputAtivo'];
		$inputAtivo = $inputAtivo === true ? 1 : 0;

		//Trata imagem
		// $conteudo = $_FILE['arquivo'];
		// $img = base64_decode($conteudo);
		// $inputImagem 		= $_POST['inputImagem'];

		// Efetuando atualização na categoria passada via GET.
		if(odbc_exec($db, "UPDATE Produto
											 SET
											 nomeProduto 			= '$inputProduto',
											 precProduto 			= '$inputPreco',
											 qtdMinEstoque 		= '$inputEstoque',
											 descontoPromocao = '$inputDesconto',
											 idCategoria 			= '$inputCategoria',
											 ativoProduto 		= '$inputAtivo',
											 descProduto 			= '$inputDescricao',
											 imagem 					= '$inputImagem'
											 WHERE
											 idProduto = '$idProduto'")){
			$msgUsuario = "Produto $inputProduto Atualizada com sucesso!";
		}else{
			$msgUsuario = "Erro ao gravar atualização do Produto.";
		}
	} // Fim da ação btnAtualizar

	// LITAR PRODUTOS ----------------------------------------------------------
	// -------------------------------------------------------------------------
	$q = odbc_exec($db, "SELECT
                       idProduto,
											 nomeProduto,
											 descProduto,
											 precProduto,
											 descontoPromocao,
											 idCategoria,
											 qtdMinEstoque,
											 ativoProduto,
                       idUsuario,
                       imagem
										   FROM
											 Produto");
	$i = 0;
	while($r = odbc_fetch_array($q)) {
		$produtos[$i] = $r;
		$i++;
	}
	include('lista_produto_tpl.php');
}
?>
