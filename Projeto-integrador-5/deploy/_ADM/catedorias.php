<?php
    /* CADASTRAR UMA NOVA CATEGORIA */
    if (count($_POST) > 0) {
        include_once("../API/categorias.php");
        echo set_categoria($_POST['nome'], $_POST['desc'], $_POST['auth']);
    }
?>
<form method="POST" action="categorias.php">
    <label for="nome">Nome: </label>
    <input type="text" name="nome" id="nome">
    <br><br>
    <label for="desc">Descrição: </label>
    <input type="text" name="desc" id="desc">
    <br><br>
    <label for="auth">Autorização</label>
    <input type="text" name="auth" id="auth">
    <br><br>    
    <input type="submit" value="Cadastrar">

    <hr>
    <small>
    eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1YmY0NDFkMzgzZGE3NTAwMTU2NDgwOTYiLCJlbWFpbCI6InNhbUBzYW0uY29tLmJyIiwiaWF0IjoxNTQyNzM0MjkxLCJleHAiOjE1NDI4MjA2OTF9.5tMhdMZ6uUE1erUMi___NdDaxr3w1b_6J1ZfaZJ3iuA
    </small>
</form>