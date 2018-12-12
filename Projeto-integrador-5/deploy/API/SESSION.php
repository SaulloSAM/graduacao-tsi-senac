<?php
    // Status de Logado - True ou False.
    $_SESSION["logado"] = false;

    // Validação do Usuários para chamadas POST da API.
    $_SESSION["xAuth"] = "";

    // Dados do Usuário.
    $_SESSION["email"] = "";
    $_SESSION["carteira"] = "";
    $_SESSION["chaves"] = "";
    $_SESSION["nome"] = "";
    $_SESSION["cpf"] = "";
    $_SESSION["telefone"] = "";
    $_SESSION["celular"] = "";
    $_SESSION["whatsapp"] = false;
?>